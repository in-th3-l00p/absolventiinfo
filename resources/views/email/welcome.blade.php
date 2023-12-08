<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bine ați venit pe AbsolventInfo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: black !important;
            margin: 20px;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #007BFF;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        ol {
            list-style-type: decimal;
            margin-left: 20px;
        }

        div, header {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bine ați venit pe AbsolventInfo</h1>
        <p>Dragi utilizatori ai platformei AbsolventInfo,</p>
        <p>Bine ați venit în comunitatea noastră dedicată absolvenților și profesioniștilor din diverse domenii! Suntem încântați să vă avem alături pe platforma noastră, unde veți găsi o varietate de resurse, anunțuri și activități menite să vă ajute în evoluția profesională și să vă conecteze cu o rețea valoroasă de oameni de afaceri și specialiști.</p>
    </header>

    <div>
        <p>Datele de conecatre al contului dumneavoastra sunt:</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Parola:</strong> {{ $password }}</p>
    </div>

    <div>
        <p>Pentru a vă conecta la platformă, accesați link-ul de mai jos:</p>
        <p><a href="{{ $url }}">{{ $url }}</a></p>
    </div>

    <footer>
        <p>Vă mulțumim că v-ați alăturat comunității AbsolventInfo și suntem nerăbdători să colaborăm cu voi în viitor.</p>
        <p>Cu cele mai bune urări,<br>Echipa AbsolventInfo</p>
    </footer>
</body>
</html>
