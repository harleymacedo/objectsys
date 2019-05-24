<?php

namespace App\Http\Controllers;

use App\objeto;
use Illuminate\Http\Request;
Use DB;
Use Auth;
use App\setor;

class objetosController extends Controller
{
    private $objeto;

    public function __construct(objeto $objeto){

        $this->objeto = $objeto;

    }

    /**
     * @param objeto $objeto
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexObj (objeto $objeto)
    {
            $objetos = DB::table('setors')
            ->join('objetos', 'setors.id', '=', 'objetos.setorObj')
            ->select('setors.nomeSetor', 'objetos.nomeObj','objetos.descricaoObj','objetos.id','objetos.situacaoObj','objetos.categoriaObj')->orderBy('nomeObj')
            ->get();
            $user = Auth::user()->nome;

            return view('objetos.listObj', compact('objetos','user'));
        
    }

    public function novoObj(Request $request){

        $data_form = $request->only(['nomeObj','descricaoObj','situacaoObj','categoriaObj','setorObj']);

        if(Auth::user()->papel == 'adminObjeto' or Auth::user()->papel == 'adminSistema' ){
            $insert = DB::table('objetos')->insert(
                ['nomeObj' => $data_form['nomeObj'],
                 'descricaoObj' => $data_form['descricaoObj'],
                 'situacaoObj' => $data_form['situacaoObj'],
                 'categoriaObj' => $data_form['categoriaObj'],
                 'setorObj' => $data_form['setorObj']]
            );
            if ($insert) {
                return redirect('/objetos');
            }
            else {
                return redirect()->back();
            }    
        }else{
            return redirect('/home');
        }
        
    }

    public function editarObj(Request $request){

        $data_form = $request->only(['idObj','nomeObj','descricaoObj','situacaoObj','categoriaObj','setorObj']);
        if(Auth::user()->papel == 'adminObjeto' or Auth::user()->papel == 'adminSistema' ){
            $objeto = $this->objeto->find($data_form['idObj']);

            $update = $objeto->update([
                'nomeObj' => $data_form['nomeObj'],
                'descricaoObj' => $data_form['descricaoObj'],
                'situacaoObj' => $data_form['situacaoObj'],
                'categoriaObj' => $data_form['categoriaObj'],
                'setorObj' => $data_form['setorObj']
            ]);
            if ($update) {
                return redirect('/objetos');
            }
            else {
                return redirect()->back();
            }    
        }
        else{
            return redirect('/home');
        }
        
    }

    public function excluirObj($id){
        if(Auth::user()->papel == 'adminObjeto' or Auth::user()->papel == 'adminSistema' ){
            $delete = DB::table('objetos')->where('id', '=', $id)->delete();

            if($delete){
                return redirect('/objetos');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('/home');
        }
    }

    public function cadObj(){
        
        $setors = DB::table('setors')->get();

        return view('objetos.cadObj', compact('setors'));
    }

    public function updateObj($id){
        $objeto = $this->objeto->find($id);

        $setors = DB::table('setors')->get();

        return view('objetos.updateObj', compact('objeto','setors'));
    }

    public function buscarObj(Request $request){  //add $ordem para ordenar de acordo com escolha do usuário???

        $busca = $request->only(['busca','filtro']);
        $query = '%' . $busca['busca'] . '%';

        $objetos = DB::table('setors')
            ->join('objetos', 'setors.id', '=', 'objetos.setorObj')
            ->select('setors.nomeSetor', 'objetos.nomeObj','objetos.descricaoObj','objetos.id','objetos.situacaoObj','objetos.categoriaObj')->where('nomeObj', 'like', $query)->orWhere('situacaoObj', 'like', $query)
        ->orWhere('categoriaObj', 'like', $query)->orderBy($busca['filtro'])
        ->get();
    
        return view('objetos.listObj', compact('objetos'));
        
    }

}
