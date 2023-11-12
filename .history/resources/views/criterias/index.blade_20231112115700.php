@extends('layouts.add')

@section('title', 'プロフィール欄')

@section('content')
    
    <h1>マッチング条件</h1>
    <button><a href="{{ route('dashboard') }}">戻る</a></button>
    <button><a href="{{ route('criteria') }}">戻る</a></button>
@endsection
