<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncios extends Model
{
    protected $fillable = [
        'id','titulo', 'contenido','imagen','categoria','id_usuario'
    ];

    protected $table = 'anuncios';
}
