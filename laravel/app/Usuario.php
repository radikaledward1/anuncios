<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	//Eloquent asume que la tabla cuenta con la columna id, por lo tanto esta columna esta por default.
	public $timestamps = false;
    protected $fillable = ['id', 'nombre', 'email', 'password'];
}
