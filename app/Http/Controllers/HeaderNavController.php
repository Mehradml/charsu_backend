<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderNav;


class HeaderNavController extends Controller
{
    public function index(Request $request)
    {
        $HeaderNavs = HeaderNav::first();
        return jsonResult($HeaderNavs);
    }

    public function store(Request $request)
    {
        $HeaderNav = HeaderNav::first();
        $HeaderNav->update($this->validateField($request));
        return jsonResult($HeaderNav);
    }

    public function update(Request $request , $id)
    {
        $HeaderNav = HeaderNav::findOrFail($id);

        $HeaderNav->update($this->validateField($request));

        return jsonResult($HeaderNav);
    }

    public function remove(Request $request , $id)
    {
        $HeaderNav = HeaderNav::findOrFail($id);
        
        $HeaderNav->delete();

        return jsonResult($HeaderNav);
    }

    private function validateField($request){
        
        return $request->validate([
            "title1" => "sometimes",
            "link1" => "sometimes",
            "title2" => "sometimes",
            "link2" => "sometimes",
            "title3" => "sometimes",
            "link3" => "sometimes",
            "title4" => "sometimes",
            "link4" => "sometimes",
            "title5" => "sometimes",
            "link5" => "sometimes",
            "title6" => "sometimes",
            "link6" => "sometimes",
        ]);
    }
}