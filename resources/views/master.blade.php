<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <title>@yield('title')</title>
</head>
<body>
<div class="container">
    @section('header')
        <header class="main-header">
            <h1>Mon Application</h1>
            <nav>
                <a href="#">A Propos</a>
                <a href="{{ route('oeuvre.index') }}">Les oeuvre</a>
                <a href="{{ route('visiteur.info') }}">Infos visiteur</a>
            </nav>
        </header>'
    @show

    <main role="main" class="main-container">
        @yield('main')
    </main>
    @section('footer')
        <footer class="main-footer">
            Copyright &copy; {{ date('Y')}}
            <a href="http://www.iut-lens.univ-artois.fr/" target="_blank">
                <strong>IUT Lens - département Info.</strong>
            </a>
        </footer>
    @show

</div>
@yield('scripts')
</body>
</html>
