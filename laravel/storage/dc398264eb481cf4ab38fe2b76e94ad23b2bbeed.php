<?php $__env->startSection('content'); ?>


<div class="container">
	<div class="col s12 m7">


		
		<h1>Mis anuncios</h1>
		<a  href="#modal1" class="btn-floating btn-large waves-effect waves-light red right waves-effect waves-light btn"><i class="material-icons">add</i></a>
		<br><br><br>

		<?php if(session('userinfo')): ?>
		<div>



   		 </div>
		<?php else: ?>
		<!--<div class="col-xs-4 col-sm-4 col-md-4 align-right" style="padding:50">Login</div>-->
		<script type="text/javascript">window.location.href = "<?php echo e(url('')); ?>/login";</script>
		<?php endif; ?>

		<div class="col s12 m12">

			<div class="row buscar">

				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


				<div id="tarjetasdecontenido"></div>
				<!-- Javascript -->
				<script type="text/javascript">

					$(document).ready(function (){      
						/* set no cache */
						$.ajaxSetup({ cache: false });

						$.getJSON("http://pruebas.evolucionmarketing.com/anuncios/api/user/anuncios/<?php echo e($users->id); ?>", function(data){ 
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

						$.getJSON("http://pruebas.evolucionmarketing.com/anuncios/api/user/anuncios/<?php echo e($users->id); ?>", function(data){ 
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


				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






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
						<?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorias): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($categorias->id); ?>"><?php echo e($categorias->titulo); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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



    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="id_usuario" value="<?php echo e($users->id); ?>"">


	<input type="submit" value="Enviar">   

      <!--          <a id="addAnuncio" class=" modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>   -->
          <div id="msj-adAnuncio"></div>
        </form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>