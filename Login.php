<?php

session_start();

include 'claseconexion.php';


$cedula="";
$autorizado=0;
$clave="1234";

if($_POST){
	
	$cedula=(isset($_POST['email'])) ? $_POST['email'] : "";
	$clave=(isset($_POST['clave'])) ? $_POST['clave'] : "";
	$_SESSION['cedula']=(isset($_POST['email'])) ? $_POST['email'] : "";
	
	$sql= "SELECT * FROM `usuarios` WHERE  cedula='$cedula' AND clave='${clave}' ";
	

$objconexion=new conexion();

$resultado=$objconexion->consultar($sql);
	
	 foreach($resultado as $obj => $value){ 
		echo $value["autorizado"];

		if($value["autorizado"]=="1"){
			
			 header("Location: ./MainUser.php");
			die(); 
		}
		else{
			 header("Location: ./MainAdmin.php");
			die();
			
		}
	 }


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


    <h1>INICIAR SESION</h1>
    <form action="Login.php" method="post">

    <label for="cedula">Cedula:</label>
    <input class="form-control border" type="text" name="email"  id="email">

    <label for="clave">Clave:</label>
    <input class="form-control border" type="password" name="clave"  id="clave">

    <button type="submit" class="btn btn-dark btn-custom">INICIAR SESION </button>
 
     </form>

</section>

</body>
</html>