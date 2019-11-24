<?php

namespace App\Services;

use App\Models\Servico;
use Auth;

use App\Util\Util;

final class ServicoService {

    public static function cadastrarServico($dados) {

        return Servico::create($dados);

    }
}