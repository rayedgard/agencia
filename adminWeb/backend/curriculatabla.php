<?php
require_once 'models/Curricula.php';
require_once 'models/Ciclo.php';
require_once 'models/Nivel.php';
require_once '/../config/funciones.php';

//recupera variableS para  uso posterior

// Logica
 
$ciclo = new Ciclo();
$nivel = new Nivel();
$curricula = new Curricula();

$_curricula = $curricula->NumeroRegistros();
echo $_curricula->__GET('nroRegistros');

?>	
		<script type="text/javascript">

		var paginador;
		var totalPaginas
		var itemsPorPagina = 5;
		var numerosPorPagina = 5;

		function creaPaginador(totalItems)
		{
			paginador = $(".pagination");

			totalPaginas = Math.ceil(totalItems/itemsPorPagina);

			$('<li><a href="#" class="first_link"><</a></li>').appendTo(paginador);
			$('<li><a href="#" class="prev_link">«</a></li>').appendTo(paginador);

			var pag = 0;
			while(totalPaginas > pag)
			{
				$('<li><a href="#" class="page_link">'+(pag+1)+'</a></li>').appendTo(paginador);
				pag++;
			}


			if(numerosPorPagina > 1)
			{
				$(".page_link").hide();
				$(".page_link").slice(0,numerosPorPagina).show();
			}

			$('<li><a href="#" class="next_link">»</a></li>').appendTo(paginador);
			$('<li><a href="#" class="last_link">></a></li>').appendTo(paginador);

			paginador.find(".page_link:first").addClass("active");
			paginador.find(".page_link:first").parents("li").addClass("active");

			paginador.find(".prev_link").hide();

			paginador.find("li .page_link").click(function()
			{
				var irpagina =$(this).html().valueOf()-1;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .first_link").click(function()
			{
				var irpagina =0;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .prev_link").click(function()
			{
				var irpagina =parseInt(paginador.data("pag")) -1;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .next_link").click(function()
			{
				var irpagina =parseInt(paginador.data("pag")) +1;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .last_link").click(function()
			{
				var irpagina =totalPaginas -1;
				cargaPagina(irpagina);
				return false;
			});

			cargaPagina(0);




		}

		function cargaPagina(pagina)
		{
			var desde = pagina * itemsPorPagina;

			$.ajax({
				data:{"param1":"dame","limit":itemsPorPagina,"offset":desde},
				type:"GET",
				dataType:"json",
				url:"conexion.php"
			}).done(function(data,textStatus,jqXHR){

				var lista = data.lista;

				$("#miTabla").html("");

				$.each(lista, function(ind, elem){

					$("<tr>"+
						"<td>"+elem.id+"</td>"+
						"<td>"+elem.nombre+"</td>"+
						"<td>"+elem.apellidopaterno+"</td>"+
						"<td>"+elem.apellidomaterno+"</td>"+
						"</tr>").appendTo($("#miTabla"));


				});			


			}).fail(function(jqXHR,textStatus,textError){
				alert("Error al realizar la peticion dame".textError);

			});

			if(pagina >= 1)
			{
				paginador.find(".prev_link").show();

			}
			else
			{
				paginador.find(".prev_link").hide();
			}


			if(pagina <(totalPaginas- numerosPorPagina))
			{
				paginador.find(".next_link").show();
			}else
			{
				paginador.find(".next_link").hide();
			}

			paginador.data("pag",pagina);

			if(numerosPorPagina>1)
			{
				$(".page_link").hide();
				if(pagina < (totalPaginas- numerosPorPagina))
				{
					$(".page_link").slice(pagina,numerosPorPagina + pagina).show();
				}
				else{
					if(totalPaginas > numerosPorPagina)
						$(".page_link").slice(totalPaginas- numerosPorPagina).show();
					else
						$(".page_link").slice(0).show();

				}
			}

			paginador.children().removeClass("active");
			paginador.children().eq(pagina+2).addClass("active");


		}


		$(function()
		{

			$.ajax({

				data:{"param1":"cuantos"},
				type:"GET",
				dataType:"json",
				url:"conexion.php"
			}).done(function(data,textStatus,jqXHR){
				
				
				creaPaginador(<?php echo $_curricula->__GET('nroRegistros'); ?>);



			}).fail(function(jqXHR,textStatus,textError){
				alert("Error al realizar la peticion cuantos".textError);

			});



		});



		</script>
							<div class="table-responsive">
								  <table id="employee-grid" class="table table-bordered" >
									<thead>
									  <tr>
										<th>#</th>
										<th colspan="6">Curricula</th>										
										<th colspan="1">Fecha Inicio</th>	
										<th colspan="1">Fecha Fin</th>												
										<th colspan="1">Estado</th>	
										<th colspan="1">Option</th>	
										<!--<th colspan="1">1</th>												
										<th colspan="1">2</th>	-->
									
										
									  </tr>
									</thead>
									<tbody>
									 
										
									<?php 
										$cont=1;
										foreach($curricula->ListarSearch('curricula',$_POST['name1']) as $r): ?>



			                      	  <tr <?php echo $r->__GET('estado') == 1 ? 'class="colorrowactivo"' : 'class="colorinactivo"'    ?>>
			                        	<td scope="row"><?php echo $cont++; ?></td>
			                            <td colspan="6"><?php echo $r->__GET('nombre'); ?></td>  
			                            <td colspan="1"><?php echo $r->__GET('fechaInicio'); ?></td>              
			                            <td colspan="1"><?php echo $r->__GET('fechaFin'); ?></td>  
			                              <td colspan="1"><?php echo $r->__GET('estado') == 1 ? 'Activo' : 'Inactivo'; ?></td> 
			                           <!-- <td colspan="1"><?php echo $r->__GET('id'); ?></td>              
			                            <td colspan="1"><?php echo $id; ?></td>  -->                       
			                          

			                            			                            
			                        	<td> 

										<a href="?p=<?php echo urlencode(encripta($p,"rayedgard"));?>&action=<?php echo urlencode(encripta('editar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>" class="btn btn-xs btn-primary">Editar</a>

										<a href="?p=<?php echo urlencode(encripta('nivel.php',"rayedgard"));?>&idcu=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>&id=<?php echo urlencode(encripta(0,'rayedgard')); ?>" class="btn btn-xs btn-warning warning_33">Agregar Niveles</a>
			                        	
										<a href="#"  onclick="javascript:direc('?p=<?php echo urlencode(encripta($p,"rayedgard"));?>&action=<?php echo urlencode(encripta('eliminar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>','<?php echo $r->__GET('nombre'); ?>')" class="btn btn-sm btn-danger">Eliminar</a>						
												
										</td>
			                        </tr>
			                    	<?php endforeach; ?>
									</tbody>


								  </table>
								<div class="col-md-12 text-center">
									<ul class="pagination" id="paginador"></ul>


									
								</div>

								
								  
								</div><!-- /.table-responsive -->

			

