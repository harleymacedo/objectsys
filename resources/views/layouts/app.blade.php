<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ObjectSys</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-app.css') }}" rel="stylesheet">
</head>
<body>
        <div id="app">
                <nav class="navbar navbar-expand-md navbar-light navbar-laravel color-navbar">
                    <div class="container">
                        <div class="row">
                            <div class="col justify-content-start">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    <img class="logo" src="{{ asset('images/logo_small.png') }}" alt="logo">
                                </a>

                            </div>
                            <div class="botão col d-flex justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                            </div>
                        </div>



                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                                    </li>
                                @else
                                @can('editar')


                                    <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <span class="caret">Setores</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('cadastrarsetor') }}">Cadastrar Setor</a>
                                                <a class="dropdown-item" href="{{ route('listarsetor') }}">Listar Setor</a>
                                            </div>

                                    </li>

                                @endcan
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->nome }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"

                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">

                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <main>
                @yield('content')
            </main>
               <!-- Footer -->
<footer class="foot page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

              <!-- Content -->
              <h5 class="text-uppercase" style="color: #e65437">Descrição:</h5>
              <p>Um sistema de reserva de materiais em conjunto com o rastreamento em tempo real dos objetos que podem ser deslocados, auxiliando os usuários (professores) na reserva e gerenciamento de recursos, evitando ainda a perda dos mesmos. </p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase" style="color: #e65437">Equipe</h5>

                <ul class="list-unstyled texto">
                  <li>
                    <p >Harley Macêdo</p>
                  </li>
                  <li>
                    <p >Igor William</p>
                  </li>
                  <li>
                    <p >João Batista</p>
                  </li>
                  <li>
                    <p >Lucas Eduardo</p>
                  </li>
                  <li>
                    <p >Victor Hugo</p>
                  </li>

                </ul>

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase" style="color: #e65437">Contatos</h5>

                <ul class="list-unstyled texto">
                  <li>
                    <p>Harley.ip@gmail.com</p>
                  </li>
                  <li>
                    <p>igorwm9@gmail.com</p>
                  </li>
                  <li>
                    <p>juniorbj1993@gmail.com</p>
                  </li>
                  <li>
                    <p>lucasseduhh@gmail.com</p>
                  </li>
                  <li>
                    <p>hugo.victor.n@gmail.com</p>
                  </li>

                </ul>

              </div>
              <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer_copyright footer-copyright text-center py-3">© 2018 Copyright:
          <a href="https://sites.google.com/site/laisifce/home">LaIS</a>
        </div>
        <!-- Copyright -->

      </footer>
      <!-- Footer -->
</body>
</html>
