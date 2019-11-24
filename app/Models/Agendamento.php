<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $primaryKey = 'id_agendamento';

    protected $table = 'agendamento';

    public $timestamps = false;

    protected $fillable = [
        'id_servico',
        'id_usuario',
        'data_agendamento',       
    ];
}
