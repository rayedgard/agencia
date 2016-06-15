$("#idiomas").on("change",function(){
		// var valor = $(this).val();
		// clase='".'+valor+'"';
		// var id = $(clase).attr("id");
		idIdioma= $(this).prop('value');
		
			$.ajax({
		type:"POST",
		url: "adminWeb/backend/php/cambioIdioma.php",
		data:{"id":idIdioma},
		success:function(respuesta){
			if (respuesta = 'true') {
				document.location.href = "index.html";
				// idiomas.init();
			}
		}
	});

		// alert(idIdioma);
		// alert(id);
		// banerGeneral.init();
		// destinosIndex.init();
		// perfilesIndex.init();
		// viajesIndex.init();
		// menuIdiomas.init();
		// idiomas.comboIdiomas();
		// break;
})

var idIdioma= "v";

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
			url: "adminWeb/backend/php/listarIdiomas.php",
			data:{"id":idIdioma},
			success:function(respuesta){
				$("#idiomas").append(respuesta);
				idIdioma= $("#idiomas").prop('value');
				
				// idioma2 = $("#idiomas").prop('id');
				// alert(idIdioma);

				banerGeneral.init();
				galeriaGeneral.init();
				destinosIndex.init();
				perfilesIndex.init();
				viajesIndex.init();
				menuIdiomas.init();
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
			var id = idIdioma;
			// alert(estadoIdioma)

			$.ajax({
			type:"POST",
			url: "adminWeb/backend/php/listarBanerGeneral.php",
			data:{"id":id},
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
			url: "adminWeb/backend/php/listarGaleriaGeneral.php",
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

			$.ajax({
			type:"POST",
			url: "adminWeb/backend/php/listarDestinos.php",
			data:{"idIdioma":id, "accion":"index"},
			success:function(respuesta){
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
			url: "adminWeb/backend/php/listarCategoria.php",
			data:{"idIdioma":id, "accion":"index"},
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
			url: "adminWeb/backend/php/listarPerfiles.php",
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

var menuIdiomas={
	init:function(){
		window.onload = menuIdiomas.cargarMenuIdioma();
		window.onload = menuIdiomas.cargarTagsIndex();
		// menuIdiomas.cargarMenuIdioma();
		// menuIdiomas.cargarTagsIndex();
	},

	cargarMenuIdioma:function(){
		var id = idIdioma;
		$.ajax({
			type:'POST',
			url:'adminWeb/backend/php/IdiomaMenu.php',
			data:{"idIdioma":id, "accion":"actionIdioma" },
			// data:'actionIdioma',

			success:function(rs)
			{
				// alert(rs);
				$("#listaMenu").html(rs);
				
			}


	});
  },

  cargarTagsIndex:function(){
  		var id = idIdioma;
  	$.ajax({
  		type:'POST',
  		url:'adminWeb/backend/php/IdiomaMenu.php',
  		data:{"idIdioma":id, "accion":"actionIdiomaLavels" },
  		// data:'actionIdiomaLavels',
  		success:function(rs)
  		{
  			var datos=rs;
  			//var myArray=new Array();
  			var patron=/\|(.+)\|/;
  			//var myArray = patron.exec(datos);
  			var myArray =datos.split('|');
  			$("div#div_nosotros1").html(myArray[2]);
  			$("div#div_aboutTexto").html("<p>"+myArray[1]+"</p>");
  			$("div#h2_destinos").html("<p>"+myArray[3]+"</p>");
  			$("div#h2_paquetes").html("<p>"+myArray[4]+"</p>");
  			$("div#h2_team").html("<p>"+myArray[5]+"</p>");
  			$("div#h2_galeria").html("<p>"+myArray[6]+"</p>");
  			$("div#h2_contactanos").html("<p>"+myArray[7]+"</p>");
  			// $("div#btn_readMore1").html("<p>"+myArray[8]+"</p>");
  			// $("div#btn_readMore2").html("<p>"+myArray[8]+"</p>");
  			// $("div#btn_readMore3").html("<p>"+myArray[8]+"</p>");
  			
  			// for (var i = 0; i < myArray.length; i++) {
  			// 	console.log( i+"  "+myArray[i]);
  			// }


  			var datos="<div class='col-sm-6 height-contact-element'> <div class='form-group' id='form_fullName'> <input type='text' name='first_name' class='form-control custom-labels' id='name' placeholder='"+myArray[9]+"' required data-validation-required-message='Please write your name!'/> <p class='help-block text-danger'></p>  </div>  </div>  <div class='col-sm-6 height-contact-element'>  <div class='form-group'>  <input type='email' name='email' class='form-control custom-labels' id='email' placeholder='"+myArray[10]+"' required data-validation-required-message='Please write your email!'/>  <p class='help-block text-danger'></p>  </div>  </div>  <div class='col-sm-12 height-contact-element'>  <div class='form-group'>  <input type='text' name='message' class='form-control custom-labels' id='message' placeholder='"+myArray[11]+"' required data-validation-required-message='Please write a message!'/>  </div> </div>  <div class='col-sm-3 col-xs-6 height-contact-element'>  <div class='form-group'> <input type='submit' class='btn btn-md btn-custom btn-noborder-radius' style='background-color: #58AAF5;' value='"+myArray[13]+"'/>  </div>  </div>  <div class='col-sm-3 col-xs-6 height-contact-element'>  <div class='form-group'>  <button type='button' class='btn btn-md btn-noborder-radius btn-custom' style='background-color: #58AAF5;' name='reset'>"+myArray[14]+" </button>  </div> </div>  <div class='col-sm-3 col-xs-6 height-contact-element'> <div class='form-group'>  <div id='response_holder'></div> </div> </div> <div class='col-sm-12 contact-msg'>  <div id='success'></div> </div>";
  			var datosLocation="<div class='form-group'><i class='fa fa-2x fa-map-marker'></i><span class='text'>"+myArray[12]+"</span></div>";
  			$("div#Form_Definitivo").html("<p>"+datos+"</p>");
  			$("div#form_location").html("<p>"+datosLocation+"</p>");
  			
  			$("div#form_siguenoss").html("<h2>"+myArray[15]+"</h2>");
		}
  	});
  },
  //-----------------------------
}

$(document).ready(idiomas.init);
// $(document).ready(menuIdiomas.init());

