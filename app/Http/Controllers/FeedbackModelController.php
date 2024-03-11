<?php

namespace App\Http\Controllers;

use App\Models\FeedbackModel;
use App\Http\Requests\StoreFeedbackModelRequest;
use App\Http\Requests\UpdateFeedbackModelRequest;

class FeedbackModelController extends Controller
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
    public function store(StoreFeedbackModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FeedbackModel $feedbackModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeedbackModel $feedbackModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedbackModelRequest $request, FeedbackModel $feedbackModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeedbackModel $feedbackModel)
    {
        //
    }
}
