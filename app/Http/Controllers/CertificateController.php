<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $Certificates = Certificate::all();
        return jsonResult($Certificates);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $Certificate = Certificate::findOrFail($request->id);
            $Certificate->update($this->validateField($request));
        }
        else{
            $Certificate = Certificate::create($this->validateField($request));
        }
        return jsonResult($Certificate);
    }

    public function update(Request $request , $id)
    {
        $Certificate = Certificate::findOrFail($id);

        $Certificate->update($this->validateField($request));

        return jsonResult($Certificate);
    }

    public function remove(Request $request , $id)
    {
        $Certificate = Certificate::findOrFail($id);
        
        $Certificate->delete();

        return jsonResult($Certificate);
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