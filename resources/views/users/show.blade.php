@extends('layouts.app')

@section('title', $user->name . 'さんのページ')

@section('content')
    <div class="row">
        <aside class="col-sm-4 mb-5">
            <div class="card bg-info">
                <div class="card-header">
                    <h3 class="card-title text-light">
                        {{ $user->name }}
                    </h3>
                </div>

                <div class="card-body">
                    <p class="text-light mb-2">
                        フォロー中：{{ $user->followings()->count() }}
                    </p>

                    <p class="text-light mb-3">
                        フォロワー：{{ $user->followers()->count() }}
                    </p>

                    @auth
                        @if (auth()->id() === $user->id)
                            <div class="mt-3">
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block">
                                    ユーザ情報の編集
                                </a>
                            </div>
                        @else
                            @if (auth()->user()->isFollowing($user->id))
                                <form
                                    method="POST"
                                    action="{{ route('users.unfollow', $user) }}"
                                    class="mt-3"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-block">
                                        フォロー解除
                                    </button>
                                </form>
                            @else
                                <form
                                    method="POST"
                                    action="{{ route('users.follow', $user) }}"
                                    class="mt-3"
                                >
                                    @csrf

                                    <button type="submit" class="btn btn-primary btn-block">
                                        フォローする
                                    </button>
                                </form>
                            @endif
                        @endif
                    @endauth
                </div>
            </div>
        </aside>

        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item">
                    <a href="{{ route('users.show', $user) }}" class="nav-link active">
                        タイムライン
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.followings', $user) }}" class="nav-link">
                        フォロー中
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.followers', $user) }}" class="nav-link">
                        フォロワー
                    </a>
                </li>
            </ul>

            @include('posts.posts')
        </div>
    </div>
@endsection