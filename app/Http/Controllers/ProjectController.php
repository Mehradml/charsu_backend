<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        return jsonResult($projects);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $project = Project::findOrFail($request->id);
            $project->update($this->validateField($request));
        }
        else{
            $project = Project::create($this->validateField($request));
        }
        return jsonResult($project);
    }

    public function update(Request $request , $id)
    {
        $project = Project::findOrFail($id);

        $project->update($this->validateField($request));

        return jsonResult($project);
    }

    public function remove(Request $request , $id)
    {
        $project = Project::findOrFail($id);
        
        $project->delete();

        return jsonResult($project);
    }

    private function validateField($request){
        
        $validated =  $request->validate([
            'title' => "required",
            'city' => "required",
            'text' => "required"
        ]);
        if($request->hasFile('img')){
            $validated['img'] = Uploader::save($request->img);
        }
        return $validated;
    }
}