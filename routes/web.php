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

Route::get('/', function () {
    return view('client.home');
})->name('home');
Route::post('/login',[\App\Http\Controllers\UserController::class,'login']);
Route::post('/register',[\App\Http\Controllers\UserController::class,'register']);
Route::group(['prefix'=>'content'],function(){
    Route::get('/{self}-{id}',[\App\Http\Controllers\ContentController::class,'view']);
    Route::post('/like',[\App\Http\Controllers\ContentController::class,'like_toggle']);
    Route::post('/disslike',[\App\Http\Controllers\ContentController::class,'disslike_toggle']);
    Route::post('/fav',[\App\Http\Controllers\ContentController::class,'favorite'])->middleware('auth');
    Route::post('/rate',[\App\Http\Controllers\ContentController::class,'rate']);
    Route::post('/report',[\App\Http\Controllers\ContentController::class,'report']);
    Route::get('/download/{id}',[\App\Http\Controllers\ContentController::class,'download']);
});

Route::group(['prefix'=>'/my','middleware'=>'auth'],function(){
    Route::get('/profile',function(){
        return view("client.profile");
    });
    Route::post('/update',[\App\Http\Controllers\UserController::class,'update']);
    Route::post('/changepassword',[\App\Http\Controllers\UserController::class,'change_password']);
});


Route::post('/auth-check',[\App\Http\Controllers\UserController::class,'auth_check']);
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout']);
