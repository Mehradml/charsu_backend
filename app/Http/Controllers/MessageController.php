<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class MessageController extends Controller
{
    public function index(Request $request)
    {
        $Messages = Message::all();
        return jsonResult($Messages);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $Message = Message::findOrFail($request->id);
            $Message->update($this->validateField($request));
        }
        else{
            $Message = Message::create($this->validateField($request));
        }
        return jsonResult($Message);
    }

    public function update(Request $request , $id)
    {
        $Message = Message::findOrFail($id);

        $Message->update($this->validateField($request));

        return jsonResult($Message);
    }

    public function remove(Request $request , $id)
    {
        $Message = Message::findOrFail($id);
        
        $Message->delete();

        return jsonResult($Message);
    }

    private function validateField($request){
        $validated =  $request->validate([
            'name' => "required",
            'email' => "required",
            'phone' => "required",
            'title' => "required",
            'text' => "required"
        ]);
        if($request->hasFile('file')){
            $validated['file'] = Uploader::save($request->file);
        }
        return $validated;
    }
}