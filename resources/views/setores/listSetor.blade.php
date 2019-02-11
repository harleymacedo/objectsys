@extends('layouts.app')

@section('content')
@can('editar')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12">
            <span class="h1 mb-1 mt-1 float-left">Setores</span>
            <a href="/cadastrar/setor" class="btn btn-outline-secondary mb-1 mt-1 float-right">Cadastrar Setor</a>
        </div>
    </div>
    <div class="row justify-content-center mb-1 mt-1">
        <div class="col-sm-12">
            <form>
                <div class="form-row">
                    <div class="form-group col-sm-11">
                        <input class="form-control" type="search" placeholder="Buscar...">
                    </div>
                    <div class="form-group col-sm-1">
                        <button class="btn btn-dark float-right" type="submit">Buscar</>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row card">
        <div class="col-sm-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                @foreach ($setors as $setor)
                    <tbody>
                        <tr>
                            <th scope="row">{{$setor->nomeSetor}}</th>
                            <td>{{$setor->descricaoSetor}}</td>

                            <td>{{$setor->nome}}</td>

                            <td>
                                <a href="/update/setor/{{$setor->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#m{{$setor->id}}">
                                        <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
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
