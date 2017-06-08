<?php

namespace  App\Http\Controllers;

use App\Anuncios;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Google\Cloud\Storage\StorageClient;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class AnunciosController extends Controller

{

    public function __construct()
    {
        // $this->middleware('LumenCors');
    }

    public function index() {

      $anuncio = Anuncios::all();

      return response()->json($anuncio);
    }

    public function find($categoria) {

      $anuncio = Anuncios::where('categoria', '=', $categoria)->get();

      return response()->json($anuncio);
    }

    public function findById($id) {

      $anuncio = Anuncios::where('id', '=', $id)->get();

      return response()->json($anuncio);
    }

    public function findByIdUser($id) {

      $anuncio = Anuncios::where('id_usuario', '=', $id)->get();

      return response()->json($anuncio);
    }

    //for future reference

    // public function create(Request $request){
    //
    //    $input = $request->input();
    //
    //    $titulo = $input['titulo'];
    //    $contenido = $input['contenido'];
    //    $categoria = $input['categoria'];
    //    $idUsuario = $input['id_usuario'];
    //
    //    $anuncio = Anuncios::create([
    //               'titulo' => $titulo,
    //               'contenido' => $contenido,
    //               'categoria' => $categoria,
    //               'id_usuario' => $idUsuario
    //             ]);
    //
    //   // $anuncio = Anuncios::create($request->all());
    //
    //    return response()->json($anuncio);
    //
    // }

    public function createNew(Request $request){

      $uploads_dir = './tempImages';

      $image = $request->file('file');

      $extension = $request->file->extension();

      //s3
      $s3 = S3Client::factory([
          'key' => 'AKIAJOTZHMRTN5L5SFQQ',
          'secret' => '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',
          'signature' => 'v4',
          'region'=>'us-east-2'
      ]);

      try {

        $imageID = rand();
        $imageIDString = strval($imageID);
        $fileName = "{$imageIDString}.{$extension}";

        $s3->putObject([
            'Bucket' => 'anuncios-files',
            'Key' => "Images/{$fileName}",
            'Body' => fopen($image, 'rb'),
            'ContentType' => "image/{$extension}",
            'ACL' => 'public-read'
        ]);

         $linkImage = "https://s3.us-east-2.amazonaws.com/anuncios-files/Images/".$fileName;

         $input = $request->input();

         $titulo = $input['titulo'];
         $contenido = $input['contenido'];
         $categoria = $input['categoria'];
         $idUsuario = $input['id_usuario'];

         $anuncio = Anuncios::create([
                    'titulo' => $titulo,
                    'contenido' => $contenido,
                    'categoria' => $categoria,
                    'id_usuario' => $idUsuario,
                    'imagen' => $linkImage
                  ]);

         return response()->json($anuncio);

      }catch(S3Exception $error){
         return $error;
      }


    }

    public function update(Request $request, $id){

      $anuncio = Anuncios::find($id);

      $updated = $anuncio->update($request->all());

      return response()->json(['updated' => $updated]);

    }

    public function delete($id){

      $count = Anuncios::destroy($id);

      return response()->json(['deleted' => $count == 1]);

    }




    //
}
