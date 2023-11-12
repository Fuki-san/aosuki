@extends('layouts.add')

@section('title', 'お知らせ')

@section('content')
    
    <h1>お知らせ</h1>
    <button><a href="{{ route('dashboard') }}">ホームに戻る</a></button>
    <button><a href="{{ route('announcements.') }}">お知らせを全て既読にする</a></button>
@endsection
