<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryModel;
use App\Models\Item\ItemOtherInformate;
use App\Models\Product\ItemGalleriesModel;
use App\Models\Product\ItemModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {

        $product = ItemModel::ordered()->paginate(9);
        return view('Admin.component.product.index', [
            'product' => $product
        ]);
    }

    public function create()
    {
        $category = CategoryModel::get();

        return view('Admin.component.product.created', compact('category'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'contextBig' => 'required',
            'underImages' => 'required',
            'productImages' => 'required',
        ]);

//        $dateTime = Carbon::createFromFormat('Y-m-d\TH:i', $request->date);
//        $formattedDateTime = $dateTime->format('Y-m-d H:i:s');


//        imgText
//youtubUrl
//status
        $item = ItemModel::create([
            'name' => $request->title,
            'count' => $request->count,
            'description' => $request->contextBig,
            'price' => $request->price,
            'discount' => $request->discount,
            'auction_end_time' => $request->date,
            'status' => $request->status,
            'category_id' => $request->category_id,

        ]);

        $new = ItemOtherInformate::create([
            'item_id' => $item->id,
            'imgText' => $request['imgText'],
            'youtubUrl' => $request['youtubUrl'],

        ]);
        $this->otherInformate($request, $item, $new->id);
        $this->uploadMultiplayImages($request, $item);

        return redirect()->route('admin.product.index');
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


    public function uploadimgaes($name, $request, $item, $id)
    {


        $imagename = null;
        $image = $request->file($name);
        $imagename = date("Y") . '/' . date("m") . '/' . $item->id . random_int(1, 99) . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('product/');
        $pah = public_path('product/' . date("Y") . '/' . date("m"));
        if (!file_exists($pah) > 0):
            if (!is_dir($pah . date("Y") . '/' . date("m"))) {
                mkdir($pah, 0755, true);
            }endif;
        $image->move($pah, $imagename);


        $imagename = 'product/' . $imagename;
        ItemOtherInformate::find($id)->update([
            $name => $imagename,
        ]);
        return back();
    }

    public function uploadMultiplayImages($request, $item)
    {


        $imagename = null;
        $images = $request->file('productImages');
        foreach ($images as $image) {
            $imagename = date("Y") . '/' . date("m") . '/' . random_int(1, 99) . $item->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('item/');
            $pah = public_path('item/' . date("Y") . '/' . date("m"));
            if (!file_exists($pah) > 0):
                if (!is_dir($pah . date("Y") . '/' . date("m"))) {
                    mkdir($pah, 0755, true);
                }endif;
            $image->move($pah, $imagename);


            ItemGalleriesModel::create([
                'item_id' => $item->id,
                'image_path' => 'item/' . $imagename
            ]);
        }

        return back();


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
        return view('Admin.component.product.show', compact('id', 'item', 'itemGallery', 'other'));
    }

    public function edit($id)
    {

        $item = ItemModel::find($id);
        $itemGallery = ItemGalleriesModel::where('item_id', $id)->get();
        $other = ItemOtherInformate::where('item_id', $id)->first();

        if (!$other) {
            ItemOtherInformate::create([
                'item_id' => $id

            ]);
        }
        return view('Admin.component.product.edit', compact('id', 'item', 'itemGallery', 'other'));
    }

    public function showSetActiveForm($id)
    {
        $item = ItemModel::findOrFail($id);

        return view('Admin.component.product.set-active', compact('item'));
    }
    public function setActive(Request $request, $id)
    {
        $request->validate([
            'order_time' => 'required|date',
        ]);

        $item = ItemModel::findOrFail($id);

        // Թարմացնել order_time
        $item->order_time = Carbon::parse($request->order_time);
        $item->save();

        return redirect()->route('admin.product.index')->with('success', 'Ապրանքի ակտիվացման ժամանակը հաջողությամբ թարմացվեց։');
    }
    public function setInActive($id)
    {


        $item = ItemModel::findOrFail($id);

        // Թարմացնել order_time
        $item->update(['order_time' => null]);
        $item->save();

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
            'name' => $request->title,
            'count' => $request->count,
            'description' => $request->contextBig,
            'price' => $request->price,
            'discount' => $request->discount,
            'auction_end_time' => $request->date ?? $item->auction_end_time,
            'status' => $request->status,
        ]);

        if ($request->has('productImages')) {
            $this->uploadMultiplayImages($request, $item);
        }
        $this->otherInformate($request, $item, $new->id);
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
