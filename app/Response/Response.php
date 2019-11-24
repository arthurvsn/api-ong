<?php

namespace App\Response;

final class Response {

    public static function responseApi($tipo, $mensagem = "", $dados = []) {

        $data = [];

        if ($mensagem == "") {

            $mensagem = $tipo ? "Requisição realizada com sucesso" : "Erro ao realizar a requisição";            

        }

        $data['tipo'] = $tipo;
        $data['mensagem'] = $mensagem;

        if(isset($dados) && count($dados) > 0) {

            foreach ($dados as $key => $value) {
                $data['dados'][$key] = $value;
            }
        }

        return $data;

    }
}