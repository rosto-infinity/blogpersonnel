<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Laravel 12 & Tailwind CSS</title>
    <!-- Inclure les styles Tailwind CSS (assurez-vous que c'est configuré via Vite) -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10">
        @yield('content')
    </div>
</body>
</html>
