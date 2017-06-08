<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use GuzzleHttp\Client;


class getTest extends Controller{
  public function ApiEntradas(){
    //creo un nuevo cliente Guzzle con el servidor API de prueba
    $cliente = new Client(['base_uri' => 'http://pokeapi.co/api/v2//pokemon/']);

    //llamo al servicio ubicado en esa URL utilizando método GET (debe estar 
    // especificado en el servicio)
 
    $respuesta = $cliente->request('GET','index?', 
    		[
                'query' => ['recinto' => '99', // Obligatorio!
                    		'key' => 'apikey', // Obligatorio!
                            //'UUID' => '1234567890abcdef', //Obligatorio!
                    	   ]
        	])->getBody();
    //Retorno los datos solicitados a la vista "apitest"
    return view('index', compact('respuesta'));
 }


}
