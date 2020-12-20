<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndexPage;
use App\Models\HeaderSlider;
use App\Models\Project;
use App\Models\Company;
use App\Models\Course;
use App\Models\Product;
use App\Models\Category;    
use App\Models\News;
use App\Models\Appreciation;
use App\Models\Certificate;
use App\Models\Community;

use App\Http\Controllers\ImageUploadController as Uploader;

require_once __DIR__.'/helpers.php';


class IndexPageController extends Controller
{
    public function index(Request $request)
    {
        $IndexPages = IndexPage::first();
        return jsonResult($IndexPages);
    }

    public function store(Request $request)
    {
        $IndexPage = IndexPage::first();
        $IndexPage->update($this->validateField($request));
        return jsonResult($IndexPage);
    }

    public function update(Request $request , $id)
    {
        $IndexPage = IndexPage::findOrFail($id);

        $IndexPage->update($this->validateField($request));

        return jsonResult($IndexPage);
    }

    public function remove(Request $request , $id)
    {
        $IndexPage = IndexPage::findOrFail($id);
        
        $IndexPage->delete();

        return jsonResult($IndexPage);
    }

    private function validateField($request){
        
        $validated =  $request->validate([
            'header_title1' => "required",
            'header_title2' => "required",
            'header_text' => "required",
            'projects_title1' => "required",
            'projects_title2' => "required",
            'projects_text' => "required",
            'courses_title1' => "required",
            'courses_title2' => "required",
            'products_title1' => "required",
            'products_title2' => "required",
            'news_title' => "required"
        ]);
        return $validated;
    }

    public function page()
    {
        $data = IndexPage::first();
        $data['sliders'] = HeaderSlider::all();
        $data['popular'] = Course::where('popular' , 1)->get();
        $data['projects'] = Project::all();
        $data['courses'] = Course::all();
        $data['companies'] = Company::all();
        $data['news'] = News::all();
        $data['categories'] = Category::all();
        $data['products'] = Product::all();
        return jsonResult($data);
    }

    public function about()
    {
        $data = [];
        $data['companies'] = Company::all();
        $data['appreciations'] = Appreciation::all();
        $data['communities'] = Community::all();
        $data['certificates'] = Certificate::all();
        return jsonResult($data);
    }
}