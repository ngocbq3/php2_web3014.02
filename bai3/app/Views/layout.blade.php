<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

</head>

<body>
    <div class="container">
        <header>
            <h1>Header</h1>
        </header>

        @yield('content')

        <footer>
            <h1>Footer</h1>
        </footer>
    </div>
</body>

</html>
