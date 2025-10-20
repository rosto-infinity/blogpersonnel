<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title', 'Mon Blog Laravel')</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                max-height: 100vh;
            }
            header {
                background: #333;
                color: white;
                padding: 1rem;
            }
            nav a {
                color: white;
                text-decoration: none;
                margin: 0 1rem;
            }
            nav a:hover {
                text-decoration: underline;
            }
            main {
                max-width: 1200px;
                margin: 2rem auto;
            }
            footer {
                background: #f0f0f0;
                text-align: center;
                padding: 1rem;
                margin-top: 2rem;
            }
        </style>
        @yield('styles')
    </head>
    <body>
        <header>
            <nav>
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('about') }}">À propos</a>
                <a href="{{ route('contact') }}">Contact</a>
            </nav>
        </header>

        <main style="  min-height: 78vh;">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif @yield('content')
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} Mon Blog. Tous droits réservés.</p>
        </footer>

        @yield('scripts')
    </body>
</html>
