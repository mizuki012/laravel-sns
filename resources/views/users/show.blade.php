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
                    @auth
                        @if (auth()->id() === $user->id)
                            <div class="mt-3">
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block">
                                    ユーザ情報の編集
                                </a>
                            </div>
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
                    <a href="#" class="nav-link">
                        フォロー中
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        フォロワー
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled">
                @foreach ($posts as $post)
                    <li class="mb-3">
                        <div class="mb-2">
                            <p class="mt-3 mb-0">
                                投稿者：
                                {{ $post->user->name }}
                            </p>
                        </div>

                        <div>
                            <p class="mb-2">
                                {{ $post->content }}
                            </p>

                            <p class="text-muted">
                                {{ $post->created_at->format('Y年m月d日 H:i') }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="m-auto" style="width: fit-content">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection