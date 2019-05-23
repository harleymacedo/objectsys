@extends('layouts.app')
@extends('layouts.sidemenu')

@section('contentpage')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div class="container">
    @can('gerenciarObjetos')
    <div class="row mt-4">
        <div class="col-sm-12">
            <span class="titulo h1 mb-1 mt-1 float-left">Objetos</span>
            <a href="{{route('cadastrarObjetos')}}" class="btn_color btn btn-outline-primary mb-1 mt-1 float-right">Cadastrar Objeto</a>
        </div>
    </div>
    @endcan
    <div class="row justify-content-center mb-1 mt-1">
        <div class="col-sm-12">
            <form action="{{route('buscarObjetos')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-row">
                    <div class="input-group form-group col-sm-8">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="busca"><i class="fas fa-search-location"></i></label>
                        </div>
                        <input class="form-control" type="text" name="busca" id="busca" placeholder="Buscar..." required>
                    </div>
                    <div class="input-group form-group col-sm-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="filtro"><i class="fas fa-sort"></i></label>
                        </div>
                        <select class="custom-select" id="filtro" name="filtro">
                            <option value="nomeObj">Nome</option>
                            <option value="situacaoObj">Situação</option>
                            <option value="categoriaObj">Categoria</option>
                            <option value="nomeSetor">Setor</option>
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
        @foreach ($objetos as $objeto)
            <div class="card">
                <div class="card-header">{{$objeto->nomeSetor}}</div>
                <div class="card-body">
                    <h5 class="card-title">{{$objeto->nomeObj}}</h5>
                    <p class="card-text">{{$objeto->descricaoObj}}</p>
                    <p class="card-text">{{$objeto->categoriaObj}}</p>
                </div>
                <div class="card-footer border-primary">
                    @can('fazerReserva')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#r{{$objeto->id}}" title='Clique para fazer sua reserva'>
                        <i class="fas fa-calendar-plus"></i>
                        </button>
                        @endcan
                        @can('gerenciarObjetos')
                        <a href="/update/objeto/{{$objeto->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#m{{$objeto->id}}">
                                <i class="fas fa-trash-alt"></i>
                        </button>
                        @endcan
                </div>
            </div>
        @endforeach
    </div>

    @can('gerenciarObjetos')
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
    @endcan

    @can('fazerReserva')
        @foreach ($objetos as $objeto)
            <div class="modal fade" id="r{{$objeto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deseja reservar o(a) {{$objeto->nomeObj}}?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row justify-content-center mb-1 mt-1">
                                <div class="col-sm-12">
                                    <form action="/reservar/objeto/{{$objeto->id}}" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="form-row"> 
                                                
                                                <div class="input-group form-group col-sm-12">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="nomeUser"><i class="far fa-user"></i></label>
                                                    </div>
                                                    <input class="form-control" type="text" name="nomeUser" id="nomeUser" readonly="true" disabled value="{{$user}}">
                                                </div>

                                                <div class="input-group form-group col-sm-6">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="idObj"><i class="fas fa-circle-notch"></i></label>
                                                    </div>
                                                    <input class="form-control" type="text" name="nomeObj" id="nomeObj" readonly="true" disabled value="{{$objeto->nomeObj}}">
                                                </div>
                                                <div class="input-group form-group col-sm-6">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="dataReserva"><i class="fas fa-calendar-alt"></i></label>
                                                        </div>
                                                    <input class="form-control" type="date" name="dataReserva" id="dataReserva" required>
                                                    </div>
                                                <div class="input-group form-group col-sm-6">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inicioReserva"><i class="far fa-clock"></i>Início</label> 
                                                    </div>
                                                    <input class="form-control" type="time" name="inicioReserva" id="inicioReserva" min="08:00" max="20:30" required>
                                                </div>
                                                <div class="input-group form-group col-sm-6">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="fimReserva"><i class="far fa-clock"></i>Fim</label> 
                                                    </div>
                                                    <input class="form-control" type="time" name="fimReserva" id="fimReserva" min="08:30" max="22:00">
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" data-dismiss="modal" center>Cancelar</button>
                                            <button class="btn btn-success" type="submit">Confirmar</button>
                                        </div>
                                    </form>
                                   
                    </div>
                </div>
            </div>
        @endforeach   
    @endcan
</div>
@endsection
