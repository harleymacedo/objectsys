@extends('layouts.app')

@section('content')

@can('editar')

<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12">
        <span class="titulo h1 mb-1 mt-1 float-left">Cadastro de Objetos</span>
        </div>
    </div>

    <div class="row justify-content-center mb-5 card py-5">
        <div class="col-sm-12">
            <form method="POST" action="/salvar/objeto">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="nomeObj" class="font-weight-bold">Nome</label>
                        <input name="nomeObj" type="text" class="form-control" id="nomeObj" placeholder="Nome do Objeto" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="descricaoObj" class="font-weight-bold">Descrição</label>
                        <textarea name="descricaoObj" class="form-control" maxlength="500" id="descricaoObj" placeholder="Descrição do Objeto" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group mb-3 col-sm-6">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="situacaoObj">Situacão do Objeto</label>
                        </div>
                        <select class="custom-select" id="situacaoObj" name="situacaoObj">
                                <option value="reservado">Reservado</option>
                                <option value="livre">Livre</option>
                                <option value="emUso">Em Uso</option>
                                <option value="defeituoso">Com defeito</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group mb-3 col-sm-6">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="categoriaObj">Categoria do Objeto</label>
                        </div>
                        <select class="custom-select" id="categoriaObj" name="categoriaObj">
                                <option value="chave">Chave</option>
                                <option value="lousaDigital">Lousa Digital</option>
                                <option value="materiaSport">Material Esportivo</option>
                                <option value="dataShow">Data Show</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group mb-3 col-sm-12">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="setorObj">Setor</label>
                        </div>
                        <select class="custom-select" id="setorObj" name="setorObj">
                            @foreach ($setors as $setor)
                                <option value="{{$setor->id}}">{{$setor->nomeSetor}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <button class="btn btn-success form-group" type="submit">Cadastrar</button>
                        <input class="btn btn-danger form-group" type="button" value="Cancelar" onclick="location.href='/objetos'">
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
