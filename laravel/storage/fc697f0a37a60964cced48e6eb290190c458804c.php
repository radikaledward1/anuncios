<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="col s12 m12">
		<div class="row">


			<!-- Javascript -->
			<script type="text/javascript">
				$(document).ready(function (){      
					/* set no cache */
					$.ajaxSetup({ cache: false });

					$.getJSON("http://pruebas.evolucionmarketing.com/anuncios/api/anuncio/<?php echo e($id); ?>", function(data){ 
						var html = [];

						/* loop through array */
						$.each(data, function(index, d){            
							html.push('<div class="col s12 m12 anuncio">',
								'<div class="card horizontal">',
								'<div class="card-image">' ,
								'<img src="', d.imagen ,'">' ,
								'<span class="card-title">', d.titulo, '</span>' ,
								'</div>' ,
								'<div class="card-content">' ,
								'<p>' , d.contenido ,'}</p>' ,
								'Categoria ' , d.categoria ,
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
				});
			</script>

			<div id="tarjetasdecontenido"></div>


		</div>

	</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>