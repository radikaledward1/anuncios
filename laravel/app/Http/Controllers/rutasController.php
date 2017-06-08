<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\view;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Anuncios;
use App\Categorias;

use App\Usuario;

use Session;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;


class rutasController extends Controller
{
	public function index()
	{
    	$anuncio = Anuncios::all();
        $categorias = Categorias::all();
    	//dd($usuarios);

    	return view('index' , ['anuncio' => $anuncio, 'categorias' => $categorias ]);

    	//return view('index');

	}
	public function login()
	{
		return View::make('login');
	}
	public function registro()
	{
		return View::make('registro');
	}
	public function panel()
	{
    	$usuarios = Usuario::all();
    	$anuncio = Anuncios::all();
        $categorias = Categorias::all();
       return view('panel' , ['anuncio' => $anuncio, 'usuarios', $usuarios ,'categorias' => $categorias ]);
	}
	
	public function vermas($id)
	{
		return View::make('vermas' , ['id' => $id ]);
	}




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

			return view('login')->with('status', 'El usuario o password son incorrectos. Por favor intente nuevamente.');
		}
    	
    }

    public function signout ()
    {
    	//Remover las sesiones y redirect a login
        Session::flush();
        return redirect('/');
    }

	public function nuevoanuncios()
	{

		return View::make('nuevoanuncios');
	}


}
