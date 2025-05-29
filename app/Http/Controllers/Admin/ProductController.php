<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryModel;
use App\Models\Product\ItemGalleriesModel;
use App\Models\Product\ItemModel;
use App\Models\Product\ItemOtherInformate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = ItemModel::where('status', 'active')
            ->orderByRaw('order_time IS NULL, order_time DESC')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('Admin.page.product.index', [
            'products' => $products
        ]);
    }
    public function draft()
    {

        $products = ItemModel::where('status', 'inactive')->orderBy('id','desc')->paginate(9);
        return view('Admin.page.product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $category = CategoryModel::get();

        return view('Admin.page.product.create', compact('category'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'description' => 'required|string',
            'category_id' => 'required',
            'status' => 'required|in:active,inactive',
            'count' => 'required|integer|min:1',
            'auction_end_time' => 'nullable|date',
            'imgText' => 'required|string',
            'youtubUrl' => 'nullable|url',

        ]);


        // Ստեղծում ենք հիմնական մոդելը
        $item = ItemModel::create([
            'name' => $request->name,
            'count' => $request->count,
            'new' => $request->new,
            'best' => $request->best,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'auction_end_time' => $request->auction_end_time,
            'status' => $request->status,
            'category_id' => $request->category_id,

            ]);
        // Պահպանում ենք լրացուցիչ տվյալները
        ItemOtherInformate::create([
            'item_id' => $item->id,
            'imgText' => $request->imgText,
            'youtubUrl' => $request->youtubUrl,
        ]);

        return redirect()->route('admin.product.coverImage',$item->id)->with('success', 'Product added successfully!');
    }





    public function dateTimeWay($inputDate)
    {


        $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $inputDate);

// Format the DateTime object as desired (e.g., 'Y-m-d H:i:s')
        $formattedDateTime = $dateTime->format('Y-m-d H:i:s');;

        return $formattedDateTime;

    }


    public function otherInformate($request, $item, $id)
    {
        if ($request->has('coverImages')) {
            $this->uploadimgaes('coverImages', $request, $item, $id);
        }
        if ($request->has('underImages')) {
            $this->uploadimgaes('underImages', $request, $item, $id);
        }
        if ($request->has('middle_picture')) {
            $this->uploadimgaes('middle_picture', $request, $item, $id);
        }


    }


    public function show($id)
    {


        $item = ItemModel::find($id);
        $itemGallery = ItemGalleriesModel::where('item_id', $id)->get();
        $other = ItemOtherInformate::where('item_id', $id)->first();

        if (!$other) {
            ItemOtherInformate::create([
                'item_id' => $id

            ]);
        }
        return view('Admin.page.product.show', compact('id', 'item', 'itemGallery', 'other'));
    }

    public function edit($id)
    {

        $item = ItemModel::find($id);
        $itemGallery = ItemGalleriesModel::where('item_id', $id)->get();
        $other = ItemOtherInformate::where('item_id', $id)->first();
        $category=CategoryModel::all();
        if (!$other) {
            ItemOtherInformate::create([
                'item_id' => $id

            ]);
        }
        return view('Admin.page.product.edit', compact('id', 'item', 'itemGallery', 'other','category'));
    }

    public function showSetActiveForm($id)
    {
        $item = ItemModel::findOrFail($id);

        return view('Admin.page.product.set-active', compact('item'));
    }
    public function setActive(Request $request, $id)
    {

        $request->validate([
            'order_time' => 'required|date',
        ]);

        $item = ItemModel::findOrFail($id);

        // Թարմացնել order_time
        $item->update([
            'order_time' =>  Carbon::parse($request->order_time),
        ]);

        return back();

    }
    public function setInActive($id)
    {


        $item = ItemModel::findOrFail($id);

//        // Թարմացնել order_time
//        $item->update(['order_time' => null]);
//        $item->save();

        return redirect()->route('admin.product.index')->with('success', 'Ապրանքի ակտիվացման ժամանակը հաջողությամբ թարմացվեց։');
    }

    public function update(Request $request, $id)
    {

        $item = ItemModel::find($id);
        $new = ItemOtherInformate::where('item_id', $id)->first();
        $new->update([

            'imgText' => $request['imgText'],
            'youtubUrl' => $request['youtubUrl'],

        ]);

        $item->update([
            'name' => $request->name,
            'count' => $request->count,
            'description' => $request->description,
            'price' => $request->price,
            'new' => $request->new,
            'best' => $request->best,
            'discount' => $request->discount,
            'auction_end_time' => $request->auction_end_time,
            'status' => $request->status,
        ]);


        return back();
    }

    public function deleteImages(Request $request)
    {
        ItemGalleriesModel::find($request->uid)->delete();
        return back();

    }

    public function destroy($id)
    {
        ItemModel::find($id)->delete();
        return redirect()->route('admin.product.index');
    }
}
