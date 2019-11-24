<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $primaryKey = 'id_usuario';

    protected $table = 'usuario';

    public $timestamps = false;

    protected $fillable = [
        'cpf',
        'nome',
        'tipo',
        'login',
        'senha',        
    ];

    protected $hidden = [
        'senha',
    ];

    public function getAuthPassword() {
        return $this->senha;
    }
}
