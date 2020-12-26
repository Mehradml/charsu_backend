<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
require_once __DIR__.'/helpers.php';

class FooterController extends Controller
{
    public function index(Request $request)
    {
        $Footers = Footer::first();
        return jsonResult($Footers);
    }

    public function store(Request $request)
    {
        $Footer = Footer::first();
        $Footer->update($this->validateField($request));
        return jsonResult($Footer);
    }

    public function update(Request $request , $id)
    {
        $Footer = Footer::findOrFail($id);

        $Footer->update($this->validateField($request));

        return jsonResult($Footer);
    }

    public function remove(Request $request , $id)
    {
        $Footer = Footer::findOrFail($id);
        
        $Footer->delete();

        return jsonResult($Footer);
    }

    private function validateField($request){
        
        return $request->validate([
            "googleLink" => "sometimes",
            "facebookLink" => "sometimes",
            "aparatLink" => "sometimes",
            "linkedInLink" => "sometimes",
            "telegramLink" => "sometimes",
            "instagramLink" => "sometimes",
            "youtubeLink" => "sometimes",
            "twitterLink" => "sometimes",
            "text" => "sometimes",
            "email" => "sometimes",
            "phone" => "sometimes",
            "accessTitle1" => "sometimes",
            "accessLink1" => "sometimes",
            "accessLink2" => "sometimes",
            "accessTitle2" => "sometimes",
            "accessTitle3" => "sometimes",
            "accessLink3" => "sometimes",
            "accessTitle4" => "sometimes",
            "accessLink4" => "sometimes",
            "connectionTitle1" => "sometimes",
            "connectionLink1" => "sometimes",
            "connectionTitle2" => "sometimes",
            "connectionLink2" => "sometimes",
            "connectionTitle3" => "sometimes",
            "connectionLink3" => "sometimes",
            "connectionTitle4" => "sometimes",
            "connectionLink4" => "sometimes",
            "connectionTitle5" => "sometimes",
            "connectionLink5" => "sometimes",
            "accessTitle5" => "sometimes",
            "accessLink5" => "sometimes",
        ]);
    }
}