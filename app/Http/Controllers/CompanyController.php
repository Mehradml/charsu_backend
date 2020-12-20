<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $Companys = Company::all();
        return jsonResult($Companys);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $Company = Company::findOrFail($request->id);
            $Company->update($this->validateField($request));
        }
        else{
            $Company = Company::create($this->validateField($request));
        }
        return jsonResult($Company);
    }

    public function update(Request $request , $id)
    {
        $Company = Company::findOrFail($id);

        $Company->update($this->validateField($request));

        return jsonResult($Company);
    }

    public function remove(Request $request , $id)
    {
        $Company = Company::findOrFail($id);
        
        $Company->delete();

        return jsonResult($Company);
    }

    private function validateField($request){
        if($request->hasFile('img')){
            $validated['img'] = Uploader::save($request->img);
        }
        return $validated;
    }
}