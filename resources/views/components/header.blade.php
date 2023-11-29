<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route("index") }}">Absolventi info</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-nav"
                aria-controls="navbar-nav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-nav">
                <ul class="navbar-nav flex-grow-1 mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("announcements.index") }}">Anunturi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Activitati</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("login") }}">Login</a>
                        </li>
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link" href="{{ route("register") }}">Register</a>--}}
                        {{--                            </li>--}}
                    @endguest
                    @auth
                        @if (Request::user()->role === "admin")
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route("admin.announcements") }}">Panel</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("logout") }}">Logout</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>