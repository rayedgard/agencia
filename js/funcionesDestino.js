$("#idiomas").on("change",function(){
	
	ids= $(this).prop('value');

	$.ajax({
		type:"POST",
		url: "adminWeb/backend/php/cambioIdioma.php",
		data:{"id":ids},
		success:function(respuesta){
			if (respuesta = 'true') {
				document.location.href = "index.html";
			}
		}
	});
})

$(".testimonios").on('click',function(){

	var fecha = $(this).val();
	ids= $("#idiomas").prop('value');
	// alert(fecha);
	// alert(ids);

		$.ajax({
		type:"POST",
		url: "adminWeb/backend/php/listarTestimonio.php",
		data:{'fecha':fecha,"id":ids},
		success:function(respuesta){
			// alert(respuesta);
			$("#listaTestimonios").html(respuesta);
				// document.location.href = "index.html";
		}
	});

});

var idIdioma="";

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
			url: "adminWeb/backend/php/comboIdiomas.php",
			data:{"id":idIdioma},
			success:function(respuesta){
				$("#idiomas").html(respuesta);
				idIdioma= $("#idiomas").prop('value');
				
				totalDestinos.init();
				menuIdiomas.init();
				mostraTestimonios.init();

				// $("#prueba").html("<? $id= "+idIdioma+" ?>");

				// $("#idiomas").on("change",function(){
				// 	// var valor = $(this).val();
				// 	// clase='".'+valor+'"';
				// 	// var id = $(clase).attr("id");
				// 	idIdioma= $(this).prop('value');
				// 	// alert(idIdioma);
				// 	// alert(id);
				// 	totalDestinos.init();
				// 	menuIdiomas.init();

				// 	// $("#prueba").html(idIdioma);
				// 	// perfilesIndex.init();
				// 	// viajesIndex.init();

				// })
			}
		});

	},
}

var mostraTestimonios ={
	init:function(){
   		//window.addEventListener('load', mostrarIdiomas);
   		window.onload = mostraTestimonios.mostrarTest();
   		//$("#btn_login").click(appLogin.validarBoxs);
   		// $(document).ready(app.init);
	},

	mostrarTest:function(){
			id= idIdioma;
			// var estadoIdioma= $("#idiomas").val();
			// alert(estadoIdioma)
			var f = new Date();
			fecha =f.getFullYear();
			$.ajax({
			type:"POST",
		url: "adminWeb/backend/php/listarTestimonio.php",
		data:{'fecha':fecha,"id":id},
			success:function(respuesta){
				// alert(respuesta);
				$("#listaTestimonios").html(respuesta);
				// $(".linkDestino").on('click',function(){
				// 	idDestino= $(this).prop('id');
				// 	document.location.href = "destinos.html?identidcador="+idDestino;
				// });
				// $("#idiomas").on("change",function(){
				// 	// ajax
				// })
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
			url: "adminWeb/backend/php/listarDestinos.php",
			data:{"idIdioma":id, "accion":"destino"},
			success:function(respuesta){
				// alert(respuesta);
				$("#listaDestinos").html(respuesta);
				// $(".linkDestino").on('click',function(){
				// 	idDestino= $(this).prop('id');
				// 	document.location.href = "destinos.html?identidcador="+idDestino;
				// });
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
$(document).ready(idiomasDestinos.init);
