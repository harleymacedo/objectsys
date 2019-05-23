@extends('layouts.app')
@extends('layouts.sidemenu')
@section('contentpage')

@can('gerenciarSistema')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12">
            <span class="titulo h1 mb-1 mt-1 float-left">Setores</span>
            <a href="{{route('cadastrarSetor')}}" class="btn_color btn btn-outline-primary mb-1 mt-1 float-right">Cadastrar Setor</a>
        </div>
    </div>
    <div class="row justify-content-center mb-1 mt-1">
        <div class="col-sm-12">
            <form action="/buscar/setor" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-row">
                    <div class="input-group form-group col-sm-8">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="busca"><i class="fas fa-search"></i></label>
                        </div>
                        <input class="form-control" type="text" name="busca" id="busca" placeholder="Buscar..." required>
                    </div>
                    <div class="input-group form-group col-sm-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="filtro"><i class="fas fa-sort"></i></label>
                        </div>
                        <select class="custom-select" id="filtro" name="filtro">
                            <option value="nomeSetor">Nome</option>
                            <option value="responsavelSetor">Responsável</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-1">
                        <button class="btn btn-dark float-right" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card-columns">
        @foreach ($setors as $setor)
            <div class="card">
                <div class="card-header">{{$setor->nomeSetor}}</div>
                <div class="card-body">
                    <h5 class="card-title">{{$setor->nome}}</h5>
                    <p class="card-text">{{$setor->descricaoSetor}}</p>
                </div>
                <div class="card-footer border-primary">
                    <a href="/update/setor/{{$setor->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#m{{$setor->id}}">
                            <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    @foreach ($setors as $setor)
        <div class="modal fade" id="m{{$setor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja deletar o setor {{$setor->nomeSetor}}?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Após confirmação todos os dados do setor serão excluídos.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <a href="/delete/setor/{{$setor->id}}" class="btn btn-danger">Confirmar</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@else
<script>window.location = "/home";</script>
@endcan

@endsection
