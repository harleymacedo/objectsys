<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setor;

class setorController extends Controller
{
    private $setor;

    public function __construct(setor $setor){

        $this->setor = $setor;

    }

    /**
     * @param setor $setor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function listarSetores (setor $setor)
    {
        $setores = $setor->all();

        return view('setores', compact('setores'));
    }

    public function novoSetor(Request $request){

        $data_form = $request->only(['nomeSetor','descricaoSetor','responsavelSetor']);


        $insert = $this->objeto->insert($data_form);
        if ($insert) {
            return redirect('/home');
        }
        else {
            return redirect()->back();
        }
    }

    public function editarSetor(Request $request){

        $data_form = $request->only(['nomeSetor','descricaoSetor','responsavelSetor']);

        $setor = $this->setor->find($data_form['setor_id']);

        $update = $setor->update([
            'nomeSetor' => $data_form['nomeSetor'],
            'descricaoSetor' => $data_form['descricaoSetor'],
            'responsavelSetor' => $data_form['responsavelSetor'],
        ]);
        if ($update) {
            return redirect('/home');
        }
        else {
            return redirect()->back();
        }
    }

    public function excluirSetor(Request $request){

        $data_form = $request->only(['setor_id']);

        $setor = $this->setor->find($data_form['setor_id']);
        $delete = $setor->delete();
        if ($delete) {
            return redirect('/home');
        }
        else {
            return redirect()->back();
        }
    }

    public function indexSetor(){
        return view('setores.cadSetor');
    }

}
