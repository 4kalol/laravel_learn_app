<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header style="background-color: #2285d0; padding: 10px;">
        <h1>アプリ</h1>
    </header>
    <div class="content">
        @yield('content')
    </div>
    <footer class="bg-blue-500 p-4 text-white text-center">
        <p>© 2024 Instagram Clone</p>
    </footer>
</body>
</html>
