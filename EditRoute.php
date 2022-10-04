<?php


include 'claseconexion.php';
$objconexion=new conexion();
$resultados=$objconexion->consultar("SELECT * FROM `rutas` ");

 
/* $sql1 = "CREATE TABLE IF NOT EXISTS proyectos1(
     id INT(11) AUTO_INCREMENT PRIMARY KEY,
     nombre VARCHAR(500) NOT NULL,
     imagen VARCHAR(500) NOT NULL,
     descripcion TEXT NOT NULL
)";


if($conexion->query($sql1) === true){

	echo "creo la base de datos";
}
else {
	echo "no creo la base de datos";
}
 */


	

$empresa="";
$inicio="";
$fin="";
$ruta="";


$pepito="grillo grillo";
/*Esta instrucción es la que yo deseo insertar*/




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

    <h1>EDITAR RUTA</h1>
    <form action="./CreateRoute.php" method="post">

    <label for="routeName">Nombre de la ruta:</label>
    <input class="form-control border" type="text" name="routeName"  id="routeName">

    <label for="precio">Precio del pasaje:</label>
    <input class="form-control border" type="text" name="precio"  id="precio">

    <label for="precio">Empresa que cubre:</label>
    <input class="form-control border" type="text" name="precio"  id="precio">

    <label for="inicio">Inicio de ruta:</label>
    <input class="form-control border" type="text" name="inicio"  id="inicio">

    <label for="ruta">Rutas:</label>
    <input class="form-control border" type="text" name="ruta"  id="ruta">

    <label for="fin">Fin de ruta:</label>
    <input class="form-control border" type="text" name="fin"  id="fin">

    <button type="submit" class="btn btn-dark btn-custom">EDITAR RUTA </button>
 
     </form>

</section>

</body>
</html>