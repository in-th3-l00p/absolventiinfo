<!doctype html>
<html lang="en" class="w-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absolventi la info</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    @stack("styles")
</head>
<body
    class="min-vh-100 w-100 d-flex flex-column"
    style="background-color: #eaeaea"
>
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
                                <a class="nav-link" href="{{ route("logout") }}">Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield("content")

    @stack("scripts")
</body>
</html>
