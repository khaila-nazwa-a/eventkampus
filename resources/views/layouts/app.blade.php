<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Event Kampus</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        @auth
            @include('layouts.sidebar')
        @endauth
        <main class="@auth col-md-10 @else col-md-12 @endauth p-4">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>