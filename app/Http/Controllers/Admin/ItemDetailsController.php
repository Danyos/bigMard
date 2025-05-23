<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product\ItemDetailsModel;
use Illuminate\Http\Request;

class ItemDetailsController extends Controller
{

    public function show($id)
    {
        $itemDetails = ItemDetailsModel::with('ItemInfo')->where('product_id',$id)->get();
        return view('admin.page.product.item-details.index', compact('itemDetails','id'));
    }

    public function edit($id)
    {
        return view('admin.page.product.item-details.create',compact('id'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'key' => 'required|string|max:255',
            'value' => 'nullable|string',
        ]);

        ItemDetailsModel::create($validated);

        return redirect()->route('admin.item-details.show',$request->product_id)->with('success', 'Item detail created successfully.');
    }





    public function destroy($id)
    {
        $itemDetail = ItemDetailsModel::findOrFail($id);
        $itemDetail->delete();

        return back()->with('success', 'Item detail deleted successfully.');
    }
}
