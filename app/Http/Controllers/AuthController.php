<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Iluminate\Support\Facades\Auth;
use App\Model\user;
use App\Model\unit;

class AuthController extends Controller
{
    public function unauthorized(){
        return response()->jason([
            'erro'=>'nao autorrizado'
        ], 401 );
    }

    public function register(Rquest $request){
        $arry = ['erro'=>''];

        $validador = valideter::make($_REQUEST->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'cpf' => 'required|digits:11|unique:users,cpf',
            'passord' => 'required',
            'password_confirm' => 'required|same:password'
        ]);
        if($validador->fails()){
            $name = $request->input('name');
            $email = $request->input('email');
            $cpf = $request->input('cpf');
            $password = $request->input('password');


            $has = password_hash($password, PASSWORD_DEFAULT);

            $newUser = new User();
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->cpf = $cpf;
            $newUser->password = $hash;
            $newUser->save();

            $token = auth()->attemp([
                'cpf' => $cpf,
                'password' => $password
            ]);
            if(!$token){
                $array['erro'] = 'ocorreu um erro de cadastro';
                return $array;
            }
            $array['token'] = $token;

            $user= auth()->user();
            $array['user'] = $user;

            $propriedade = Unit::select(['id','name'])->wehere('id_owner',$user['id'])->get();

            $array['user']['propriedades'] = $propriedade;


        }else{
            $array['erro'] = $validador->erros()->firts();
            return $array;
        }
        return $array;
    }
}
