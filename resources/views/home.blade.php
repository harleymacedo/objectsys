@extends('layouts.app')

@extends('layouts.sidemenu')

@section('contentpage')
<div class="body_space container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">Dashboard</div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{Auth::user()->nome}} , você está logado com as seguintes permissões:
                    <br>
                    @can("gerenciarSistema")
                        gerenciarSistema
                    @endcan
                    
                    @can("gerenciarObjetos")
                        , gerenciarObjetos
                    @endcan
                    
                    @can("fazerReserva")
                        
                        , fazerReservas
                    @endcan
                    
                    @can('gerenciarUsuarios')
                        , gerenciarUsuarios
                    @endcan
                    
                    @can('fazerReservaOutro')
                    , fazerReservaOutro
                    @endcan


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
