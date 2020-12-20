<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $Products = Product::all();
        return jsonResult($Products);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $Product = Product::findOrFail($request->id);
            $Product->update($this->validateField($request));
        }
        else{
            $Product = Product::create($this->validateField($request));
        }
        return jsonResult($Product);
    }

    public function update(Request $request , $id)
    {
        $Product = Product::findOrFail($id);

        $Product->update($this->validateField($request));

        return jsonResult($Product);
    }

    public function remove(Request $request , $id)
    {
        $Product = Product::findOrFail($id);
        
        $Product->delete();

        return jsonResult($Product);
    }

    private function validateField($request){
        $validated =  $request->validate([
            'title' => "required",
            'price' => "required"
        ]);
        if($request->hasFile('img')){
            $validated['img'] = Uploader::save($request->img);
        }
        return $validated;
    }
}