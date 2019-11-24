<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

use App\Response\Response;

use App\Services\UsuarioServico;

class UsuarioController extends Controller
{
    public function loginUsuario() {

        try {

            $dados = request()->post();

            $authUsuario = UsuarioServico::loginUsuario($dados);

            return response()->json(Response::responseApi($authUsuario['sucesso'], $authUsuario['mensagem'], $authUsuario['dados']));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }

    public function index() {

        try {

            return response()->json(Response::responseApi(true, 'Usuario(s) obtidos', ['usuarios' => Usuario::get()]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }

    public function cadastrar() {
        
        try {

            $usuario = UsuarioServico::cadastrarUsuario(request()->post());

            return response()->json(Response::responseApi(true, 'Usuário cadastrado!', ['usuario' => $usuario]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }
}
