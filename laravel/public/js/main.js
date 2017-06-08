
//JQuery-Ajax
$(document).ready(function(){

	var _baseurl = "http://pruebas.evolucionmarketing.com/anuncios/api";


	$("#btn-registrar").click(function(){


		$.ajaxSetup({
	       headers: {
	           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       }
	    });

		$.ajax({
			      type: "POST",
            url: _baseurl + "/registro",
            data: {
            	   nombre: $("#nombre").val(),
                   email: $("#email").val(),
                   password: $("#password").val(), 
            	  },
            success: function (data) {

                $("#msj-registro").append('Usuario Registrado');
            },
            error: function (data) {
                //console.log('Error:', data);
            }
	    });

	});




        $("#addAnuncio").click(function(){


        $.ajaxSetup({
           headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
           }
        });


        $.ajax({
            type: 'POST',
            url: "http://pruebas.evolucionmarketing.com/anuncios/api/add/anuncio",
             cache: false,
             contentType: 'multipart/form-data',
             processData: false,
             data: {
                   titulo: $("#titulo").val(),
                   categoria: $("#categoria").val(),
                   file:  $("#file").val(),

                   contenido: $("#contenido").val(),
                   id_usuario: $("#id_usuario").val(),
              },
            success: function (data) {

                $("#msj-adAnuncio").append('Anuncio Registrado');
            },
            error: function (data) {

                 $("#msj-adAnuncio").append('Fallo algo');
            }
        });


    });

        


});


