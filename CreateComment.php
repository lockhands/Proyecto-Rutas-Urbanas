<?php

include 'claseconexion.php';


$objconexion=new conexion();

$sql1="SELECT * FROM  `rutas` ";
$empresas=$objconexion->consultar($sql1);



if($_POST){

		$nombre= (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
		$apellido= (isset($_POST['apellido'])) ? $_POST['apellido'] : "";
		$correo= (isset($_POST['correo'])) ? $_POST['correo'] : "";
		$empresa= (isset($_POST['empresa'])) ? $_POST['empresa'] : "";
		$mensaje=(isset($_POST['mensaje'])) ? $_POST['mensaje'] : "";

		$objconexion=new conexion();

		$sql="INSERT INTO `comments` (`id`, `nombre`, `apellido`, `correo`, `empresa`, `mensaje`) VALUES (NULL, '$nombre', '$apellido', '$correo', '$empresa', '$mensaje');";

         $objconexion->ejecutar($sql);

        header("Location: ./MainUser.php");
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

    <div class="button-footer"> <a href="./MainUser.php" type="submit" >Ver rutas </a> </div>

    <h1>CREAR COMENTARIO</h1>
    <form action="./CreateComment.php" method="post">

    <label for="nombre">Nombres:</label>
    <input class="form-control border" type="text" name="nombre"  id="nombre">

    <label for="apellido">Apellidos:</label>
    <input class="form-control border" type="text" name="apellido"  id="apellido">

    <label for="correo">Correo electronico:</label>
    <input class="form-control border" type="text" name="correo"  id="correo">

    <label for="empresa">Lista de empresas:</label>
     <select  name="empresa"  id="empresa" class="form-control border searchDropdown"> 
		  <option value="empresa"> Empresa que cubre </option>
		  <?php foreach($empresas as $obj=>$value){ 		  ?>
		     <option  value="<?php echo htmlspecialchars($value["empresa"]); ?>"> <?php echo $value["empresa"]; ?> </option> 
           
		  <?php } ?>
        </select>
    <label for="mensaje">Mensaje:</label>
    <textarea class="form-control border" type="text" name="mensaje"  id="mensaje"> </textarea>

    <button type="submit" class="btn btn-dark btn-custom">Enviar comentario </button>
 
     </form>

</section>

  <div class="button-footer"> <a href="./MainUser.php" type="submit" >Volver </a> </div>
</body>
</html>