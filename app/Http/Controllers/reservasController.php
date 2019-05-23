<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
use App\reserva;
use DB;

class reservasController extends Controller
{
    // private $reserva;

    // public function __construct(reserva $reserva){

    //     $this->reserva = $reserva;

    // }

    public function indexReservas(){

        if(Auth::user()->papel == 'servidor'){
        $reservas = DB::table('reservas')->where( 'user_id','=',Auth::user()->id)->get();
        $user = Auth::user()->nome;
        return view('reservas', compact('reservas', 'user'));
        }else{
        return redirect('/home');
        }
    }

    public function novaReserva(Request $request, $id){ 

        $data_form = $request->only(['nomeUser','dataReserva','inicioReserva','fimReserva']);
        $data = date("Y-m-d");
        $user = Auth::user()->id;

        if(Auth::user()->papel == 'servidor'){
           $insert = DB::table('reservas')->insert(
                ['inicioReserva' => $data_form['inicioReserva'],
                 'fimReserva' => $data_form['fimReserva'],
                 'dataReserva' => $data_form['dataReserva'],
                 'obj_id' => $id,
                 'user_id' => $user]
            );
            if ($insert) {
                return redirect('/reservas');
            }
            else {
                return redirect()->back();
            }    
        }else{
            return redirect('/home');
        }

        return view('reserva');
    }

    public function deleteReservas($id){
        if(Auth::user()->papel == 'servidor'){
            $delete = DB::table('reservas')->where('id', '=', $id)->delete();

            if($delete){
                return redirect('/reservas');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('/home');
        }
    }

    public function atualizarReserva($id){

        $data_form = $request->only(['nomeUser','dataReserva','inicioReserva','fimReserva']);
        $user = Auth::user()->id;
        if(Auth::user()->papel == 'servidor'){
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


}
