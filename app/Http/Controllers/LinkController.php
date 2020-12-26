<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
require_once __DIR__.'/helpers.php';


class LinkController extends Controller
{
    public function index(Request $request)
    {
        $Links = Link::all();
        return jsonResult($Links);
    }

    public function store(Request $request)
    {
        if($request->id != null){
            $Link = Link::findOrFail($request->id);
            $Link->update($this->validateField($request));
        }
        else{
            $Link = Link::create($this->validateField($request));
        }
        return jsonResult($Link);
    }

    public function update(Request $request , $id)
    {
        $Link = Link::findOrFail($id);

        $Link->update($this->validateField($request));

        return jsonResult($Link);
    }

    public function remove(Request $request , $id)
    {
        $Link = Link::findOrFail($id);
        
        $Link->delete();

        return jsonResult($Link);
    }

    private function validateField($request){
        return $request->validate([
            'title' => "required",
            'link' => "required",
        ]);
    }
}