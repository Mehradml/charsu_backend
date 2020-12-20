<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class CommunityController extends Controller
{
    public function index(Request $request)
    {
        $Communitys = Community::all();
        return jsonResult($Communitys);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $Community = Community::findOrFail($request->id);
            $Community->update($this->validateField($request));
        }
        else{
            $Community = Community::create($this->validateField($request));
        }
        return jsonResult($Community);
    }

    public function update(Request $request , $id)
    {
        $Community = Community::findOrFail($id);

        $Community->update($this->validateField($request));

        return jsonResult($Community);
    }

    public function remove(Request $request , $id)
    {
        $Community = Community::findOrFail($id);
        
        $Community->delete();

        return jsonResult($Community);
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