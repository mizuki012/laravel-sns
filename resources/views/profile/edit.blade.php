@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')
    <h2 class="mt-5 mb-4">
        プロフィール編集
    </h2>

    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card mb-4">
                <div class="card-header">
                    ユーザー情報の編集
                </div>

                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    パスワード変更
                </div>

                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-danger text-white">
                    アカウント削除
                </div>

                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection