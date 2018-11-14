@extends('layouts.app')

@section('content')

@can('editar')

<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12">
        <span class="h1 mb-1 mt-1 float-left">Atualizar setores</span>
        </div>
    </div>

    <div class="row justify-content-center mb-5 card py-5">
        <div class="col-sm-12">
            <form method="POST" action="/atualizar/setor">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="nomeSetor" class="font-weight-bold">Nome</label>
                    <input name="nomeSetor" type="text" class="form-control" id="nomeSetor" placeholder="Nome do Setor" value="{{$setor->nomeSetor}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" hidden >
                        <input name="idSetor" type="number" class="form-control" value="{{$setor->id}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="descricoSetor" class="font-weight-bold">Descrição</label>
                    <textarea name="descricoSetor" class="form-control" maxlength="500" id="descricoSetor" placeholder="Descrição do Setor" required>{{$setor->descricoSetor}}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group mb-3 col-sm-12">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="responsavelSetor">Responsável</label>
                        </div>
                        <select class="custom-select" id="responsavelSetor" name="responsavelSetor">
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                            <input class="btn btn-success form-group" type="submit" value="Atualizar">
                            <input class="btn btn-danger form-group" type="button" value="Cancelar" onclick="location.href='/setores'">
                    </div>
                </div>
            </form>
        </div>
    </div>

      </div>

@else
    <script>window.location = "/home";</script>
@endcan
@endsection


