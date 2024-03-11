<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackModel;
use Illuminate\Http\Request;

class ReviewRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedback=FeedbackModel::orderBy('id','desc')->get();
        return view('Admin.component.review.index', [
            'feedback' => $feedback
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $call=FeedbackModel::find($id);
        $call->update([
            'status'=>$call->status==='active'?'inactive':'active'
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
