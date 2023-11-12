@extends('layouts.add')

@section('title', 'プロフィール一覧')

@section('content')
    <h1>プロフィール一覧</h1>
    <table border="1">
        <tr>
            <th>名前</th>
            <th>名前(英語)</th>
            <th>半径</th>
            <th>重量</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($profiles as $profile)
            <tr>
                <td>{{ $profile->nickname }}</td>
                <td>{{ $profile->body }}</td>
                <td>{{ $profile->radius }}</td>
                <td>{{ $profile->weight }}</td>
                <td><a href="{{ route('profiles.show', $profile) }}">詳細</a></td>
                <td><a href="{{ route('profiles.edit', $profile) }}">編集</a></td>
                <td>
                    <form action="{{ route('profiles.destroy', $profile) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick='if(!confirm("削除しますか？")) {return false;}'>削除する</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('profiles.create') }}">新規登録</a>
@endsection

