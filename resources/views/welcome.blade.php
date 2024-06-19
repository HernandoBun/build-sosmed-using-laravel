<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome Page</title>

    <!-- Fonts -->

    <!-- Styles -->
    <style>
        body {
            background-color: black;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .title {
            font-size: 2em;
            margin-bottom: 20px; /* Spasi antara judul dan tombol */
        }
        .links {
            display: flex;
            gap: 20px; /* Menambah spasi antara tombol */
        }
        .links > a {
            font-size: 2.5em; 
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="title">Web Kloning Twitter</div>

    <div class="links">
        @if (Route::has('login'))
            @guest
                <a href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endguest
        @endif
    </div>
</body>
</html>
