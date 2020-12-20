<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $Categorys = Category::all();
        return jsonResult($Categorys);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $Category = Category::findOrFail($request->id);
            $Category->update($this->validateField($request));
        }
        else{
            $Category = Category::create($this->validateField($request));
        }
        return jsonResult($Category);
    }

    public function update(Request $request , $id)
    {
        $Category = Category::findOrFail($id);

        $Category->update($this->validateField($request));

        return jsonResult($Category);
    }

    public function remove(Request $request , $id)
    {
        $Category = Category::findOrFail($id);
        
        $Category->delete();

        return jsonResult($Category);
    }

    private function validateField($request){
        $validated =  $request->validate([
            'title' => "required"
        ]);
        if($request->hasFile('img')){
            $validated['img'] = Uploader::save($request->img);
        }
        return $validated;
    }
}