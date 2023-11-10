<?php

use App\Http\Controllers\DislikeController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\MatchbwuserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PreferenceController;
use App\Models\Dislike;

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

Route::resource('posts', PostController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('posts', PostController::class)
    ->only(['show', 'index']);

Route::resource('dislikes', DislikeController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('dislikes', DislikeController::class)
    ->only(['show', 'index']);

Route::resource('hobbies', HobbyController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('hobbies', HobbyController::class)
    ->only(['show', 'index']);

Route::resource('likes', LikeController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('likes', LikeController::class)
    ->only(['show', 'index']);

Route::resource('matchbwusers', MatchbwuserController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('matchbwusers', MatchbwuserController::class)
    ->only(['show', 'index']);


Route::resource('mbties', MBTIController::class)
    ->only(['show', 'index']);
Route::resource('mbties', MBTIController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');

Route::resource('preferences', PreferenceController::class)
    ->only(['show', 'index']);
Route::resource('preferences', PreferenceController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
