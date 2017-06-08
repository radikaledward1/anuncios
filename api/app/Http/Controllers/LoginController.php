<?php

namespace  App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    private $salt;

    public function __construct()
    {
        $this->salt="userloginregister";
    }

    public function allUsers() {

      $login = Login::all();

      return response()->json($login);
    }

    public function login(Request $request) {

      if ($request->has('email') && $request->has('password')) {
        $login = Login:: where("email", "=", $request->input('email'))
                      ->where("password", "=", $request->input('password'))
                      ->first();
        if ($login) {
          $userId = Login::where('email', '=', $request->input('email'))->get();
          return response()->json($userId);
        } else {
          return "El usuario o contraseña es incorrecto";
        }
      } else {
        echo "email: ". $request->input('email');
        echo "pass: ". $request->input('password');
        return "La informacion no esta completa";
      }
    }

    public function find($id) {

      $login = Login::find($id);

      return response()->json($login);
    }

    public function create(Request $request){

      if ($request->has('nombre') && $request->has('password') && $request->has('email')) {
        $login = Login::where("email", "=", $request->input('email'))
                      ->where("password", "=", $request->input('password'))
                      ->first();
        if ($login) {
          return "ese email ya existe";
        } else {
          $nombre = Login::where("nombre", "=", $request->input('nombre'))
          ->first();
          if ($nombre) {
            return "ese nombre ya fue usado";
          }else{
            $login = new Login;
            $login->nombre=$request->input('nombre');
            $login->password=$request->input('password');
            $login->email=$request->input('email');
            if($login->save()){
              return response()->json($login);
            } else {
              return "Registro Fallo";
            }
          }
        }
      } else {
       return "Favor de completar los datos";
    }
   }

    public function update(Request $request, $id){

      $login = Login::find($id);

      $updated = $login->update($request->all());

      return response()->json(['updated' => $updated]);

    }

    public function delete($id){

      $login = Login::destroy($id);

      return response()->json(['deleted' => $count == 1]);

    }




    //
}
