<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Parser;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Register(Request $req){

        $validacion = Validator::make($req -> all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if($validacion -> fails())
            return $validacion -> errors();

        return $this -> createUser($req);
        
    }

    private function createUser($req){
        $user = new User();
        $user -> name     = $req -> post("name");
        $user -> email    = $req -> post("email");
        $user -> password = Hash::make($req -> post("password"));   
        $user -> save();
        return $user;
    }

    public function ValidarToken(Request $req){
        return auth('api') -> user();
    }

    public function EliminarToken(Request $req){
        $req -> user() -> token() -> revoke();
        return ['msg' => 'Token Revoked'];
    }
}