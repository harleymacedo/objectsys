@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12">
            <span class="h1 mb-1 mt-1 float-left">Objetos</span>
            <a href="/cadastrar/objeto" class="btn btn-outline-secondary mb-1 mt-1 float-right">Cadastrar Objeto</a>
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
                        <th scope="col">Situação</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Setor Responsável</th>
                        @can('editar')
                        <th scope="col">Ações</th>
                        @endcan
                        @can('reservar')
                        <th scope="col">Reservar</th>
                        @endcan
                    </tr>
                </thead>
                @foreach ($objetos as $objeto)
                    <tbody>
                        <tr>
                            <th scope="row">{{$objeto->nomeObj}}</th>
                            <td>{{$objeto->descricaoObj}}</td>
                            <td>{{$objeto->situacaoObj}}</td>
                            <td>{{$objeto->categoriaObj}}</td>
                            <td>{{$objeto->nomeSetor}}</td>
                            @can('editar')
                            <td>
                                <a href="/update/objeto/{{$objeto->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#m{{$objeto->id}}">
                                        <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                            @endcan
                            @can('reservar')
                            <td>
                                <button type="button" class="btn btn-primary" title='Clique para fazer sua reserva'>
                                    <i class="fas fa-calendar-plus"></i>
                                </button>
                            </td>
                            @endcan
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    @foreach ($objetos as $objeto)
        <div class="modal fade" id="m{{$objeto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja deletar o(a) {{$objeto->categoriaObj}} {{$objeto->nomeObj}}?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Após confirmação todos os dados do(a) {{$objeto->nomeObj}} serão excluídos.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <a href="/delete/objeto/{{$objeto->id}}" class="btn btn-danger">Confirmar</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
