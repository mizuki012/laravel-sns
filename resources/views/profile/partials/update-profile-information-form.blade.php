<section>
    <p class="text-muted">
        ユーザー名とメールアドレスを変更できます。
    </p>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">
                ユーザー名
            </label>

            <input
                id="name"
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            >

            @error('name')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">
                メールアドレス
            </label>

            <input
                id="email"
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            >

            @error('email')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-muted mb-2">
                        メールアドレスが未認証です。
                    </p>

                    <button
                        form="send-verification"
                        class="btn btn-link p-0"
                    >
                        確認メールを再送信する
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success mt-2">
                            新しい確認メールを送信しました。
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            保存する
        </button>

        @if (session('status') === 'profile-updated')
            <span class="text-success ml-3">
                保存しました。
            </span>
        @endif
    </form>
</section>