<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AppreciationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\IndexPageController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HeaderNavController;
use App\Http\Controllers\HeaderSliderController;
use App\Http\Controllers\LinkController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//project crud

Route::get('/project' , [ProjectController::class , 'index']);

Route::post('project' , [ProjectController::class , 'store']);

Route::delete('/project/{id}' , [ProjectController::class , 'remove']);

//news crud

Route::get('/news' , [NewsController::class , 'index']);

Route::post('news' , [NewsController::class , 'store']);

Route::delete('/news/{id}' , [NewsController::class , 'remove']);

//product crud

Route::get('/product' , [ProductController::class , 'index']);

Route::post('product' , [ProductController::class , 'store']);

Route::delete('/product/{id}' , [ProductController::class , 'remove']);

//course crud

Route::get('/course' , [CourseController::class , 'index']);

Route::post('course' , [CourseController::class , 'store']);

Route::delete('/course/{id}' , [CourseController::class , 'remove']);

//link crud

Route::get('/link' , [LinkController::class , 'index']);

Route::post('link' , [LinkController::class , 'store']);

Route::delete('/link/{id}' , [LinkController::class , 'remove']);

//category crud

Route::get('/category' , [CategoryController::class , 'index']);

Route::post('category' , [CategoryController::class , 'store']);

Route::delete('/category/{id}' , [CategoryController::class , 'remove']);

//appreciation crud

Route::get('/appreciation' , [AppreciationController::class , 'index']);

Route::post('appreciation' , [AppreciationController::class , 'store']);

Route::delete('/appreciation/{id}' , [AppreciationController::class , 'remove']);

//certificate crud

Route::get('/certificate' , [CertificateController::class , 'index']);

Route::post('certificate' , [CertificateController::class , 'store']);

Route::delete('/certificate/{id}' , [CertificateController::class , 'remove']);

//community crud

Route::get('/community' , [CommunityController::class , 'index']);

Route::post('community' , [CommunityController::class , 'store']);

Route::delete('/community/{id}' , [CommunityController::class , 'remove']);

//company crud

Route::get('/company' , [CompanyController::class , 'index']);

Route::post('company' , [CompanyController::class , 'store']);

Route::delete('/company/{id}' , [CompanyController::class , 'remove']);


//message crud

Route::get('/message' , [MessageController::class , 'index']);

Route::post('message' , [MessageController::class , 'store']);

Route::delete('/message/{id}' , [MessageController::class , 'remove']);


//contact us page crud

Route::get('/contact' , [ContactUsController::class , 'index']);

Route::post('contact' , [ContactUsController::class , 'store']);


//footer crud

Route::get('/footer' , [FooterController::class , 'index']);

Route::post('footer' , [FooterController::class , 'store']);

//header nav crud

Route::get('/nav' , [HeaderNavController::class , 'index']);

Route::post('nav' , [HeaderNavController::class , 'store']);


//index us page crud

Route::get('/index' , [IndexPageController::class , 'index']);

Route::post('index' , [IndexPageController::class , 'store']);


//slider crud

Route::get('/slider' , [HeaderSliderController::class , 'index']);

Route::post('slider' , [HeaderSliderController::class , 'store']);

Route::delete('/slider/{id}' , [HeaderSliderController::class , 'remove']);


Route::get('pages/index' , [IndexPageController::class , 'page']);

Route::get('pages/about-us' , [IndexPageController::class , 'about']);