<?php

namespace App\Http\Controllers;

use App\Model\Usuario;
use App\Model\Tarefa;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class UsuarioController extends Controller
{
    //Realiza o login
    public function login(Request $request) {
        //Busca usuário
  
        $usuario = Usuario::where('email', $request->input('email'))
                            ->where('senha', md5($request->input('senha')))
                            ->first();
        
        //Não foi possivel realizar o login
        if ($usuario == null) 
            return response()->json("Usuario ou senha incorreta", 401);
        

        //Gera o token JWT
        $token = JWT::encode([
            'iat'   => time(), //Hora que o token foi criado
            //'exp'   => (time()+(60*60)), //Exclui o token após 1h da sua criação 
            'data'  => ['id' => $usuario->id]], config('jwt.key'));

        return response()->json($token, 200);
    }
}
