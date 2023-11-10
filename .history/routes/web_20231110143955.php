<?php

use App\Http\Controllers\DislikeController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MatchbwuserController;
use App\Http\Controllers\MBTIController;
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

Route::get('/post', [PostController::class, 'index'])
    ->name('post_root');
// Route::get('/', [DislikeController::class, 'index'])
//     ->name('dislike_root');
// Route::get('/', [HobbyController::class, 'index'])
//     ->name('hobby_root');
// Route::get('/', [LikeController::class, 'index'])
//     ->name('like_root');
// Route::get('/', [MatchbwuserController::class, 'index'])
//     ->name('Match_root');
// Route::get('/', [MBTIController::class, 'index'])
//     ->name('mbti_root');
// Route::get('/', [PreferenceController::class, 'index'])
//     ->name('preference_root');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('login/{provider}')->where(['provider' => 'line|github'])->group(function () {
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
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('mbties', MBTIController::class)
    ->only(['show', 'index']);

Route::resource('preferences', PreferenceController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('preferences', PreferenceController::class)
    ->only(['show', 'index']);
