<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class CourseController extends Controller
{
    public function index(Request $request)
    {
        $Courses = Course::all();
        return jsonResult($Courses);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $Course = Course::findOrFail($request->id);
            $Course->update($this->validateField($request));
        }
        else{
            $Course = Course::create($this->validateField($request));
        }
        return jsonResult($Course);
    }

    public function update(Request $request , $id)
    {
        $Course = Course::findOrFail($id);

        $Course->update($this->validateField($request));

        return jsonResult($Course);
    }

    public function remove(Request $request , $id)
    {
        $Course = Course::findOrFail($id);
        
        $Course->delete();

        return jsonResult($Course);
    }

    private function validateField($request){
        $validated =  $request->validate([
            'title' => "required",
            'teacher' => "required",
            'text' => "required",
            'popular' => "required",
        ]);
        if($request->hasFile('img')){
            $validated['img'] = Uploader::save($request->img);
        }
        return $validated;
    }
}