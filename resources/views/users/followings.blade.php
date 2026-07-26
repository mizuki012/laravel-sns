@extends('layouts.app')

@section('title', $user->name . 'さんのフォロー中')

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
                </div>
            </div>
        </aside>

        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item">
                    <a href="{{ route('users.show', $user) }}" class="nav-link">
                        タイムライン
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.followings', $user) }}" class="nav-link active">
                        フォロー中
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.followers', $user) }}" class="nav-link">
                        フォロワー
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled">
                @foreach ($users as $followUser)
                    <li class="mb-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('users.show', $followUser) }}">
                                    {{ $followUser->name }}
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="m-auto" style="width: fit-content">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection