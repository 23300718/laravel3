<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex flex-col m-0">

    <header class="w-full shrink-0">
    </header>
    <main class="flex-1 w-full px-4 py-6" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
        <div style="min-width: 800px; width: 100%; white-space: nowrap;">
            {{ $slot }}
        </div>
    </main>

    <footer class="w-full shrink-0">
        подвал
    </footer>
    
</body>
</html>
