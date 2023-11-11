<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Chat;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // ユーザー識別子がなければランダムに生成してセッションに登録
        if (!$request->session()->has('user_identifier')) {
            $request->session()->put('user_identifier', Str::random(20));
        }

        if (!$request->session()->has('user_name')) {
            $request->session()->put('user_name', 'Guest');
        }

        // データーベースの件数を取得
        $length = Chat::count();

        // 画面に表示する件数を代入
        $display = 5;

        // 最新のチャットを画面に表示する分だけ取得して変数に代入
        $chats = Chat::latest()->limit($display)->get();

        // チャットデータをビューに渡して表示
        return view('chats.index', compact('chats'));
    }

    public function store(Request $request)
    {
        // フォームに入力されたユーザー名をセッションに登録
        $request->session()->put('user_name', $request->user_name);

        // フォームに入力されたチャットデータをデータベースに登録
        Chat::create($request->all());

        // 最初の画面にリダイレクト
        return redirect('/chat');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
