<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FileShare - Compartilhamento Seguro de Arquivos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <header class="mb-8">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-blue-600">
                    <a href="{{ route('home') }}">FileShare</a>
                </h1>
                <p class="text-sm text-gray-600">Compartilhamento seguro de arquivos</p>
            </div>
        </header>

        <main class="max-w-3xl mx-auto">
            @yield('content')
        </main>

        <footer class="mt-12 text-center text-sm text-gray-500">
            <p>© {{ date('Y') }} FileShare. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>