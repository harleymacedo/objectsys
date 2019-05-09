@extends('layouts.app')
@extends('layouts.sidemenu')

@section('contentpage')
    
    @can('gerenciarUsuarios')
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <div class="container">
            <div class="row mt-4">
                <div class="col-sm-12">
                    <span class="titulo h1 mb-1 mt-1 float-left">Usuários</span>
                    @can('gerenciarSistema')
                    <a href="/cadastrar/adminsis" class="btn_color btn btn-outline-primary mb-1 mt-1 float-right">Novo Administrador do Sistema</a>
                    @endcan
                </div>
            </div>
            <div class="row justify-content-center mb-1 mt-1">
                <div class="col-sm-12">
                    <form action="burcar/usuario" method="POST">
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
                                    <option value="nomeUsuario">Nome</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-1">
                                <button class="btn btn-dark float-right" type="submit">Buscar</button>
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
                                <th scope="col">Papel</th>
                                <th scope="col">Mudar Permissões</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tbody>
                                <tr>
                                    <th scope="row">{{$user->nome}}</th>
                                    <td>{{$user->papel}}</td>
                                    <td>
                                        <a href="/update/user" class="btn btn-primary"><i class="fas fa-user-edit"></i></a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#m">
                                                <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div> 
        @else
        <script>window.location = "/home";</script>
    @endcan
@endsection