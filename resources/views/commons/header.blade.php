<header class="mb-5">
    <nav class="navbar navbar-expand-sm navbar-dark bg-info">
        <a class="navbar-brand" href="/">Topic Posts</a>

        <button
            type="button"
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#nav-bar"
            aria-controls="nav-bar"
            aria-expanded="false"
            aria-label="ナビゲーションを切り替える"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>

            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <a href="{{ route('profile.edit') }}" class="nav-link text-light">
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                class="btn nav-link text-light"
                            >
                                ログアウト
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link text-light">
                            ログイン
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link text-light">
                            新規ユーザ登録
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>