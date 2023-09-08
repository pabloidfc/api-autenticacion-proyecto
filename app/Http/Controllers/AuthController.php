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
    public function ValidarToken(Request $req){
        return auth('api') -> user();
    }

    public function EliminarToken(Request $req){
        $req -> user() -> token() -> revoke();
        return ['msg' => 'Token Revoked'];
    }


}