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


                    @can("reservar")
                            Você está logado como Usuário do sistema!
                    @endcan
                    @can("editar")
                            Você está logado como Admin do sistema!
                            <a href="/cadastrarsetor">Aqui</a>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
