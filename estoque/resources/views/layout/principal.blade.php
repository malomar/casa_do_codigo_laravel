<html>
    <head>
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <title>Controle de Estoque</title>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/produtos">Estoque Laravel</a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                    <!--
                        <li><a href="/produtos">Listagem</a></li>
                        <li><a href="/produtos/novo">Novo</a></li>
                    -->
                        <li><a href="{{action('ProdutoController@lista')}}">Listagem</a></li>
                        <li><a href="{{action('ProdutoController@novo')}}">Novo</a></li>

                        @if (Auth::guest())
                            <li><a href="login">Login</a></li>
                            <li><a href="register">Registrar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ Auth::logout() }}">Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            @yield('conteudo')

            <footer class="footer">
                <p>(c) Livro de Laravel da Casa do Código.</p>
            </footer>
        </div>
    </body>
</html>