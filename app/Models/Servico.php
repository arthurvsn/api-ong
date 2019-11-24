<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $primaryKey = 'id_servico';

    protected $table = 'servico';

    const CREATED_AT = 'data_cadastro';

    const UPDATED_AT = 'data_alteracao';

    protected $fillable = [
        'nome',
        'descricao',       
    ];
}
