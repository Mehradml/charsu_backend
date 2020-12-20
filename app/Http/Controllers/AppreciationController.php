<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appreciation;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class AppreciationController extends Controller
{
    public function index(Request $request)
    {
        $Appreciations = Appreciation::all();
        return jsonResult($Appreciations);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $Appreciation = Appreciation::findOrFail($request->id);
            $Appreciation->update($this->validateField($request));
        }
        else{
            $Appreciation = Appreciation::create($this->validateField($request));
        }
        return jsonResult($Appreciation);
    }

    public function update(Request $request , $id)
    {
        $Appreciation = Appreciation::findOrFail($id);

        $Appreciation->update($this->validateField($request));

        return jsonResult($Appreciation);
    }

    public function remove(Request $request , $id)
    {
        $Appreciation = Appreciation::findOrFail($id);
        
        $Appreciation->delete();

        return jsonResult($Appreciation);
    }

    private function validateField($request){
        $validated =  $request->validate([
            'title' => "required",
        ]);
        if($request->hasFile('img')){
            $validated['img'] = Uploader::save($request->img);
        }
        return $validated;
    }
}