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
    public function works() {
        return response("FUNCIONA!!!", 200);
    }

    public function Register(Request $req){

        $validacion = Validator::make($req -> all(),[
            "ci"        => "required|string|max:8",
            "nombre"    => "required|alpha|max:40",
            "nombre2"   => "nullable|alpha|max:40",
            "apellido"  => "required|alpha|max:40",
            "apellido2" => "required|alpha|max:40",
            "email"     => "required|email|unique:users",
            "password"  => "required|confirmed"
        ]);

        if($validacion -> fails())
            return response($validacion -> errors(), 400);

        return $this -> createUser($req);
    }

    private function createUser($req){
        $user = new User();
        $user -> ci        = $req -> input("ci");
        $user -> nombre    = $req -> input("nombre");
        $user -> nombre2   = $req -> input("nombre2");
        $user -> apellido  = $req -> input("apellido");
        $user -> apellido2 = $req -> input("apellido2");
        $user -> email     = $req -> input("email");
        $user -> password = Hash::make($req -> input("password"));   
        $user -> save();
        return $user;
    }

    public function ValidarToken(Request $req){
        return auth("api") -> user();
    }

    public function EliminarToken(Request $req){
        $req -> user() -> token() -> revoke();
        return response(["msg" => "Token Revoked"], 200);
    }
}