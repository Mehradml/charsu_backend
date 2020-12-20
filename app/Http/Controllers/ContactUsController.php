<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $ContactUss = ContactUs::first();
        return jsonResult($ContactUss);
    }

    public function store(Request $request)
    {
        $ContactUs = ContactUs::first();
        $ContactUs->update($this->validateField($request));
        return jsonResult($ContactUs);
    }

    public function update(Request $request , $id)
    {
        $ContactUs = ContactUs::findOrFail($id);

        $ContactUs->update($this->validateField($request));

        return jsonResult($ContactUs);
    }

    public function remove(Request $request , $id)
    {
        $ContactUs = ContactUs::findOrFail($id);
        
        $ContactUs->delete();

        return jsonResult($ContactUs);
    }

    private function validateField($request){
        
        $validated =  $request->validate([
            'title1' => "required",
            'title2' => "required",
            'address' => "required",
            'phone' => "required",
            'email' => "required",
            'img_link' => "required"
        ]);
        if($request->hasFile('img')){
            $validated['img'] = Uploader::save($request->img);
        }
        return $validated;
    }
}