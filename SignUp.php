<?php

session_start();

include 'claseconexion.php';


$cedula="";
$autorizado="0";
$clave="1234";

if($_POST){
	
	$cedula=(isset($_POST['email'])) ? $_POST['email'] : "";
    $clave=(isset($_POST['clave'])) ? $_POST['clave'] : "";
    $autorizado=(isset($_POST['tipo'])) ? $_POST['tipo'] : "";
	$_SESSION['cedula']=(isset($_POST['email'])) ? $_POST['email'] : "";
	
	

$objconexion=new conexion();


$sql1="INSERT INTO `usuarios` (`id`, `cedula`, `clave`, `autorizado`) SELECT NULL, '$cedula', '$clave', '$autorizado' WHERE NOT EXISTS(SELECT * FROM `usuarios` WHERE cedula = '$cedula')";

	
/*
$sql1="INSERT INTO `usuarios` (`id`, `cedula`, `clave`, `autorizado`) VALUES (NULL, '$cedula', '$clave', '$autorizado');";
*/
$objconexion->ejecutar($sql1);

header("Location: ./main.php");
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


    <h1>REGISTRATE</h1>
    <form action="SignUp.php" method="post">

    <label for="cedula">Cedula:</label>
    <input class="form-control border" type="text" name="email"  id="email">

    <label for="clave">Clave:</label>
    <input class="form-control border" type="password" name="clave"  id="clave">

    <label for="tipo">Tipo:</label>
    <select class="form-control border" type="password" name="tipo"  id="tipo"> 
      <option value="0">  Admin </option>
      <option value="1">  User </option>
    </select>
   

    <button type="submit" class="btn btn-dark btn-custom">REGISTRATE </button>
 
     </form>

</section>

</body>
</html>