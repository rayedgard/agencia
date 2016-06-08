var menuIdiomas={
	init:function(){
		menuIdiomas.cargarMenuIdioma();
		menuIdiomas.cargarTagsIndex();
	},

	cargarMenuIdioma:function(){
		$.ajax({
			type:'POST',
			url:'../adminWeb/backend/php/IdiomaMenu.php',
			data:'actionIdioma',

			success:function(rs)
			{
				$("ul#listaMenu").append(rs);
			}


	});
  },

  cargarTagsIndex:function(){
  	$.ajax({
  		type:'POST',
  		url:'../adminWeb/backend/php/IdiomaMenu.php',
  		data:'actionIdiomaLavels',
  		success:function(rs)
  		{
  			var datos=rs;
  			//var myArray=new Array();
  			var patron=/\|(.+)\|/;
  			//var myArray = patron.exec(datos);
  			var myArray =datos.split('|');
  			$("div#div_nosotros1").append(myArray[2]);
  			$("div#div_aboutTexto").append("<p>"+myArray[1]+"</p>");
  			$("div#h2_destinos").append("<p>"+myArray[3]+"</p>");
  			$("div#h2_paquetes").append("<p>"+myArray[4]+"</p>");
  			$("div#h2_team").append("<p>"+myArray[5]+"</p>");
  			$("div#h2_galeria").append("<p>"+myArray[6]+"</p>");
  			$("div#h2_contactanos").append("<p>"+myArray[7]+"</p>");
  			$("div#btn_readMore1").append("<p>"+myArray[8]+"</p>");
  			$("div#btn_readMore2").append("<p>"+myArray[8]+"</p>");
  			$("div#btn_readMore3").append("<p>"+myArray[8]+"</p>");
  			alert(myArray[11]);
  			for (var i = 0; i < myArray.length; i++) {
  				console.log( i+"  "+myArray[i]);
  			}


  			var datos="<div class='col-sm-6 height-contact-element'> <div class='form-group' id='form_fullName'> <input type='text' name='first_name' class='form-control custom-labels' id='name' placeholder='"+myArray[9]+"' required data-validation-required-message='Please write your name!'/> <p class='help-block text-danger'></p>  </div>  </div>  <div class='col-sm-6 height-contact-element'>  <div class='form-group'>  <input type='email' name='email' class='form-control custom-labels' id='email' placeholder='"+myArray[10]+"' required data-validation-required-message='Please write your email!'/>  <p class='help-block text-danger'></p>  </div>  </div>  <div class='col-sm-12 height-contact-element'>  <div class='form-group'>  <input type='text' name='message' class='form-control custom-labels' id='message' placeholder='"+myArray[11]+"' required data-validation-required-message='Please write a message!'/>  </div> </div>  <div class='col-sm-3 col-xs-6 height-contact-element'>  <div class='form-group'> <input type='submit' class='btn btn-md btn-custom btn-noborder-radius' value='"+myArray[13]+"'/>  </div>  </div>  <div class='col-sm-3 col-xs-6 height-contact-element'>  <div class='form-group'>  <button type='button' class='btn btn-md btn-noborder-radius btn-custom' name='reset'>"+myArray[14]+" </button>  </div> </div>  <div class='col-sm-3 col-xs-6 height-contact-element'> <div class='form-group'>  <div id='response_holder'></div> </div> </div> <div class='col-sm-12 contact-msg'>  <div id='success'></div> </div>";
  			var datosLocation="<div class='form-group'><i class='fa fa-2x fa-map-marker'></i><span class='text'>"+myArray[12]+"</span></div>";
  			$("div#Form_Definitivo").html("<p>"+datos+"</p>");
  			$("div#form_location").html("<p>"+datosLocation+"</p>");
  			
  			$("div#form_siguenoss").html("<h2>"+myArray[15]+"</h2>");
		}
  	});
  },


  //-----------------------------

}


$(document).ready(menuIdiomas.init());