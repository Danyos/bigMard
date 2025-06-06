<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TaskModel;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return TaskModel::with('project')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'value' => 'required|string',
            'status' => 'in:completed,pending,in_progress|nullable',
        ]);

        return TaskModel::create([
            'project_id' => $request->project_id,
            'value' => $request->value,
            'status' => $request->status
        ]);
    }

    public function show(TaskModel $TaskModel)
    {
        return $TaskModel->load('project');
    }

    public function update(Request $request, TaskModel $TaskModel)
    {
        $TaskModel->update($request->only('project_id', 'value', 'status'));
        return $TaskModel;
    }

    public function destroy(TaskModel $TaskModel)
    {
        $TaskModel->delete();
        return response()->noContent();
    }
}

