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
    <div class="min-vh-100">
        <x-header />
        @yield("content")
    </div>

    <footer class="bg-dark text-white text-center">
        <div class="text-center p-3">
            © 2023 Copyright:
            <a class="text-white" href="https://www.intheloop.bio">Tisca Catalin</a>
        </div>
    </footer>

    @stack("scripts")
</body>
</html>
