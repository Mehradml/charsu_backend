<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderSlider;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class HeaderSliderController extends Controller
{
    public function index(Request $request)
    {
        $HeaderSliders = HeaderSlider::all();
        return jsonResult($HeaderSliders);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $HeaderSlider = HeaderSlider::findOrFail($request->id);
            $HeaderSlider->update($this->validateField($request));
        }
        else{
            $HeaderSlider = HeaderSlider::create($this->validateField($request));
        }
        return jsonResult($HeaderSlider);
    }

    public function update(Request $request , $id)
    {
        $HeaderSlider = HeaderSlider::findOrFail($id);

        $HeaderSlider->update($this->validateField($request));

        return jsonResult($HeaderSlider);
    }

    public function remove(Request $request , $id)
    {
        $HeaderSlider = HeaderSlider::findOrFail($id);
        
        $HeaderSlider->delete();

        return jsonResult($HeaderSlider);
    }

    private function validateField($request){
        if($request->hasFile('img')){
            $validated['img'] = Uploader::save($request->img);
        }
        return $validated;
    }
}