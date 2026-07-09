@extends('layouts.app')

@section('title', '新規ユーザ登録')

@section('content')
    <div class="text-center">
        <h1>
            <i class="fab fa-telegram fa-lg pr-3"></i>
            Topic Posts
        </h1>
    </div>

    <div class="text-center mt-3">
        <p class="text-left d-inline-block">
            新規ユーザ登録すると投稿で<br>
            コミュニケーションができるようになります。
        </p>
    </div>

    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">
            新規ユーザ登録
        </h3>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-sm-6 offset-sm-3">
            @include('commons.error_messages')

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">名前</label>
                    <input
                        id="name"
                        type="text"
                        class="form-control"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                    >
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input
                        id="email"
                        type="email"
                        class="form-control"
                        name="email"
                        value="{{ old('email') }}"
                        required
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
                        autocomplete="new-password"
                    >
                </div>

                <div class="form-group">
                    <label for="password_confirmation">
                        パスワード確認
                    </label>
                    <input
                        id="password_confirmation"
                        type="password"
                        class="form-control"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    >
                </div>

                <button type="submit" class="btn btn-primary mt-2">
                    新規登録
                </button>
            </form>

            <div class="mt-3">
                <a href="{{ route('login') }}">
                    すでに登録済みの方はこちら
                </a>
            </div>
        </div>
    </div>
@endsection