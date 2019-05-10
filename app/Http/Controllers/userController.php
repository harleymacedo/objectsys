<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use APP\role_user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function novoUser(Request $request){

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if(Auth::user()->papel == 'adminSistema' or 'adminObjeto'){
            $usuario = User::create([
                'nome' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $id = DB::table('users')->max('id');
    
            $teste = DB::table('role_user')->insert(
                ['user_id' => $id, 'role_id' => '3']
            );
            if ($usuario) {
                return redirect('/cadastrar/user');
            }
            else {
                return redirect()->back();
            }    
        }else{
            return redirect('/objetos');
        }

    }

    public function cadUser(){

        return view('auth.register');
    }

    public function listUser(){

        $users = DB::table('users')->where('papel','!=', 'adminSistema')->select('nome','id','papel')->get();

        return view('auth.users', compact('users'));
    }

    public function alterarPermissao($id, Request $request){

        $papel = $request->only(['papelUser']);
        $papel2 = $papel['papelUser'];
        if (Auth::user()->papel == 'adminSistema') {
            DB::table('users')
                    ->where('id' , $id)
                    ->update(['papel' => $papel2]);
            
            if($papel2 == 'adminObjeto'){
                DB::table('role_user')
                    ->where('user_id', $id)
                    ->update(['role_id' =>'2']);
            }elseif($papel2 == 'servidor'){
                DB::table('role_user')
                    ->where('user_id', $id)
                    ->update(['role_id' =>'3']);
            }else{
                return view('home');
            }

            return $this->listUser();
        }
    }
}
