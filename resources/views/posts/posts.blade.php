<ul class="list-unstyled">
    @foreach ($posts as $post)
        <li class="mb-3 text-center">
            <div class="text-left d-inline-block w-75 mb-2">
                <p class="mt-3 mb-0 d-inline-block">
                    投稿者：
                    <a href="{{ route('users.show', $post->user) }}">
                        {{ $post->user->name }}
                    </a>
                </p>
            </div>

            <div>
                <div class="text-left d-inline-block w-75">
                    <p class="mb-2">
                        {{ $post->content }}
                    </p>

                    <p class="text-muted">
                        {{ $post->created_at->format('Y年m月d日 H:i') }}
                    </p>

                    <div class="mb-3">
                        <span class="mr-2">
                            いいね数：{{ $post->favoritedUsers()->count() }}
                        </span>

                        @auth
                            @if (auth()->user()->isFavoriting($post->id))
                                <form
                                    method="POST"
                                    action="{{ route('posts.unfavorite', $post) }}"
                                    class="d-inline"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">
                                        ♥ いいね解除
                                    </button>
                                </form>
                            @else
                                <form
                                    method="POST"
                                    action="{{ route('posts.favorite', $post) }}"
                                    class="d-inline"
                                >
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        ♡ いいね
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>

                    @auth
                        @if ($post->user_id === auth()->id())
                            <div class="d-flex w-75 pb-3 m-auto">
                                <form
                                    method="POST"
                                    action="{{ route('posts.destroy', $post) }}"
                                    onsubmit="return confirm('この投稿を削除してもよろしいですか？');"
                                    class="mr-2"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        削除
                                    </button>
                                </form>

                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">
                                    編集する
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </li>
    @endforeach
</ul>

<div class="m-auto" style="width: fit-content">
    {{ $posts->links() }}
</div>