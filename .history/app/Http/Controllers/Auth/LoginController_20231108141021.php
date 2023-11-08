<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
//認証しに行く処理
    public function redirectToProvider(Request $request)
    {
        $provider = $request->provider;
        return Socialite::driver($provider)->redirect();
    }
//認証後のユーザー情報を外部プロバイダから受け取り、ログインまたは登録するまでの処理
    public function handleProviderCallback(Request $request) {
        $provider = $request->provider;
        $social_user = Socialite::driver($provider)->user();
        $social_email = $social_user->getEmail();
        $social_name = $social_user->get
    }
}
