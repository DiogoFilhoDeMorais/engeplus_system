<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.78.1">
    <title>Signin Template · Bootstrap</title>
    <link rel="canonical" href="http://localhost:8000">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/assets/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('css/assets/img/favicons/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('css/assets/img/favicons/favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('css/assets/img/favicons/favicon-16x16.png') }}" sizes="16x16" type="image/png">
    <link rel="manifest" href="{{ asset('css/assets/img/favicons/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('css/assets/img/favicons/safari-pinned-tab.svg') }}" color="#7952b3">
    <link rel="icon" href="{{ asset('css/assets/img/favicons/favicon.ico') }}">
    <meta name="theme-color" content="#7952b3">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sign-in/signin.css') }}" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin">
        <form action="{{ route('authenticate') }}" method="post">
            @csrf
            @method('POST')
            <img class="mb-4" src="{{ asset('img/logo-engeplus.png') }}" alt="" width="200" height="auto">
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <label for="inputEmail" class="visually-hidden">E-mail</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Digite o e-mail" required=""
                autofocus="">
            <label for="inputPassword" class="visually-hidden">Senha</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Digite a senha" required="">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Continuar conectado
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            <p class="mt-5 mb-3 text-muted">© 2020</p>
        </form>
    </main>
</body>

</html>