1	<?php

include 'claseconexion.php';


if($_POST){

		$precio= (isset($_POST['precio'])) ? $_POST['precio'] : "";
		$empresa= (isset($_POST['empresa'])) ? $_POST['empresa'] : "";
		$inicio= (isset($_POST['inicio'])) ? $_POST['inicio'] : "";
		$fin= (isset($_POST['fin'])) ? $_POST['fin'] : "";
		$ruta=(isset($_POST['ruta'])) ? $_POST['ruta'] : "";

		$objconexion=new conexion();

		$sql="INSERT INTO `rutas` (`id`, `precio`, `empresa`, `inicio`, `fin`, `vias`) VALUES (NULL, '$precio', '$empresa', '$inicio', '$fin', '$ruta');";

         $objconexion->ejecutar($sql);

        header("Location: /ejercicios/insertar.php");
         die();

	
}


?>