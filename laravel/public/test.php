     <!DOCTYPE html>
     <html lang="en">
     <head>
       <meta charset="UTF-8">
       <title>Document</title>
     </head>
     <body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script type="text/javascript">
      $("#addAnuncio").click(function(){

        $.ajax({
            type: "POST",
            url: "http://pruebas.evolucionmarketing.com/anuncios/api/add/anuncio",
            contentType: 'multipart/form-data',
            data: {
                   titulo: $("#titulo").val(),
                   categoria: $("#categoria").val(),
                   file: $("#file").val(), 
                   contenido: $("#contenido").val(),
                   id_usuario: $("#id_usuario").val(),

                  },
            success: function (data) {

                $("#msj-adAnuncio").append('Usuario Registrado');
            },
            error: function (data) {
                //console.log('Error:', data);
            }
        });

    });
</script>


               <form class="col s12">
          <div class="row">
          <div class="input-field col s12">
              <input id="first_name" type="text" class="validate">
              <label name="titulo" for="first_name">Titulo</label>
            </div>
          </dic>

          <div class="row">
            <div class="input-field col s12">
              <select name="categoria">
                <option value="" selected>Categoria</option>
                <option value="carnes" selected>carnes</option>
                <option value="tacos" selected>tacos</option>

              </select>
              <label>Categorias</label>
            </div>
          </div>

          <div class="row">
            <div class="file-field input-field">
              <div class="btn">
                <span>Imagen</span>
                <input type="file" name="file" class="file" id="file" />
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" />
              </div>
            </div>
          </div>


          <div class="row">
            <div class="input-field col s12">
              <textarea name="contenido" id="textarea1" class="materialize-textarea"></textarea>
              <label for="textarea1">Descriptcion</label>
            </div>
          </div>

              <select name="id_usuario" class="hide">
                  <option value="2" selected>2</option>

              </select>

<a id="addAnuncio" href="">test</a>         


 <div id="msj-adAnuncio"></div>
        </form>
     </body>
     </html>

