<?php

include 'claseconexion.php';

$inicio="";
$fin="";
$ruta="";



if($_POST){

    $inicio= (isset($_POST['inicio'])) ? $_POST['inicio'] : "";
    $fin= (isset($_POST['fin'])) ? $_POST['fin'] : "";
    $ruta=(isset($_POST['ruta'])) ? $_POST['ruta'] : "";

}


$objconexion=new conexion();
$resultado=$objconexion->consultar("SELECT * FROM `rutas` WHERE inicio='$inicio' AND fin='$fin'

 ");



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

<form action="consulta.php" method="post">


	
	Punto de inicio: <input class="form-control" type="text" name="inicio"  id="">
	<br/>
	
	Fin de la ruta: <input class="form-control" type="text" name="fin"  id="">
	<br/>
	
	<textarea name="ruta" rows="10" cols="10" id=""></textarea> 

	<br/>

	
	<input class="btn btn-success" type="submit" value="Enviar Proyecto">


	
</form>




</body>
</html>