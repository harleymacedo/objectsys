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
            'papel' => 'required|string',
        ]);

        if(Auth::user()->papel == 'admin'){

            $usuario = User::create([
                'nome' => $data['name'],
                'papel' => $data['papel'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
    
            $id = DB::table('users')->max('id');
    
            $teste = DB::table('role_user')->insert(
                ['user_id' => $id, 'role_id' => '2']
            );
            if ($usuario) {
                return redirect('/home');
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
}
