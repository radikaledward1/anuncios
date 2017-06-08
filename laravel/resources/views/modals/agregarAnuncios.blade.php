  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
    <h1 style="color: #000">Crear Anuncio</h1>
      <div class="row">
        <form class="col s12" action="http://pruebas.evolucionmarketing.com/anuncios/api/adAnuncio" method="post">
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
                <input type="file" name="file" >
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
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
                @foreach($users as $users)
                  <option value="{{ $users->id }}" selected>{{ $users->id }}</option>
                @endforeach
              </select>


        </form>
      </div>
    </div>
  </div>