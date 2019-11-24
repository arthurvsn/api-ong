<?php

namespace App\Services;

use App\Models\Usuario;

use App\Util\Util;

final class UsuarioServico {

    public static function loginUsuario($dados) {

        $credenciais = [
            "cpf" => Util::retirarCaracteresEspeciais($dados['cpf']),
            "password" => $dados['senha'],
        ];

        if (auth()->attempt($credenciais)) {

            $token = auth()->user()->createToken("ong")->accessToken;

            $usuario = auth()->user();

            $arrayRertorno = [
                "token" => $token,
                'usuario' => $usuario,
            ];

            return ["sucesso" => true, "mensagem" => "Usuario autorizado", "dados" => $arrayRertorno];
        }

        return ["sucesso" => false, "mensagem" => "Dados incorretos!", "dados" => []];
    }

    public static function cadastrarUsuario($dados) {

        return Usuario::create([
            'cpf' => Util::retirarCaracteresEspeciais($dados['cpf']),
            'nome' => $dados['nome'],
            'login' => $dados['login'],
            'senha' => bcrypt($dados['senha']),
        ]);
    }
}