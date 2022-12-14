<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;


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

Route::get('/',[Homecontroller::class,'index'])->name('home');

Route::group(['middlewire' => 'auth', 'prefix'=>'dashboard'], function(){
    
    //Daashboard
    Route::group(['prefix'=>'', 'as'=>'dashboard.'], function(){
        
        Route::get('/',[DashboardController::class, 'index'])->name('index');
    });

    //Category

   //Route::resource('categories', CategoryController::class);

    Route::group(['prefix'=>'categories','as'=>'categories.'], function(){
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('create',[CategoryController::class,'create'])->name('create');
        Route::post('/',[CategoryController::class,'store'])->name('store');
        Route::get('{category:slug}/edit',[CategoryController::class,'edit'])->name('edit');
        Route::put('{category:slug}/update',[CategoryController::class,'update'])->name('update');
        Route::delete('{category:slug}/delete',[CategoryController::class,'destroy'])->name('delete');
        
    });

    //Tags 
    Route::group(['prefix'=>'tags','as'=>'tags.'], function(){
        Route::get('/',[TagController::class,'index'])->name('index');
        Route::get('create',[TagController::class,'create'])->name('create');
        Route::post('/',[TagController::class,'store'])->name('store');
        Route::get('{tag:slug}/edit',[TagController::class,'edit'])->name('edit');
        Route::put('{tag:slug}/update',[TagController::class,'update'])->name('update');
        Route::delete('{tag:slug}/delete',[TagController::class,'destroy'])->name('delete');
        
    });


     //Post 
     Route::group(['prefix'=>'posts','as'=>'posts.'], function(){
        Route::get('/',[PostController::class,'index'])->name('index');
        Route::get('create',[PostController::class,'create'])->name('create');
        Route::post('/',[PostController::class,'store'])->name('store');
        Route::get('{post:slug}/edit',[PostController::class,'edit'])->name('edit');
        Route::put('{post:slug}/update',[PostController::class,'update'])->name('update');
        Route::get('{post:slug}/show',[PostController::class,'show'])->name('show');
        Route::delete('{post:slug}/delete',[PostController::class,'destroy'])->name('delete');
        
    });

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
       return view('dashboard.index');
    })->name('dashboard.index');
});
