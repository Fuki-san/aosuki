<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\MatchbwuserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalkController;
use App\Http\Controllers\ProfileController;

Route::get('/dash', function () {
    return view('dashboard');
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

Route::prefix('login/{provider}')->where(['provider' => 'line|github'])->group(function () {
    //redirectToProviderアクションは、Line(外部プロバイダ)へ認証フローを開始するためのもの
    Route::get('/', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('social_login.redirect');
    //handleProviderCallbackアクションは、外部プロバイダの認証が終わった後にコールバックurl(ここでは/callback)のルートへ
    //ユーザー情報を提供し、アプリへログインや登録をさせるときに使うメソッド
    Route::get('/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback')->name('social_login.callback');
    // /login/line,/login/line/callback,/login/github/,/login/github/callbackが有効なURL
});

Route::resource('talks', TalkController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('talks', TalkController::class)
    ->only(['show', 'index']);

Route::resource('profiles', ProfileController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('profiles', ProfileController::class)
    ->only(['show', 'index']);

Route::resource('matchbwusers', MatchbwuserController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('matchbwusers', MatchbwuserController::class)
    ->only(['show', 'index']);

Route::resource('criterias', CriteriaController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('criterias', CriteriaController::class)
    ->only(['show', 'index']);

Route::resource('announcements', AnnouncementController::class)
    ->only(['create', 'store', 'edit', 'update', 'destory'])
    ->middleware('auth');
Route::resource('announcements', AnnouncementController::class)
    ->only(['show', 'index']);

// LINE メッセージ受信
// Route::post('/line/webhook', 'LineMessengerController@webhook')->name('line.webhook');

// LINE メッセージ送信用
// Route::get('/line/message', 'LineMessengerController@message');


