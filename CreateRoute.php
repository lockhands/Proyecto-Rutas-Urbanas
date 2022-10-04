<?php

include 'claseconexion.php';

if($_POST){

	$routeName=(isset($_POST['nombre'])) ? $_POST['nombre'] : "";
	$precio= (isset($_POST['precio'])) ? $_POST['precio'] : "";
	$empresa= (isset($_POST['empresa'])) ? $_POST['empresa'] : "";
	$inicio= (isset($_POST['inicio'])) ? $_POST['inicio'] : "";
	$fin= (isset($_POST['fin'])) ? $_POST['fin'] : "";
	$ruta=(isset($_POST['ruta'])) ? $_POST['ruta'] : "";

	$objconexion=new conexion();

	$sql="INSERT INTO `rutas` (`id`,`nombre`, `precio`, `empresa`, `inicio`, `fin`, `vias`) VALUES (NULL,'$routeName', '$precio', '$empresa', '$inicio', '$fin', '$ruta');";

	 $objconexion->ejecutar($sql);

     
	header("Location: ./AdminRoutes.php");
	 die();
  

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<title>Formulario</title>

    <link rel="stylesheet" href="./assets/styles.css">
	
</head>

<body>

<section class="containerForm"> 
     <div class="button-footer"> <a href="./AdminRoutes.php" type="submit" >Volver </a> </div>

    <h1>CREAR RUTA</h1>
    <form action="./CreateRoute.php" method="post">

    <label for="routeName">Nombre de la ruta:</label>
    <input class="form-control border" type="text" name="nombre"  id="routeName">

    <label for="precio">Precio del pasaje:</label>
    <input class="form-control border" type="text" name="precio"  id="precio">

    <label for="precio">Empresa que cubre:</label>
    <input class="form-control border" type="text" name="empresa"  id="precio">

    <label for="inicio">Inicio de ruta:</label>
    <input class="form-control border" type="text" name="inicio"  id="inicio">

    <label for="ruta">Rutas:</label>
    <input class="form-control border" type="text" name="ruta"  id="ruta">

    <label for="fin">Fin de ruta:</label>
    <input class="form-control border" type="text" name="fin"  id="fin">

    <button type="submit" class="btn btn-dark btn-custom">CREAR RUTA </button>
 
     </form>

</section>

</body>
</html>