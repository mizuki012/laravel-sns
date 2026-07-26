<section>
    <p class="text-muted">
        安全のため、現在のパスワードを入力したうえで新しいパスワードに変更できます。
    </p>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="update_password_current_password">
                現在のパスワード
            </label>

            <input
                id="update_password_current_password"
                type="password"
                name="current_password"
                class="form-control"
                autocomplete="current-password"
            >

            @foreach ($errors->updatePassword->get('current_password') as $message)
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
            @endforeach
        </div>

        <div class="form-group">
            <label for="update_password_password">
                新しいパスワード
            </label>

            <input
                id="update_password_password"
                type="password"
                name="password"
                class="form-control"
                autocomplete="new-password"
            >

            @foreach ($errors->updatePassword->get('password') as $message)
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
            @endforeach
        </div>

        <div class="form-group">
            <label for="update_password_password_confirmation">
                新しいパスワード確認
            </label>

            <input
                id="update_password_password_confirmation"
                type="password"
                name="password_confirmation"
                class="form-control"
                autocomplete="new-password"
            >

            @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">
            パスワードを更新する
        </button>

        @if (session('status') === 'password-updated')
            <span class="text-success ml-3">
                保存しました。
            </span>
        @endif
    </form>
</section>