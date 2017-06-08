<?php

namespace  App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;

class categoriaController extends Controller
{

    public function getCategorias() {

      $categoria = Categorias::all();

      return response()->json($categoria);
    }

    public function find($categoria) {

      $categoria = Categorias::where('titulo', '=', $categoria)->get();

      return response()->json($categoria);
    }

    public function addCategoria(Request $request){

      $categoria = Categorias::create($request->all());

      return response()->json($categoria);

    }

    public function update(Request $request, $id){

      $categoria = Categorias::find($id);

      $updated = $categoria->update($request->all());

      return response()->json(['updated' => $updated]);

    }

    public function delete($id){

      $categoria = Categorias::destroy($id);

      return response()->json(['deleted' => $count == 1]);

    }




    //
}
