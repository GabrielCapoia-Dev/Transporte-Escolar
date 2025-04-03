<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;  // Alteração crucial
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'usuario',
        'senha',
        'status',
        'tipo',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = bcrypt($value);
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
