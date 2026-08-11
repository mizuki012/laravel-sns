@extends('layouts.app')

@section('title', 'Topic Posts')

@section('content')
    <div class="center jumbotron bg-info">
        <div class="text-center text-white mt-2 pt-1">
            <h1>
                <i class="pr-3"></i>
                Topic Posts
            </h1>
        </div>
    </div>

    <h5 class="text-center mb-3">
        "○○"について140字以内で会話しよう！
    </h5>

    <div class="w-75 m-auto">
        @include('commons.error_messages')
    </div>

    @auth
        <div class="text-center mb-3">
            <form method="POST" action="{{ route('posts.store') }}" class="d-inline-block w-75">
                @csrf

                <div class="form-group">
                    <textarea
                        class="form-control"
                        name="content"
                        rows="4"
                        maxlength="140"
                        placeholder="140字以内で投稿してください"
                    >{{ old('content') }}</textarea>

                    <div class="text-left mt-3">
                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="text-center mb-3">
            <p>
                投稿するにはログインしてください。
            </p>

            <a href="{{ route('login') }}" class="btn btn-primary">
                ログイン
            </a>

            <a href="{{ route('register') }}" class="btn btn-outline-primary">
                新規ユーザ登録
            </a>
        </div>
    @endauth

    @include('posts.posts')
@endsection