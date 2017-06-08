<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Session\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Anuncios;
use App\Categorias;

use App\Usuario;

class login2controller extends Controller
{

    public function auth (Request $request)
    {
    	$info = $request->all();



    	$email = $info['email'];
    	$password = $info['password'];
    	$usuarios = DB::table('usuarios')
			    	->where('email', '=', $email)
			    	->where('password', '=', $password)
			    	->get();

    	//dd($usuarios[0]->email);


		if ($usuarios->count() > 0)
		{

            $usuarios = Usuario::all();
            $anuncio = Anuncios::all();
            $categorias = Categorias::all();
			Session::put('userinfo', $usuarios);
            $users = DB::table('usuarios')->select('id')->where('email', '=', $email)->get();

			return view('panel' , ['anuncio' => $anuncio, 'usuarios'=> $usuarios ,'categorias' => $categorias , 'users'=> $users , 'email'=> $email]);


		}else{

			return redirect('login2')->with('status', 'El usuario o password son incorrectos. Por favor intente nuevamente.');
		}
    	
    }

    public function signout ()
    {
    	//Remover las sesiones y redirect a login
        Session::flush();
        return redirect('login2');
    }
}
