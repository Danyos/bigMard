<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CallupModel;
use App\Models\Category\CategoryModel;
use App\Models\FeedbackModel;
use App\Models\Product\ItemDetailsModel;
use App\Models\Product\ItemGalleriesModel;
use App\Models\Product\ItemModel;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductInformationController extends Controller
{
    public function cat()
    {
        $list = CategoryModel::get();
        return response()->json([
            'categories' => $list,
            'best' => ItemModel::with(['OtherInformation'])->where('best', 'active')->ordered()->limit(12)->get(),
            'newItem' => ItemModel::with(['OtherInformation'])->where('new', 'active')->ordered()->limit(12)->get(),
            'slider' => SliderImage::orderBy('id', 'desc')->get()
        ]);

    }

    public function feedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required|string|max:500',
            'star' => 'required|integer|between:1,5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        FeedbackModel::create($request->all());

        return response()->json([
            'message' => 'Feedback submitted successfully'
        ], 201);

    }
        public function order(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'id' => ['required'], // Adjust rules for item ID as needed
        ], [
            'name.regex' => 'The name field should only contain letters.',
            'phone.regex' => 'The phone number field should only contain numbers, without spaces or special characters.',
            // Add custom error messages for other rules if needed
        ]);

        CallupModel::create([
            'item_id'=>$request->id,
            'phone'=>$request->phone,
            'name'=>$request->name,
        ]);
        return response()->json('succsess');
    }

    public function details($id)
    {
        return response()->json([
            'id' => $id,
            'product' => ItemModel::with(['OtherInformation'])->where('id', $id)->first(),
        ]);
    }

    public function additional($id)
    {
        return response()->json(ItemDetailsModel::where('product_id', $id)->get());
    }

    public function detailsImages($id)
    {
        return response()->json(
            ItemGalleriesModel::where('item_id', $id)->get());
    }

    public function detailsReviews($id)
    {
        return response()->json(
            FeedbackModel::where('status', 'active')->where('item_id', $id)->get()

        );

    }
}
