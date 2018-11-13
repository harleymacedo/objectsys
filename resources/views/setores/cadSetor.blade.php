@extends('layouts.app')

@section('content')

@can('editar')

<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12">
        <span class="h1 mb-1 mt-1 float-left">Cadastrar de setores</span>
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
                        <label for="descricoSetor" class="font-weight-bold">Descrição</label>
                        <textarea name="descricoSetor" class="form-control" maxlength="500" id="descricoSetor" placeholder="Descrição do Setor" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-">
                        <label for="responsavelSetor" class="font-weight-bold">Responsável</label>
                        <select class="form-control" name="responsavelSetor" id="responsavelSetor" required>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <button class="btn btn-success" type="submit">Cadastrar</button>
                        <button class="btn btn-danger" type="button">Cancelar</button>
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


