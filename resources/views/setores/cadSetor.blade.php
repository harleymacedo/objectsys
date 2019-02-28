@extends('layouts.app')

@section('content')

@can('editar')

<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12">
        <span class="titulo h1 mb-1 mt-1 float-left">Cadastro setores</span>
        </div>
    </div>

    <div class="row justify-content-center mb-5 card py-5">
        <div class="col-sm-12">
            <form method="POST" action="/salvar/setor">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="nomeSetor" class="font-weight-bold">Nome</label>
                        <input name="nomeSetor" type="text" class="form-control" id="nomeSetor" placeholder="Nome do Setor" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="descricaoSetor" class="font-weight-bold">Descrição</label>
                        <textarea name="descricaoSetor" class="form-control" maxlength="500" id="descricaoSetor" placeholder="Descrição do Setor" required></textarea>
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
                        <button class="btn btn-success form-group" type="submit">Cadastrar</button>
                        <input class="btn btn-danger form-group" type="button" value="Cancelar" onclick="location.href='/setores'">
                    </div>
                </div>
            </form>
        </div>
    </div>

      </div>

@else

    <script>
        window.location = "/home";
    </script>
@endcan
@endsection
