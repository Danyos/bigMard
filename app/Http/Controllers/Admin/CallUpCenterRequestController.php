<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallupModel;
use Illuminate\Http\Request;

class CallUpCenterRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $call=CallupModel::orderBy('id','desc')->get();

        return view('Admin.component.callUp.index', [
            'call' => $call
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
        $call=CallupModel::find($id);
            $call->update([
                'status'=>$call->status==='active'?'inactive':'active'
            ]);
            return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $call = CallupModel::findOrFail($id);
        $call->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }
}
