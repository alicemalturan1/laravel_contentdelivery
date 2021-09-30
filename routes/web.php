<?php

use Illuminate\Support\Facades\Crypt;
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
Route::post('/accessdemo',[\App\Http\Controllers\UserController::class,'access_demo']);
Route::group(['middleware'=>'demoaccess'],function(){

    Route::get('/', function () {
        return view('client.home');
    })->name('home');
    Route::get('/search/{key}',[\App\Http\Controllers\ContentController::class,'search_view']);
    Route::post('/search/continue',[\App\Http\Controllers\ContentController::class,'continue_search']);
    Route::post('/login',[\App\Http\Controllers\UserController::class,'login']);
    Route::post('/register',[\App\Http\Controllers\UserController::class,'register']);
    Route::group(['prefix'=>'content'],function(){
        Route::get('/{self}-{id}',[\App\Http\Controllers\ContentController::class,'view'])->name('content_view');
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
        Route::post('/update_avatar',[\App\Http\Controllers\UserController::class,'change_avatar']);
        Route::post('/support_ticket',[\App\Http\Controllers\UserController::class,'create_support_ticket']);
    });
    Route::get("/admin/login",function(){
        return view("admin.login");
    })->name('panel_login');

    Route::get('/admin/devmail',function(){
        return view('mail.developer_support',  [
            'name'=>'Ali Cemal Turan',
            'content'=>'Dewamek sorunke yardımke plske ',
            'subject'=>'Sorun olmuske',
            'title'=>'Yardım edin',
            'token'=>Crypt::encryptString('try-'.time().'1-'),
        ]);
    });
    Route::post('/admin/sendDeveloperMail',[\App\Http\Controllers\MailController::class,'send_developer_support'])->middleware('auth');
    Route::post('/admin/setPanelColor',[\App\Http\Controllers\Controller::class,'setPanelColor'])->middleware('auth');
    Route::group(['prefix'=>'admin/views/','middleware'=>'auth','middleware'=>'panel_auth'],function(){

       Route::get('/{any}',function($any){
         if (view()->exists("admin.".$any)){
             return view("admin.".$any);
         }else{
             return redirect()->route('home');
         }
       })->name('PanelView');

        Route::get('/list_content',function (){
            return view('admin.list_contents');
        });
        Route::get('/edit_content/{id}',function($id){
            return view('admin.edit_content',['content'=>\App\Models\Content::Where('id',$id)->first()]);
        })->name('edit_content');
        Route::get("/view_content_blocks",function (){
            return view("admin.blocks_info");
        })->name('content_blocksinfo');
        Route::get('/settings')->name('settings');
    });
    Route::post('/auth-check',[\App\Http\Controllers\UserController::class,'auth_check']);
    Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout']);

});
