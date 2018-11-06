@extends('layouts.app')

@section('content')
@can('editar')
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12">
        <span class="h1 mb-1 mt-1 float-left">Cadastrar de setores</span>
        </div>
    </div>

    <div class="row justify-content-center mb-5 bg-light py-5">
        <div class="col-sm-12">
            <form method="POST" action="cadastrar">
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="nomeSetor" class="font-weight-bold">Nome</label>
                        <input type="text" class="form-control" id="nomeSetor" placeholder="Nome do Setor" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="descriçãoSetor" class="font-weight-bold">Descrição</label>
                        <textarea class="form-control" maxlength="500" id="descriçãoSetor" placeholder="Descrição do Setor" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="responsavelSetor" class="font-weight-bold">Responsável</label>
                        <select name="responsavelSetor" id="responsavelSetor" required>
                            <option value="valorTeste">Placeholder</option>
                            <option value="valorTeste2">Placeholder2</option>
                            <option value="valorTeste3">Placeholde3</option>
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
<h1>Voce nao tem premissao pra estar aqui...saia imediatamente (Temporário)</h1>
@endcan
@endsection


