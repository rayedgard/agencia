<?php
require_once 'models/aula.php';
require_once 'models/aula.model.php';

// Logica
$aula01 = new aula();
$aulaModel01 = new aulaModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$aula01->__SET('id',              $_REQUEST['id']);
			$aula01->__SET('nombre',          $_REQUEST['nombre']);
			$aula01->__SET('aforo',        $_REQUEST['aforo']);
			$aula01->__SET('cantidadMinima',            $_REQUEST['cantidadMinima']);
			$aula01->__SET('cantidadMaxima', $_REQUEST['cantidadMaxima']);
            $aula01->__SET('observacion', $_REQUEST['observacion']);
            $aula01->__SET('estado', $_REQUEST['estado']);

			$aulaModel01->Actualizar($aula01);
			header('Location: aula.php');
			break;

		case 'registrar':
			$aula01->__SET('nombre',          $_REQUEST['nombre']);
			$aula01->__SET('aforo',        $_REQUEST['aforo']);
			$aula01->__SET('cantidadMinima',            $_REQUEST['cantidadMinima']);
			$aula01->__SET('cantidadMaxima', $_REQUEST['cantidadMaxima']);
            $aula01->__SET('observacion', $_REQUEST['observacion']);
            $aula01->__SET('estado', $_REQUEST['estado']);
			
            $aulaModel01->Registrar($aula01);
			header('Location: "views/aula/aula.php"');
			break;

		case 'eliminar':
			$aulaModel01->Eliminar($_REQUEST['id']);
			header('Location: aula.php');
			break;

		case 'editar':
			$aula01 = $aulaModel01->Obtener($_REQUEST['id']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $aula01->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="id" value="<?php echo $aula01->__GET('id'); ?>" />
                    
                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="nombre" value="<?php echo $aula01->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Aforo</th>
                            <td><input type="text" name="aforo" value="<?php echo $aula01->__GET('aforo'); ?>" style="width:100%;" /></td>
                        </tr>
                        

                        <tr>
                            <th style="text-align:left;">Cantidad Minima</th>
                            <td><input type="text" name="cantidadMinima" value="<?php echo $aula01->__GET('cantidadMinima'); ?>" style="width:100%;" /></td>
                        </tr>


                        <tr>
                            <th style="text-align:left;">Cantidad Maxima</th>
                            <td><input type="text" name="cantidadMaxima" value="<?php echo $aula01->__GET('cantidadMaxima'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Observacion</th>
                            <td><input type="text" name="observacion" value="<?php echo $aula01->__GET('observacion'); ?>" style="width:100%;" /></td>
                        </tr>

                        <tr>
                            <th style="text-align:left;">Estado</th>
                            <td><input type="text" name="estado" value="<?php echo $aula01->__GET('estado'); ?>" style="width:100%;" /></td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Aforo</th>
                            <th style="text-align:left;">Cantidad Minima</th>
                            <th style="text-align:left;">Cantidad Maxima</th>
                            <th style="text-align:left;">Observacioon</th>}
                            <th style="text-align:left;">Estado</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($aulaModel01->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('aforo'); ?></td>
                            <td><?php echo $r->__GET('cantidadMinima'); ?></td>
                            <td><?php echo $r->__GET('cantidadMaxima'); ?></td>
                            <td><?php echo $r->__GET('observacion'); ?></td>
                            <td><?php echo $r->__GET('estado'); ?></td>
                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>