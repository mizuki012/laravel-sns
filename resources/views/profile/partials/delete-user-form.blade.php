<section>
    <p class="text-muted">
        アカウントを削除すると、ユーザー情報と投稿データが削除されます。
        この操作は取り消せません。
    </p>

    <form
        method="POST"
        action="{{ route('profile.destroy') }}"
        onsubmit="return confirm('本当にアカウントを削除してもよろしいですか？');"
    >
        @csrf
        @method('DELETE')

        <div class="form-group">
            <label for="password">
                確認用パスワード
            </label>

            <input
                id="password"
                type="password"
                name="password"
                class="form-control"
                placeholder="パスワードを入力してください"
            >

            @foreach ($errors->userDeletion->get('password') as $message)
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
            @endforeach
        </div>

        <button type="submit" class="btn btn-danger">
            アカウントを削除する
        </button>
    </form>
</section>