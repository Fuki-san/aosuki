@extends('layouts.add')

@section('title', 'プロフィール欄')

@section('content')
    
    <h1>プロフィール欄</h1>
    <button><a href="{{ route('dashboard') }}">戻る</a></button>
    <button><a href="{{ route('プロフィールを') }}">戻る</a></button>
@endsection
