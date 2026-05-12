<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empherator - The New Era</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white"> @include('partials.navbar') 
    <main>
        @yield('content') 
    </main>
    @include('partials.footer') </body>
</html>