<header class="bg-gradient-primary mb-3">
    <nav class="navbar navbar-expand-md navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#options">
            <span class="navbar-toggler-icon"></span>
        </button>

        <span class="navbar-brand">
            <a href="{{ route('index') }}" class="h1">{{ trans('messages.header-brand') }}</a>
        </span>

        <div class="navbar-collapse collapse" id="options">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link">{{ trans('messages.header-home-link') }}</a>
                </li>

                @if (!auth()->check())
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">{{ trans('messages.header-register-link') }}</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">{{ trans('messages.header-login-link') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ trans('messages.header-logout-link') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>

            <form class="form-inline" action="{{ route('search') }}" method="GET">
                <input
                    class="form-control mr-sm-2"
                    name="title"
                    value="{{ isset($searchQuery) ? $searchQuery : '' }}"
                    type="search"
                    placeholder="{{ trans('messages.header-search-placeholder') }}"
                    required>

                <button class="btn btn-light my-2 my-sm-0" type="submit">{{ trans('messages.header-search-button') }}</button>
            </form>
        </div>
    </nav>
</header>
