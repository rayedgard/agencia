var idIdioma;

var idiomas ={

	init:function(){
   		//window.addEventListener('load', mostrarIdiomas);
   		window.onload = idiomas.comboIdiomas();
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
				
				// idioma2 = $("#idiomas").prop('id');
				// alert(idIdioma);

				banerGeneral.init();
				galeriaGeneral.init();
				destinosIndex.init();
				perfilesIndex.init();
				viajesIndex.init();
				$("#idiomas").on("change",function(){
					// var valor = $(this).val();
					// clase='".'+valor+'"';
					// var id = $(clase).attr("id");
					idIdioma= $(this).prop('value');
					// alert(idIdioma);
					// alert(id);
					destinosIndex.init();
					perfilesIndex.init();
					viajesIndex.init();

				})
			}
		});

	},
}

var banerGeneral = {

	init:function(){
   		//window.addEventListener('load', mostrarIdiomas);
   		window.onload = banerGeneral.mostrarBanerGeneral();
   		//$("#btn_login").click(appLogin.validarBoxs);
   		// $(document).ready(app.init);
	},

	mostrarBanerGeneral:function(){
			// var estadoIdioma= $("#idiomas").val();
			// alert(estadoIdioma)

			$.ajax({
			type:"POST",
			url: "../adminWeb/backend/php/listarBanerGeneral.php",
			datatype:"json",
			success:function(respuesta){
				// alert(respuesta);
				$("#banerGeneral").html(respuesta);
				// $("#idiomas").on("change",function(){
				// 	// ajax
				// })
			}
		});

	},
}

var galeriaGeneral = {

	init:function(){

   		window.onload = galeriaGeneral.mostrarGaleriaGeneral();
	},

	mostrarGaleriaGeneral:function(){

			$.ajax({
			type:"POST",
			url: "../adminWeb/backend/php/listarGaleriaGeneral.php",
			success:function(respuesta){
				// alert(respuesta);
				$("#galeriaIndex").html(respuesta);
				// $("#idiomas").on("change",function(){
				// 	// ajax
				// })
			}
		});

	},
}

var destinosIndex = {

	init:function(){

   		window.onload = destinosIndex.mostrarDestinosIndex();
	},

	mostrarDestinosIndex:function(){
			var id = idIdioma;

			// alert(id);

			$.ajax({
			type:"POST",
			url: "../adminWeb/backend/php/listarDestinos.php",
			data:{"idIdioma":id, "accion":"index"},
			success:function(respuesta){
				// alert(respuesta);
				$("#destinosIndex").html(respuesta);
				// $("#idiomas").on("change",function(){
				// 	// ajax
				// })
			}
		});

	},
}

var viajesIndex = {

	init:function(){

   		window.onload = viajesIndex.mostrarViajesIndex();
	},

	mostrarViajesIndex:function(){
			var id = idIdioma;

			// alert(id);

			$.ajax({
			type:"POST",
			url: "../adminWeb/backend/php/listarCategoria.php",
			data:{"idIdioma":id, "index":"" },
			success:function(respuesta){
				// alert(respuesta);
				$("#viajesIndex").html(respuesta);
				// $("#idiomas").on("change",function(){
				// 	// ajax
				// })
			}
		});

	},
}

var perfilesIndex = {

	init:function(){

   		window.onload = perfilesIndex.mostrarPefilesIndex();
	},

	mostrarPefilesIndex:function(){
			var id = idIdioma;

			// alert(id);

			$.ajax({
			type:"POST",
			url: "../adminWeb/backend/php/listarPerfiles.php",
			data:{"idIdioma":id, "index":""},
			success:function(respuesta){
				// alert(respuesta);
				$("#perfilesIndex").html(respuesta);
				// $("#idiomas").on("change",function(){
				// 	// ajax
				// })
			}
		});

	},
}


$(document).ready(idiomas.init);
// $(document).ready(banerGeneral.init);
// $(document).ready(destinosIndex.init);
// $(document).ready(galeriaGeneral.init);
// $(document).ready(perfilesIndex.init);