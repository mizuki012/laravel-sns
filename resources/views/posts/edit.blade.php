@extends('layouts.app')

@section('title', '投稿編集')

@section('content')
    <h2 class="mt-5">
        投稿を編集する
    </h2>

    <div class="w-75 m-auto">
        @include('commons.error_messages')
    </div>

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <textarea
                id="content"
                class="form-control"
                name="content"
                rows="4"
                maxlength="140"
            >{{ old('content', $post->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            更新する
        </button>

        <a href="{{ url('/') }}" class="btn btn-secondary">
            戻る
        </a>
    </form>
@endsection