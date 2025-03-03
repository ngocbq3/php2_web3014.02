<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            Menu
            @isset($_SESSION['user'])
                <strong>{{ $_SESSION['user']->username }}</strong>
                <a href="{{ APP_URL . 'logout' }}">Logout</a>
            @endisset
        </header>

        @yield('content')

        <footer>
            Footer
        </footer>
    </div>
</body>

</html>
