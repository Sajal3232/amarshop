<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/',[
    'uses'=>'App\Http\Controllers\amarshopController@index',
    'as'=>'home-page'
]);

Route::get('/category/product/{id}',[
    'uses'=>'App\Http\Controllers\amarshopController@categoryproductsinfo',
    'as'=>'category-product'
]);
Route::get('/brand/product/{id}',[
    'uses'=>'App\Http\Controllers\amarshopController@brandproductsinfo',
    'as'=>'brand-product'
]);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// category

Route::get('/category/add',[
    'uses'=>'App\Http\Controllers\CategoryController@index',
    'as'=>'category-add'
]);
Route::post('/category/new',[
    'uses'=>'App\Http\Controllers\CategoryController@savecategoryinfo',
    'as'=>'category-new'
]);

Route::get('/category/manage',[
    'uses'=>'App\Http\Controllers\CategoryController@managecategoryinfo',
    'as'=>'category-manage'
]);
Route::get('/category/unpublished/{id}',[
    'uses'=>'App\Http\Controllers\CategoryController@unpublishedcategoryinfo',
    'as'=>'unpublished-category'
]);
Route::get('/category/published/{id}',[
    'uses'=>'App\Http\Controllers\CategoryController@publishedcategoryinfo',
    'as'=>'published-category'
]);
Route::get('/category/edit/{id}',[
    'uses'=>'App\Http\Controllers\CategoryController@editcategoryinfo',
    'as'=>'edit-category'
]);
Route::post('/category/update',[
    'uses'=>'App\Http\Controllers\CategoryController@updatecategoryinfo',
    'as'=>'update-category'
]);
Route::get('/category/delete/{id}',[
    'uses'=>'App\Http\Controllers\CategoryController@deletecategoryinfo',
    'as'=>'delete-category'
]);
// /// brand
Route::get('/brand/add',[
    'uses'=>'App\Http\Controllers\BrandController@index',
    'as'=>'add-brand'
]);
Route::post('/brand/new',[
    'uses'=>'App\Http\Controllers\BrandController@savebrandinfo',
    'as'=>'new-brand'
]);
Route::get('/brand/manage',[
    'uses'=>'App\Http\Controllers\BrandController@managebrand',
    'as'=>'manage-brand'
]);

Route::get('/brand/unpublished/{id}',[
    'uses'=>'App\Http\Controllers\BrandController@unpublishedbrandinfo',
    'as'=>'unpublished-brand'
]);
Route::get('/brand/published/{id}',[
    'uses'=>'App\Http\Controllers\BrandController@publishedbrandinfo',
    'as'=>'published-brand'
]);
Route::get('/brand/edit/{id}',[
    'uses'=>'App\Http\Controllers\BrandController@editbrandinfo',
    'as'=>'edit-brand'
]);
Route::post('/brand/update',[
    'uses'=>'App\Http\Controllers\BrandController@updatebrandinfo',
    'as'=>'update-brand'
]);
Route::get('/brand/delete/{id}',[
    'uses'=>'App\Http\Controllers\BrandController@deletebrandinfo',
    'as'=>'delete-brand'
]);
///product
Route::get('/product/add',[
    'uses'=>'App\Http\Controllers\ProductController@index',
    'as'=>'add-product'
]);
Route::post('/product/new',[
    'uses'=>'App\Http\Controllers\ProductController@saveproductinfo',
    'as'=>'new-product'
]);

Route::get('/product/manage',[
    'uses'=>'App\Http\Controllers\ProductController@mangeproductinfo',
    'as'=>'manage-product'
]);

Route::get('/product/unpublished/{id}',[
    'uses'=>'App\Http\Controllers\ProductController@productunpublishedinfo',
    'as'=>'unpublished-product'
]);
Route::get('/product/published/{id}',[
    'uses'=>'App\Http\Controllers\ProductController@productpublishedinfo',
    'as'=>'published-product'
]);
Route::get('/product/edit/{id}',[
    'uses'=>'App\Http\Controllers\ProductController@editproductinfo',
    'as'=>'edit-product'
]);
Route::post('/product/update',[
    'uses'=>'App\Http\Controllers\ProductController@updateproductinfo',
    'as'=>'product-update'
]);







