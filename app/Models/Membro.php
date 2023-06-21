<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento',
        'celular',
        'endereco',
        'estado_civil',
        'batizado',
        'lider',
        'pastor',
        'personalidade',
        'linguagem_amor',
        'enabled',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/membros/'.$this->getKey());
    }
}
