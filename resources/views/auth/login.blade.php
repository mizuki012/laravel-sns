@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
    <div class="text-center">
        <h1>
            <i class="fab fa-telegram fa-lg pr-3"></i>
            Topic Posts
        </h1>
    </div>

    <div class="text-center mt-3">
        <p class="text-left d-inline-block">
            ログインすると投稿で<br>
            コミュニケーションができるようになります。
        </p>
    </div>

    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">
            ログイン
        </h3>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-sm-6 offset-sm-3">
            @include('commons.error_messages')

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input
                        id="email"
                        type="email"
                        class="form-control"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                    >
                </div>

                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input
                        id="password"
                        type="password"
                        class="form-control"
                        name="password"
                        required
                        autocomplete="current-password"
                    >
                </div>

                <div class="form-group form-check">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="form-check-input"
                        name="remember"
                    >
                    <label class="form-check-label" for="remember_me">
                        ログイン状態を保持する
                    </label>
                </div>

                <button type="submit" class="btn btn-primary mt-2">
                    ログイン
                </button>
            </form>

            <div class="mt-3">
                <a href="{{ route('register') }}">
                    新規ユーザ登録する？
                </a>
            </div>

            @if (Route::has('password.request'))
                <div class="mt-2">
                    <a href="{{ route('password.request') }}">
                        パスワードを忘れた方はこちら
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection