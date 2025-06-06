<?php
namespace App\Http\Controllers\api;

use App\Models\ProjectModel;
use Illuminate\Http\Request;
use \App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        return ProjectModel::all();
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string']);
        return ProjectModel::create($request->only('name'));
    }

    public function show($id)
    {


        return $id;
    }

    public function update(Request $request, ProjectModel $ProjectModel)
    {
        $ProjectModel->update($request->only('name'));
        return $ProjectModel;
    }

    public function destroy(ProjectModel $ProjectModel)
    {
        $ProjectModel->delete();
        return response()->noContent();
    }
}
