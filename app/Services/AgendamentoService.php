<?php

namespace App\Services;

use App\Models\Agendamento;

use App\Util\Util;

final class AgendamentoService {

    public static function cadastrarAgendamento($dados) {

        $usuario = auth()->user();

        return Agendamento::create([
            'data_agendamento' => $dados['data'] . ' ' . $dados['hora'],
            'id_servico' => $dados['servico'],
            'id_usuario' => $usuario->id_usuario,
        ]);

    }
}