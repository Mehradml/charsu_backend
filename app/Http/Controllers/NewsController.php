<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class NewsController extends Controller
{
    public function index(Request $request)
    {
        $Newss = News::all();
        return jsonResult($Newss);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $News = News::findOrFail($request->id);
            $News->update($this->validateField($request));
        }
        else{
            $News = News::create($this->validateField($request));
        }
        return jsonResult($News);
    }

    public function update(Request $request , $id)
    {
        $News = News::findOrFail($id);

        $News->update($this->validateField($request));

        return jsonResult($News);
    }

    public function remove(Request $request , $id)
    {
        $News = News::findOrFail($id);
        
        $News->delete();

        return jsonResult($News);
    }

    private function validateField($request){
        $validated =  $request->validate([
            'title' => "required",
            'text' => "required"
        ]);
        if($request->hasFile('img')){
            $validated['img'] = Uploader::save($request->img);
        }
        return $validated;
    }
}