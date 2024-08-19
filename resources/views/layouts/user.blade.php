<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('FeelDance', 'User Page')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('includes.header')  <!-- Assuming you have a header file -->
    <main class="container mt-4">
        @yield('content')
    </main>
    @include('includes.footer')  <!-- Assuming you have a footer file -->
</body>
</html>
