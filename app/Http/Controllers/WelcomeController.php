<?php

namespace App\Http\Controllers;

use App\Models\CallupModel;
use App\Models\FeedbackModel;
use App\Models\Item\ItemOtherInformate;
use App\Models\Product\ItemGalleriesModel;
use App\Models\Product\ItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WelcomeController extends Controller
{
    public function index()
    {

        $shouldShowHeaderAndFooter = true;
        $item=ItemModel::with(['ItemGallery'])->orderBy('id','desc')->get();

        return view('welcome', compact('shouldShowHeaderAndFooter',
            'item'));
    }
    public function policy()
    {

        return view('page.PrivacyPolicy');
    }
   public function guarantee()
    {

        return view('page.guarantee');
    }  public function payments()
    {

        return view('page.payments');
    }public function delivery()
    {

        return view('page.delivery');
    }

    public function show($code)
    {

            $item = ItemModel::find($code);
            $feedback = FeedbackModel::where('status','active')->where('item_id',$item->id)->get();
            $itemGallery = ItemGalleriesModel::where('item_id', $item->id)->get();
            $other = ItemOtherInformate::where('item_id', $item->id)->first();

            return view('Item.index', compact('item', 'itemGallery', 'other','feedback'));

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
    public function feedback(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required|string|max:500',
            'star' => 'required|integer|between:1,5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        FeedbackModel::create($request->all());
        Session::flash('success', 'Feedback submitted successfully.');
        return back();

    }


    public function register(Request $request){

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
            'type_id'=>$request->type_id,
            'item_id'=>$request->item_id,
            'phone'=>$request->phone,
            'name'=>$request->name,
        ]);
        return back();
    }
}
