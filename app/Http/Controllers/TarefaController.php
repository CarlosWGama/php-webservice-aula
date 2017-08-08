<?php

namespace App\Http\Controllers;

use App\Model\Usuario;
use App\Model\Tarefa;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;;

class TarefaController extends Controller {
    
    /** Retorna todas as tarefas de um usuário
    * @param $request Request
    * @return response (json)
    */
    public function todas(Request $request) {
        $usuarioID = $this->getID($request);
        
        $return['tarefas'] = Tarefa::where('usuario_id', $usuarioID)->get();
        
        return response()->json($return, 200);
    }

    /** Cadastra uma tarefa
    * @param $request Request
    * @return response (json)
    */
    public function cadastrar(Request $request) {
        $usuarioID = $this->getID($request);

        $tarefa = Tarefa::create([
            'titulo'        => $request->input('titulo'),
            'usuario_id'    => $usuarioID
        ]);

        
        return response()->json($tarefa, 200);
        
    }

    /** Deletar uma tarefa
    * @param $request Request
    * @param $id integer
    * @return response (json)
    */
    public function excluir(Request $request, $id) {
        $usuarioID = $this->getID($request);

        Tarefa::where('id', $id)->where('usuario_id', $usuarioID)->delete();
        return response()->json(['sucesso'=> true], 200);
        
    }

    /**
    * Retorna o ID do usuário recuperado no token
    * @param $request Request
    * @return integer
    */
    private function getID($request) {
        $jwt = $request->header('Authorization');
        try {
            $decoded = JWT::decode($jwt, config('jwt.key'), array('HS256'));
            return $decoded->data->id;
        } catch (\Exception $e) {
            return 0; 
        }
    }
}
