<?php


include 'claseconexion.php';

$resultado = [];

$objconexion=new conexion();
$sql= "SELECT * FROM `rutas`  ";
$resultado=$objconexion->consultar($sql);


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

    <div class="button-footer"> <a href="./AdminViewComments.php" type="submit" >VER COMENTARIOS DE USUARIOS </a> </div>
<section class="containerFormRoutes"> 

 <div class="button-footer"> <a href="./MainAdmin.php" type="submit" >Volver </a> </div>
 
    <h1>ADMINISTRADOR DE RUTAS</h1>

    <div class="containerRoutes"> 

    <?php foreach($resultado as $obj => $value){ ?>
         <a  href="./EditRoute.php?id=<?php echo $value["id"] ?>"  class="routeItem"> 
            <img src="./assets/img/route.svg" alt="route">
            <p> <?php echo $value["nombre"] ?> </p>
        </a>
     <?php } ?>

    

      <a  href="./CreateRoute.php"  class="routeItem createRoute"> 
        <img src="./assets/img/plus.svg" alt="route">
        <p> AGREGAR RUTA</p>
     </a >
    </div>

</section>

</body>
</html>