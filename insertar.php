<?php

include 'claseconexion.php';

$objconexion=new conexion();
$resultado=$objconexion->consultar("SELECT * FROM `rutas` ");



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario</title>
	
</head>

<body>


<?php foreach($resultado as $obj => $value){ ?>
<br/>
	<p><?php echo $value["empresa"] ?></p>
<?php } ?>

<?php if($_POST){ ?>
	<p>Empresa: <strong><?php echo $empresa ?></strong></p>
	<br/>
	<p>Empresa: <strong><?php echo $inicio ?></strong></p>
	<br/>
	<p>Empresa: <strong><?php echo $inicio ?></strong></p>
	<br/>
<?php }?>




<form action="1.php" method="post">

	
	Empresa: <input class="form-control" type="text" name="empresa"  id="">
	 <br/>
	
	Punto de inicio: <input class="form-control" type="text" name="inicio"  id="">
	<br/>
	
	Fin de la ruta: <input class="form-control" type="text" name="fin"  id="">
	<br/>
	
	<textarea name="ruta" rows="10" cols="10" id=""></textarea> 

	<br/>

	Precio: <input class="form/control" type="text" name="precio" id="">
	<br/>

	<input class="btn btn-success" type="submit" value="Enviar Proyecto">


	
</form>




</body>
</html>