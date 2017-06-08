<?php
namespace App;


use Illuminate\Database\Eloquent\Model;


class Anuncios extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'contenido','imagen','categoria','id_usuario'
    ];

    protected $table = 'anuncios';
    
}
