<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CatagoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class, 'index']);
Route::get('/catagory', [FrontendController::class, 'catagory']);
Route::get('/view-catagory/{slug}',[FrontendController::class, 'viewcatagory']);
Route::get('/catagory/{cate_slug}/{prod_slug}',[FrontendController::class, 'productview']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', 'Admin\FrontendController@index');
    Route::get('/catagories', 'Admin\CatagoryController@index');
    Route::get('/add-catagory', 'Admin\CatagoryController@add');
    Route::post('/insert-catagory', 'Admin\CatagoryController@insert');
    Route::get('/edit-catagory/{id}',[CatagoryController::class, 'edit']);
    Route::post('/update-catagory/{id}',[CatagoryController::class, 'update']);
    Route::get('/delete-catagory/{id}',[CatagoryController::class, 'destroy']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/add-products', [ProductController::class, 'add']);
    Route::post('/insert-product', [ProductController::class, 'insert']);
    Route::get('/edit-product/{id}',[ProductController::class, 'edit']);
    Route::post('/update-product/{id}',[ProductController::class, 'update']);
    Route::get('/delete-product/{id}',[ProductController::class, 'destroy']);

});

