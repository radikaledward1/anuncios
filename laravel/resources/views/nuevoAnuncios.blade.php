  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
    <h1 style="color: #000">Crear Anuncio</h1>
      <div class="row">
        <form class="col s12" method="post">
          <div class="row">
          <div class="input-field col s12">
              <input id="first_name" type="text" class="validate">
              <label name="titulo" for="first_name">Titulo</label>
            </div>
          </dic>

          <div class="row">
            <div class="input-field col s12">
              <select name="categoria">

						<option value="1">1</option>
				
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
                  <option value="1" selected>1</option>
        
              </select>

    {{ csrf_field() }}
    	<button id="addAnuncio" class=" modal-action modal-close waves-effect waves-green btn-flat">Registrar anuncio</button>
          <div id="msj-adAnuncio"></div>
        </form>
      </div>
    </div>
  </div>