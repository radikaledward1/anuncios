<?php $__env->startSection('content'); ?>





<div class="container">
	<div class="col s12 m12">
		<h2 class="header"></h2>
		<div class="row">
			<div class="input-field col s12 m6">
				<select>
					<option value="" disabled selected>Selecciona una categoria</option>

					<?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorias): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option class="opcion" value="<?php echo e($categorias->id); ?>"><?php echo e($categorias->titulo); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			</div>

			<div class="input-field col s12 m6">
				<input id="filtrar" type="text" class="validate">
				<label for="filtrar">Buscar</label>
			</div>
		</div>

		<div class="row buscar">


			<!-- Javascript -->
			<script type="text/javascript">

				$(document).ready(function (){      
					/* set no cache */
					$.ajaxSetup({ cache: false });

					$.getJSON("http://pruebas.evolucionmarketing.com/anuncios/api/anuncios", function(data){ 
						var html = [];

						/* loop through array */
						$.each(data, function(index, d){            
							html.push('<div class="col s12 m4 anuncio">',
								'<div class="card">',
								'<div class="card-image">' ,
								'<img src="', d.imagen ,'">' ,
								'<span class="card-title">', d.titulo, '</span>' ,
								'</div>' ,
								'<div class="card-content">' ,
								'<p>' , d.contenido ,'}</p>' ,
								'Categoria ' , d.categoria ,
								'</div>' ,
								'<div class="card-action">' ,
								'<a href="<?php echo url('/');; ?>/anuncio', d.id ,'">Ver mas</a>' ,
								'</div>' ,
								'</div>' ,
								'</div>'
								);
						});


						$("#tarjetasdecontenido").html(html.join('')).css("background-color", "orange");
					}).error(function(jqXHR, textStatus, errorThrown){ /* assign handler */
						/* alert(jqXHR.responseText) */
						alert("error occurred!");
					});



$('.minisplit').click(function() {
  $(this).addClass('12');
});


				});
			</script>

			<div id="tarjetasdecontenido"></div>




		</div>

	</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>