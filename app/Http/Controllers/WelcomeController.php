<?php

namespace App\Http\Controllers;

use App\Models\CallupModel;
use App\Models\FeedbackModel;
use App\Models\Item\ItemOtherInformate;
use App\Models\Product\ItemGalleriesModel;
use App\Models\Product\ItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WelcomeController extends Controller
{
    public function index()
    {
        $shouldShowHeaderAndFooter = true;

        return view('welcome', compact('shouldShowHeaderAndFooter'));
    }

    public function show($code)
    {
        $shouldShowHeaderAndFooter = true;
        try {
            if (!$code || !decrypt($code)) {
                abort('404');
            }
            $item = ItemModel::find(decrypt($code));
            $feedback = FeedbackModel::where('status','active')->where('item_id',$item->id)->get();
            $itemGallery = ItemGalleriesModel::where('item_id', $item->id)->get();
            $other = ItemOtherInformate::where('item_id', $item->id)->first();

            return view('Item.index', compact('item', 'itemGallery', 'other', 'shouldShowHeaderAndFooter','feedback'));
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {

        }
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
        return back();

    }


    public function register(Request $request){



        CallupModel::create([
            'type_id'=>$request->type_id,
            'item_id'=>$request->item_id,
            'phone'=>$request->phone,
        ]);
        return back();
    }
}
