<header>
    <nav class="navbar navbar-expand-lg navbar-light py-4 px-5 bg-light">
        <a class="navbar-brand" href="{{ route("index") }}">
            Absolventi<span class="text-primary">Info</span>
        </a>
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
                    <a class="nav-link" href="{{ route("activities.index") }}">Activitati</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("login") }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("register") }}">Register</a>
                    </li>
                @endguest
                @auth
                    @if (Request::user()->role === "admin")
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("admin.announcements") }}">Panel</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <div class="dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                type="button"
                                id="profile-dropdown"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                {{ Request::user()->first_name . " " . Request::user()->last_name }}
                            </a>
                            <ul
                                class="dropdown-menu"
                                aria-labelledby="profile-dropdown"
                            >
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route("users.show", [ "user" => Request::user() ]) }}"
                                    >
                                        Profil
                                    </a>
                                </li>
                                @if (Request::user()->role === "user")
                                    <a
                                        class="dropdown-item"
                                        href="{{ route("users.activities") }}"
                                    >
                                        Activitatile tale
                                    </a>
                                @endif
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route("logout") }}"
                                    >
                                        Delogeaza-te
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
