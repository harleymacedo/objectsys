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
        $setors = DB::table('users')
            ->join('setors', 'users.id', '=', 'setors.responsavelSetor')
            ->select('users.nome', 'setors.nomeSetor','setors.descricoSetor','setors.id')->orderBy('nomeSetor')
            ->get();

        return view('setores.listSetor', compact('setors'));
    }

    public function novoSetor(Request $request){

        $data_form = $request->only(['nomeSetor','descricoSetor','responsavelSetor']);

        $insert = $this->setor->insert($data_form);
        if ($insert) {
            return redirect('/setores');
        }
        else {
            return redirect()->back();
        }
    }

    public function editar(Request $request){

        $data_form = $request->only(['idSetor','nomeSetor','descricoSetor','responsavelSetor']);

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

    public function excluirSetor($id){

        $delete = DB::table('setors')->where('id', '=', $id)->delete();

        if ($delete) {
            return redirect('/setores');
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
