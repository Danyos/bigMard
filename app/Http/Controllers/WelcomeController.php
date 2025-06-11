<?php

namespace App\Http\Controllers;

use App\Models\CallupModel;
use App\Models\Category\CategoryModel;
use App\Models\FeedbackModel;
use App\Models\Product\ItemDetailsModel;
use App\Models\Product\ItemGalleriesModel;
use App\Models\Product\ItemModel;
use App\Models\Product\ItemOtherInformate;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WelcomeController extends Controller
{


    public function index()
    {


        return view('welcome', [
            'categories' => CategoryModel::get(),
            'bests' => ItemModel::with(['OtherInformation'])->where('status', 'active')->where('best', 'active')->ordered()->limit(12)->get(),
            'newItems' => ItemModel::with(['OtherInformation'])->where('status', 'active')->where('new', 'active')->ordered()->limit(12)->get(),
            'allItems' => ItemModel::with(['OtherInformation'])->where('status', 'active')->whereNot('best', 'active')->whereNot('new', 'active')->ordered()->limit(15)->get(),
            'sliders' => SliderImage::orderBy('id', 'desc')->get()
        ]);
    }

    public function storeShop($slug)
    {
        $category = CategoryModel::where('slug', $slug)->firstOrFail();
        $products = null;
        if ($category) {
            $products = ItemModel::with(['OtherInformation'])->where('status', 'active')->ordered()->paginate(15);

        }
        return view('page.storeShop', compact('category', 'products'));
    }

    public function storeProduct($id)
    {
        $galleries=ItemGalleriesModel::where('item_id', $id)->get();
        $details=ItemDetailsModel::where('product_id', $id)->get();
        $item= ItemModel::with(['OtherInformation'])->where('status', 'active')->where('id', $id)->first();
        $category=CategoryModel::find($item->category_id);
        $other= ItemModel::with(['OtherInformation'])->where('status', 'active')->where('category_id', $category->id)->ordered()->limit(4)->get();
$feedbacks= FeedbackModel::where('status', 'active')->where('item_id', $id)->get();

        return view('page.product.index',compact('item','galleries','details','category','other','feedbacks'));
    }

    public function policy()
    {

        return view('page.PrivacyPolicy');
    }

    public function guarantee()
    {

        return view('page.guarantee');
    }

    public function payments()
    {

        return view('page.payments');
    }

    public function delivery()
    {

        return view('page.delivery');
    }

    public function show($code)
    {

        $item = ItemModel::find($code);
        $feedback = FeedbackModel::where('status', 'active')->where('item_id', $item->id)->get();
        $itemGallery = ItemGalleriesModel::where('item_id', $item->id)->get();
        $other = ItemOtherInformate::where('item_id', $item->id)->first();

        return view('Item.index', compact('item', 'itemGallery', 'other', 'feedback'));

    }

    public function popup($code)
    {
        $shouldShowHeaderAndFooter = false;
        try {
            if (!$code || !decrypt($code)) {
                abort('404');
            }
            $item = ItemModel::find(decrypt($code));
            $itemGallery = ItemGalleriesModel::where('item_id', $item->id)->get();
            $other = ItemOtherInformate::where('item_id', $item->id)->first();

            return view('Item.popUp', compact('item', 'itemGallery', 'other', 'shouldShowHeaderAndFooter'));
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {

        }
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


    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'item_id' => ['required', 'string'], // Adjust rules for item ID as needed
        ], [
            'name.regex' => 'The name field should only contain letters.',
            'phone.regex' => 'The phone number field should only contain numbers, without spaces or special characters.',
            // Add custom error messages for other rules if needed
        ]);

        CallupModel::create([
            'type_id' => $request->type_id,
            'item_id' => $request->item_id,
            'phone' => $request->phone,
            'name' => $request->name,
        ]);
        return back();
    }
    public function order(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'id' => ['required'],
        ], [
            'name.required' => 'Անունը պարտադիր է։',
            'phone.required' => 'Հեռախոսահամարը պարտադիր է։',
            'id.required' => 'Անձնական ID-ն բացակայում է։',
        ]);

        CallupModel::create([
            'item_id' => $request->id,
            'phone' => $request->phone,
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'success']);
    }
}
