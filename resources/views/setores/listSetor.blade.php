@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12">
            <span class="h1 mb-1 mt-1 float-left">Setores</span>
            <a href="/cadastrarsetor" class="btn btn-outline-secondary mb-1 mt-1 float-right">Cadastrar Setor</a>
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
                            <td>{{$setor->descricoSetor}}</td>

                            <td>{{$setor->nome}}</td>

                            <td>
                                <a href="/update/{{$setor->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="/delete/{{$setor->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
