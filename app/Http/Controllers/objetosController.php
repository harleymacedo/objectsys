<?php

namespace App\Http\Controllers;

use App\objeto;
use Illuminate\Http\Request;

class objetosController extends Controller
{
    private $objeto;
    public function __construct(objeto $objeto){

        $this->objeto = objeto;

    }

    /**
     * @param objeto $objeto
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listarObj (objeto $objeto)
    {
        $objetos = $objeto->all();

        return view('objetos', compact('objetos'));
    }

    public function novoObj(Request $request){

        $data_form = $request->only(['nomeObj','descricaoObj','situacaoObj','categoriaObj']);


        $insert = $this->objeto->insert($data_form);
        if ($insert) {
            return redirect('/home');
        }
        else {
            return redirect()->back();
        }
    }

    public function editarObj(Request $request){

        $data_form = $request->only(['nomeObj','descricaoObj','situacaoObj','categoriaObj']);

        $objeto = $this->objeto->find($data_form['objeto_id']);

        $update = $objeto->update([
            'nomeObj' => $data_form['nomeObj'],
            'descricaoObj' => $data_form['descricaoObj'],
            'situacaoObj' => $data_form['situacaoObj'],
            'categoriaObj' => $data_form['categoriaObj'],
        ]);
        if ($update) {
            return redirect('/home');
        }
        else {
            return redirect()->back();
        }
    }

    public function excluirObj(Request $request){

        $data_form = $request->only(['objeto_id']);

        $objeto = $this->objeto->find($data_form['objeto_id']);
        $delete = $objeto->delete();
        if ($delete) {
            return redirect('/home');
        }
        else {
            return redirect()->back();
        }
    }
}
