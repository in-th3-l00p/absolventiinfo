<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invitatie</title>
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
        <h1>Ati fost invitat la {{ $activity->title }}</h1>
        <p>Dragi utilizatori ai platformei AbsolventInfo,</p>
    </header>
    <div>
        <p>{{ $text }}</p>
    </div>
</body>
</html>
