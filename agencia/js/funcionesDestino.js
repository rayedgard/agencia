var idIdioma;

var idiomasDestinos ={

	init:function(){
   		//window.addEventListener('load', mostrarIdiomas);
   		window.onload = idiomasDestinos.comboIdiomas();
   		//$("#btn_login").click(appLogin.validarBoxs);
   		// $(document).ready(app.init);
	},

	comboIdiomas:function(){
			$.ajax({
			type:"POST",
			url: "../adminWeb/backend/php/listarIdiomas.php",
			datatype:"json",
			success:function(respuesta){
				$("#idiomas").html(respuesta);
				idIdioma= $("#idiomas").prop('value');
				
				totalDestinos.init();

				$("#idiomas").on("change",function(){
					// var valor = $(this).val();
					// clase='".'+valor+'"';
					// var id = $(clase).attr("id");
					idIdioma= $(this).prop('value');
					// alert(idIdioma);
					// alert(id);
					totalDestinos.init();
					// perfilesIndex.init();
					// viajesIndex.init();

				})
			}
		});

	},
}

var totalDestinos = {

	init:function(){
   		//window.addEventListener('load', mostrarIdiomas);
   		window.onload = totalDestinos.mostrarDestinos();
   		//$("#btn_login").click(appLogin.validarBoxs);
   		// $(document).ready(app.init);
	},

	mostrarDestinos:function(){
			id= idIdioma;
			// var estadoIdioma= $("#idiomas").val();
			// alert(estadoIdioma)
			$.ajax({
			type:"POST",
			url: "../adminWeb/backend/php/listarDestinos.php",
			data:{"idIdioma":id, "accion":"destino"},
			success:function(respuesta){
				// alert(respuesta);
				$("#listaDestinos").html(respuesta);
				$(".linkDestino").on('click',function(){
					idDestino= $(this).prop('id');
					document.location.href = "destinos.html?identidcador="+idDestino;
				});
				// $("#idiomas").on("change",function(){
				// 	// ajax
				// })
			}
		});

	},
}
$(document).ready(idiomasDestinos.init);
