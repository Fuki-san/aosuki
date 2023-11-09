<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('login/{provider}')->where(['provider' => 'line|github'])->group(function(){
    //redirectToProviderアクションは、Line(外部プロバイダ)へ認証フローを開始するためのもの
    Route::get('/', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('social_login.redirect');
    //handleProviderCallbackアクションは、外部プロバイダの認証が終わった後にコールバックurl(ここでは/callback)のルートへ
    //ユーザー情報を提供し、アプリへログインや登録をさせるときに使うメソッド
    Route::get('/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback')->name('social_login.callback');
    // /login/line,/login/line/callback,/login/github/,/login/github/callbackが有効なURL
});

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::resource('people', PersonController::class)
    ->middleware()
