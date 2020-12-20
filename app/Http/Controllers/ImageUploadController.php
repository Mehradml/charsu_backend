<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once __DIR__.'/helpers.php';

class ImageUploadController extends Controller
{
    public static function save($image)
    {
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('uploads'), $imageName);
        return "http://localhost:8000/uploads/$imageName";
    }
}