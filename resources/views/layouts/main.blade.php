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

    @vite([ "resources/sass/app.scss" ])
    @stack("styles")
</head>
<body class="min-vh-100 w-100 d-flex flex-column bg-light">
    <div class="min-vh-100">
        <x-header />
        @yield("content")
    </div>

    <footer class="bg-dark text-white text-center p-4">
        <div class="grid">
            <div class="row">
                <div class="col d-flex flex-column text-end border-end">
                    <a href="{{ route("index") }}" class="text-decoration-none text-white">Acasă</a>
                    <a href="{{ route("announcements.index") }}" class="text-decoration-none text-white">Anunțuri</a>
                    <a href="{{ route("activities.index") }}" class="text-decoration-none text-white">Activități</a>
                    <a href="{{ route("contact") }}" class="text-decoration-none text-white">Contact</a>
                </div>
                <div class="col d-flex flex-column text-start">
                    <a href="{{ route("termsAndConditions") }}" class="text-decoration-none text-white">Termeni și condiții</a>
                    <a href="{{ route("cookies") }}" class="text-decoration-none text-white">Politică cookies</a>
                    <a href="{{ route("privacyPolicy") }}" class="text-decoration-none text-white">Politică de procesare a datelor</a>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            © 2023 Copyright: Tișcă Cătălin
        </div>
    </footer>

    @stack("scripts")
</body>
</html>
