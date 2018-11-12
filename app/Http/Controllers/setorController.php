<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setor;
use App\User;
use App\user_setor;
use DB;

class setorController extends Controller
{
    private $setor;
    private $user;
    private $user_setor;

    public function __construct(setor $setor, User $user, user_setor $user_setor){

        $this->middleware('auth');
        $this->setor = $setor;
        $this->user = $user;

    }

    /**
     * @param setor $setor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function indexSetor (setor $setor)
    {
        $users = DB::table('users')
            ->join('setors', 'users.id', '=', 'setors.responsavelSetor')
            ->select('users.nome', 'setors.nomeSetor','setors.descricoSetor','setors.id')
            ->get();

        return view('setores.listSetor', compact('users'));
    }

    public function novoSetor(Request $request){

        $data_form = $request->only(['nomeSetor','descricoSetor','responsavelSetor']);

        $insert = $this->setor->insert($data_form);
        if ($insert) {
            return redirect('/home');
        }
        else {
            return redirect()->back();
        }
    }

    public function editar(Request $request){

        $data_form = $request->only(['idSetor','nomeSetor','descricoSetor','responsavelSetor']);

        // $id_number = $data_form["idSetor"];

        // $setor = $this->setor->find('$id_number');

       $update = DB::table('setors')
            ->where('id', $data_form['idSetor'])
            ->update(['nomeSetor' => $data_form['nomeSetor'],'descricoSetor' => $data_form['descricoSetor'],'responsavelSetor' => $data_form['responsavelSetor']]);

        if ($update) {
            return redirect('/setores');
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

    public function cadSetor(){

        $users = DB::table('users')->where('papel', '=', 'admin')->get();

        return view('setores.cadSetor', compact('users'));
    }

    public function updateSetor($id){

        $setor = $this->setor->find($id);

        $users = DB::table('users')->where('papel', '=', 'admin')->get();

        return view('setores.updateSetor', compact('users','setor'));

    }
}
