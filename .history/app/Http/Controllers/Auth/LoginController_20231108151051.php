<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    // //認証しに行く処理
    // public function redirectToProvider(Request $request)
    // {
    //     $provider = $request->provider;
    //     return Socialite::driver($provider)->redirect();
    // }
    // //認証後のユーザー情報を外部プロバイダから受け取り、ログインまたは登録するまでの処理
    // public function handleProviderCallback(Request $request)
    // {
    //     //つまりログインまたは登録するためのユーザー情報を最終的に取得するために、プロバイダーを取得してから、
    //     //ユーザー情報を取得し、emailとnameを最終的に取得している。
    //     $provider = $request->provider;
    //     $social_user = Socialite::driver($provider)->user();
    //     $social_email = $social_user->getEmail();
    //     $social_name = $social_user->getName();

    //     if (!is_null($social_email)) {
    //         //外部プロバイダからユーザー情報を上記で取得した後、このデータからデータベースに登録しているレコード(ユーザー)を見つける
    //         //Userモデルのemailカラム列('email')から$social_emailの値を探し一致させる(=>$social_email)
    //         //firstOrCreateは、第一引数に見つけたらそのレコード(ユーザー)を取得して、第二引数に見つからなかったときにデータを作成するメソッド
    //         $user = User::firstOrCreate(
    //             ['email' => $social_email],
    //             [
    //                 'email' => $social_email, 'name' => $social_name, 'password' => Hash::make(Str::random())
    //             ]
    //         );

    //         auth()->login($user);
    //         return redirect('/dashboard');
    //     }
    //     return '必要な情報が取得できていません。';
    // }
    
}
