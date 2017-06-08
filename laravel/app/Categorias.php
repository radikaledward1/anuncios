<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable = [
        'id', 'titulo','descripcion','imagen'
    ];

    protected $table = 'categorias';
}
