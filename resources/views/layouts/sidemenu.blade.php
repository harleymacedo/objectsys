@section('imports')

<link href="{{ asset('css/sidemenu.css') }}" rel="stylesheet">

@endsection


@section('sidemenu')

@if(Auth::check())
<!-- Sidebar  -->
<nav id="sidebar">
            <div class="sidebar-header">
                <h3>ObjectSys</h3>
                <strong>OS</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#objSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-boxes"></i>
                        Objetos
                    </a>
                    <ul class="collapse list-unstyled" id="objSubmenu">
                        <li>
                            <a class="submenu" href="{{ route('cadastrarObjetos') }}"><i class="fas fa-plus-square"></i>Cadastrar Objetos</a>
                        </li>
                        <li>
                            <a class="submenu" href="{{ route('listarObjetos') }}"><i class="fas fa-list-ul"></i>Listar Objetos</a>
                        </li>
                    </ul>
                </li>
                @can('gerenciarUsuarios')
                <li class="active">
                    <a href="#usuariosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user"></i>
                        Usuários
                    </a>
                    <ul class="collapse list-unstyled" id="usuariosSubmenu">
                        <li>
                            <a class="submenu" href="{{ route('cadastrarUser') }}"><i class="fas fa-user-plus"></i>Cadastrar Usuários</a>
                        </li>
                        <li>
                            <a class="submenu" href="{{ route('listarUser') }}"><i class="fas fa-list-ul"></i>Listar Usuários</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('fazerReserva')
                <li>
                    <a href="{{ route( 'listarReservas')}}">
                        <i class="fas fa-calendar"></i>
                        Minhas Reservas
                    </a>
                </li>
                @endcan
                @can('gerenciarSistema')
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-store-alt"></i>
                        Setores
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a class="submenu" href="{{ route('cadastrarSetor') }}">Cadastrar Setor</a>
                        </li>
                        <li>
                            <a class="submenu" href="{{ route('listarSetor') }}">Listar Setores</a>
                        </li>
                    </ul>
                </li>
                @endcan
                <!-- <li>
                    <a href="#">
                        <i class="fas fa-image"></i>
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-question"></i>
                        FAQ
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        Contact
                    </a>
                </li> -->
            </ul>

            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                    </a>
                </li>
                <!-- <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li> -->
            </ul>
        </nav>
@endif


        <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            @if(Auth::check())
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-justify"></i>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            @endif
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                    </li>
                @else
                @can('gerenciarUsuarios')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cadastrarUser') }}">Registrar</a>
                    </li>
                @endcan
                @can('gerenciarSistema')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="caret">Setores</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('cadastrarSetor') }}">Cadastrar Setor</a>
                            <a class="dropdown-item" href="{{ route('listarSetor') }}">Listar Setores</a>
                        </div>
                    </li>
                @endcan
                @can('fazerReserva')
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="{{ route('listarReservas') }}">Minhas Reservas</a>
                    </li> 
                @endcan
                <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="caret">Objetos</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('gerenciarObjetos')
                                <a class="dropdown-item" href="{{ route('cadastrarObjetos') }}">Cadastrar Objeto</a>
                            @endcan
                            <a class="dropdown-item" href="{{ route('listarObjetos') }}">Listar Objetos</a>
                        </div>
                    </li>
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
        
        @yield('contentpage')

@endsection