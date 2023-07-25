<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function CrearToken(Request $req) {
        $validation = Validator::make($req -> all(),[
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if($validation -> fails())
            return $validation ->  errors();

        return $this -> createUser($req);
    }

    public function ValidarToken(Request $req){
        return auth('api') -> user();
    }

    public function EliminarToken(Request $req){
        $req -> user() -> token() -> revoke();
        return ['msg' => 'Token Revoked'];
    }


}
