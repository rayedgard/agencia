var menuIdiomas={
	init:function(){
		menuIdiomas.cargarMenuIdioma();
	},

	cargarMenuIdioma:function(){
		$.ajax({
			type:'POST';
			url:'../../adminWeb/backend/php/Idioma.php';
			data:'actionIdioma';

			success:function(rs)
			{
				var obj=jQuery.parseJSON(rs);
				//busqueda de datos devueltos por php
				$.each(obj,function(i,item){
					console.log(item);
					});
				}

			}
		});
	},
}

$(document).ready(menuIdiomas.init());