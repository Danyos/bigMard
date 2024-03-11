<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemModelRequest;
use App\Http\Requests\UpdateItemModelRequest;
use App\Models\Product\ItemModel;

class ItemModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemModel $itemModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemModel $itemModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemModelRequest $request, ItemModel $itemModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemModel $itemModel)
    {
        //
    }
}
