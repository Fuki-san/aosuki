@extends('layouts.main')

@section('title', '惑星一覧')

@section('content')
    <h1>惑星一覧</h1>
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
        @foreach ($s as $)
            <tr>
                <td>{{ $->name }}</td>
                <td>{{ $->en_name }}</td>
                <td>{{ $->radius }}</td>
                <td>{{ $->weight }}</td>
                <td><a href="{{ route('planets.show', $) }}">詳細</a></td>
                <td><a href="{{ route('planets.edit', $) }}">編集</a></td>
                <td>
                    <form action="{{ route('planets.destroy', $) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick='if(!confirm("削除しますか？")) {return false;}'>削除する</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('planets.create') }}">新規登録</a>
@endsection

