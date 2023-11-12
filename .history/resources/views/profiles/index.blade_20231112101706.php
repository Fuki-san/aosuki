@extends('layouts.add')

@section('title', 'ぷ')

@section('content')
    <div class="container small">
        <h1>あなたのプロフィール</h1>
        <form action="{{ route('profiles.store') }}" method="POST">
            @csrf
            <fieldset>
                <div class="form-group">
                    <label for="nickname">{{ __('ニックネーム') }}<span
                            class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                    <input type="text" class="form-control" name="nickname" id="nickname">
                    <div class="d-flex justify-content-between pt-3">
                        <a href="{{ route('profiles.index') }}" class="btn btn-outline-secondary" role="button">
                            <i class="fa fa-reply mr-1" aria-hidden="true"></i>{{ __('一覧画面へ') }}
                        </a>
                        <button type="submit" class="btn btn-success">
                            {{ __('登録') }}
                        </button>
                    </div>
            </fieldset>
        </form>
    </div>
@endsection
