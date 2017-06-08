@extends('layouts.default')


@section('content')


<div class="container">
	<div class="col s12 m7">


		
		<h1>Mis anuncios</h1>
		<a  href="#modal1" class="btn-floating btn-large waves-effect waves-light red right waves-effect waves-light btn"><i class="material-icons">add</i></a>
		<br><br><br>

		@if(session('userinfo'))
		<div>



   		 </div>
		@else
		<!--<div class="col-xs-4 col-sm-4 col-md-4 align-right" style="padding:50">Login</div>-->
		<script type="text/javascript">window.location.href = "{{url('')}}/login";</script>
		@endif

		<div class="col s12 m12">

			<div class="row buscar">

				@foreach($users as $users)


				<div id="tarjetasdecontenido"></div>
				<!-- Javascript -->
				<script type="text/javascript">

					$(document).ready(function (){      
						/* set no cache */
						$.ajaxSetup({ cache: false });

						$.getJSON("http://pruebas.evolucionmarketing.com/anuncios/api/user/anuncios/{{ $users->id }}", function(data){ 
							var html = [];

							/* loop through array */
							$.each(data, function(index, d){  



								var idvar = `item` + d.id;

								html.push(

									'<div class="col s12 m4 anuncio">'+
									'<div class="card">'+
									'<div class="card-image">' +
									'<img src="'+ d.imagen +'">' +
									'<span class="card-title">'+ d.titulo+ '</span>' +
									'</div>' +
									'<div class="card-content">' +
									'<p>' + d.contenido +'}</p>' +
									'Categoria ' + d.categoria +
									'</div>' +
									'<div class="card-action">' +
									`<a href="#" id="${idvar}">Eliminar</a>` + 
									'</div>' +
									'</div>' +
									'</div>'
									);



							});





							$("#tarjetasdecontenido").html(html.join('')).css("background-color", "orange");
						}).error(function(jqXHR, textStatus, errorThrown){ /* assign handler */
							/* alert(jqXHR.responseText) */
							alert("error occurred!");
						});
					});
				</script>




				<script type="text/javascript">

					$(document).ready(function (){      
						/* set no cache */
						$.ajaxSetup({ cache: false });

						$.getJSON("http://pruebas.evolucionmarketing.com/anuncios/api/user/anuncios/{{ $users->id }}", function(data){ 
							var html = [];

							/* loop through array */
							$.each(data, function(index, d){  



								var idvar = `item` + d.id;


								$(`#${idvar}`).click(function(){

									$.ajax({
										url: 'http://pruebas.evolucionmarketing.com/anuncios/api/anuncios/'+d.id,
										type: 'DELETE',
										success: function(response) {
											 location.reload();
										}
									});

								});



							});

						}).error(function(jqXHR, textStatus, errorThrown){ /* assign handler */
							/* alert(jqXHR.responseText) */
							alert("error occurred!");
						});
					});
				</script>


				@endforeach






			</div>

		</div>



	</div>

</div>



        <form class="col s12" action="http://pruebas.evolucionmarketing.com/anuncios/api/add/anuncio" method="post" enctype="multipart/form-data">
          <div class="row">
          <div class="input-field col s12">
              <input name="titulo" id="titulo" type="text" class="validate">
              <label for="titulo">Titulo</label>
            </div>
          </dic>

          <div class="row">
            <div class="input-field col s12">
              <select name="categoria">
						@foreach($categorias as $categorias)
						<option value="{{$categorias->id}}">{{$categorias->titulo}}</option>
						@endforeach
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



    {{ csrf_field() }}
    <input type="hidden" name="id_usuario" value="{{ $users->id }}"">


	<input type="submit" value="Enviar">   

      <!--          <a id="addAnuncio" class=" modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>   -->
          <div id="msj-adAnuncio"></div>
        </form>


@stop
