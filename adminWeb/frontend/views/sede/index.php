<?php
require_once '../../models/Sede.php';


// Logica
$cliente = new Sede();
//$sede = new AlumnoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$cliente->__SET('id',              $_REQUEST['id']);
			$cliente->__SET('nombre',          $_REQUEST['nombre']);
			$cliente->__SET('ubicacion',        $_REQUEST['ubicacion']);
			$cliente->__SET('observacion',            $_REQUEST['observacion']);
			$cliente->__SET('estado', $_REQUEST['estado']);

			$cliente->Actualizar($cliente);
			header('Location: index.php');
			break;

		case 'registrar':
			$cliente->__SET('nombre',          $_REQUEST['nombre']);
			$cliente->__SET('ubicacion',        $_REQUEST['ubicacion']);
			$cliente->__SET('observacion',            $_REQUEST['observacion']);
			$cliente->__SET('estado', $_REQUEST['estado']);

			$cliente->Registrar($cliente);
			header('Location: index.php');
			break;

		case 'eliminar':
			$cliente->Eliminar($_REQUEST['id']);
			header('Location: index.php');
			break;

		case 'editar':
			$cliente = $cliente->Obtener($_REQUEST['id']);
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
                
                <form action="?action=<?php echo $cliente->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="id" value="<?php echo $cliente->__GET('id'); ?>" />
                    
                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">nombre</th>
                            <td><input type="text" name="nombre" value="<?php echo $cliente->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">ubicacion</th>
                            <td><input type="text" name="ubicacion" value="<?php echo $cliente->__GET('ubicacion'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">observacion</th>
                            <td><input type="text" name="observacion" value="<?php echo $cliente->__GET('observacion'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">estado</th>
                            <td>
                                <select name="estado" style="width:100%;">
                                    <option value="1" <?php echo $cliente->__GET('estado') == 1 ? 'selected' : ''; ?>>Activo</option>
                                    <option value="2" <?php echo $cliente->__GET('estado') == 0 ? 'selected' : ''; ?>>Inactivo</option>
                                </select>
                            </td>
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
                            <th style="text-align:left;">nombre</th>
                            <th style="text-align:left;">ubicacion</th>
                            <th style="text-align:left;">observacion</th>
                            <th style="text-align:left;">estado</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($cliente->Listar('sede') as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('ubicacion'); ?></td>
                            <td><?php echo $r->__GET('observacion');?></td>
                            <td><?php echo $r->__GET('estado') == 1 ? 'Activo' : 'Inactivo';  ?></td>
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