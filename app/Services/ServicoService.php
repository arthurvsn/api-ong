<?php

namespace App\Services;

use App\Models\Servico;
use Auth;

use App\Util\Util;

final class ServicoService {

    public static function cadastrarServico($dados) {

        return Servico::create([
            'nome' => $dados['nome'],
            'descricao' => $dados['descricao'],
            'id_usuario' => auth()->user()->id_usuario,
        ]);

    }

    public static function editarAgendamento($agendamento, $dados) {

        return $agendamento->update([
            'nome' => $dados['nome'],
            'descricao' => $dados['descricao'],
            'id_usuario' => auth()->user()->id_usuario,
        ]);
    }
}