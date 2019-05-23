@extends('layouts.app')
@extends('layouts.sidemenu')

@section('contentpage')

@can('fazerReserva')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div class="container">
    
    <div class="row mt-4">
        <div class="col-sm-12">
            <span class="titulo h1 mb-1 mt-1 float-left">Objetos</span>
            <a href="/objetos" class="btn_color btn btn-outline-primary mb-1 mt-1 float-right">Fazer Nova Reserva</a>
        </div>
    </div>
    <div class="row justify-content-center mb-1 mt-1">
        <div class="col-sm-12">
            <form action="/buscar/reserva" method="POST">
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

    {{-- Div para listagem das reservas  --}}
    <div class="card-columns">
        @foreach ($reservas as $reserva)
            <div class="card">
                <div class="card-header">{{$user}}</div>
                <div class="card-body">
                    <h5 class="card-title">Data da Reserva: {{$reserva->dataReserva}}</h5>
                    <p class="card-text">Horario: {{$reserva->inicioReserva}} - {{$reserva->fimReserva}}</p>
                </div>
                <div class="card-footer border-primary">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#u{{$reserva->id}}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#r{{$reserva->id}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Cancelamento de reservas --}}
    @foreach ($reservas as $reserva)
        <div class="modal fade" id="r{{$reserva->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja remover sua reserva do {{$reserva->obj_id}}?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Data da Reserva: {{$reserva->dataReserva}}</p>
                        <p>Horario: {{$reserva->inicioReserva}} - {{$reserva->fimReserva}}</p>
                        Após a confirmação sua reserva será cancelada.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <a href="/delete/reserva/{{$reserva->id}}" class="btn btn-danger">Confirmar</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Atualizar Reservas --}}
    @foreach ($reservas as $reserva)
        <div class="modal fade" id="u{{$reserva->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja atualizar a reservar feita para o(a) {{$reserva->obj_id}}?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row justify-content-center mb-1 mt-1">
                            <div class="col-sm-12">
                                <form action="/atualizar/reserva/{{$reserva->id}}" method="POST">
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
                                                <input class="form-control" type="text" name="nomeObj" id="nomeObj" readonly="true" disabled value="{{$reserva->obj_id}}">
                                            </div>
                                            <div class="input-group form-group col-sm-6">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="dataReserva"><i class="fas fa-calendar-alt"></i></label>
                                                    </div>
                                                <input class="form-control" type="date" name="dataReserva" id="dataReserva" required value="{{$reserva->dataReserva}}">
                                                </div>
                                            <div class="input-group form-group col-sm-6">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inicioReserva"><i class="far fa-clock"></i>Início</label> 
                                                </div>
                                            <input class="form-control" type="time" name="inicioReserva" id="inicioReserva" min="08:00" max="20:30" required value="{{$reserva->inicioReserva}}">
                                            </div>
                                            <div class="input-group form-group col-sm-6">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="fimReserva"><i class="far fa-clock"></i>Fim</label> 
                                                </div>
                                                <input class="form-control" type="time" name="fimReserva" id="fimReserva" min="08:30" max="22:00" value = "{{$reserva->fimReserva}}">
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