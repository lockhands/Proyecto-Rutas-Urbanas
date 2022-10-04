<?php

include 'claseconexion.php';


$resultado = [];

 $objconexion=new conexion();
      $sql= "SELECT * FROM `rutas`  ";
      $resultado=$objconexion->consultar($sql);
      

$route;

$route["nombre"] = "";
$route["precio"] = "";
$route["empresa"] = "";
$route["inicio"] = "";
$route["fin"] = "";
$route["vias"] = "";

$seleccion="";
$buscar="";
if($_GET){

   try {
     $seleccion= (isset($_GET['consulta'])) ? $_GET['consulta'] : "";
      $buscar= (isset($_GET['routeName'])) ? $_GET['routeName'] : "";
      
      $objconexion=new conexion();
      $sql= "SELECT * FROM `rutas` WHERE  $seleccion='$buscar' ";
      $resultado=$objconexion->consultar($sql);
      
   } catch (\Throwable $th) {
      //throw $th;
   }
 
    
   try {
     $route_id = (isset($_GET['id'])) ? $_GET['id'] : "";
  foreach($resultado as $obj => $value){
    if($value['id'] === $route_id){
      $route = $value;
    }
  }
   } catch (\Throwable $th) {
      //throw $th;
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




<section class="containerFormRoutes"> 

    <div class="button-footer"> <a href="./MainUser.php" type="submit" >Volver </a> </div>

    <h1>RUTAS</h1>

    <form class="containerSearch" action="./UserRoutes.php" method="get">
	
    <div>

        <label for="routeName">Campo:</label>
        <select  class="form-control border searchDropdown" name="consulta"> 
            <option value="empresa"> Empresa que cubre </option>
            <option value="inicio"> Ruta de inicio </option>
            <option value="fin"> Ruta de Fin </option>
            <option value="vias"> Ruta general </option>
 
        </select>
    </div>
    <div> 
        <label for="routeName">Buscar:</label>
        <input class="form-control border search" type="text" name="routeName"  id="routeName">
    </div>
    <div> 
       <button type="submit" class="btn btn-primary btn-custom">Buscar </button>
    </div>

      </form>


    <div class="containerRoutes"> 

     <?php foreach($resultado as $obj => $value){ ?>
         <a  href="./UserRoutes.php?id=<?php echo $value["id"] ?>"  class="routeItem"> 
            <img src="./assets/img/route.svg" alt="route">
            <p> <?php echo $value["nombre"] ?> </p>
        </a>
     <?php } ?>
    </div>

</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ruta</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom-modal">
             <div> 
                <p> Nombre de la ruta: </p> <span>  <?php echo $route["nombre"];  ?> </span>
             </div>
             <div> 
                <p> Precio de pasaje: </p> <span><?php echo $route["precio"];  ?> </span>
             </div>
             <div> 
                <p> Empresa que cubre: </p> <span><?php echo $route["empresa"];  ?> </span>
             </div>
             <div> 
                <p> Inicio de ruta: </p> <span> <?php echo $route["inicio"];  ?> </span>
             </div>
             <div> 
                <p> Rutas: </p> <span><?php echo $route["fin"];  ?></span>
             </div>
             <div> 
                <p> Fin de ruta: </p> <span><?php echo $route["vias"];  ?> </span>
             </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

     <script> 
 
 const params = new Proxy(new URLSearchParams(window.location.search), {
  get: (searchParams, prop) => searchParams.get(prop),
});

 
  if(params.id){
    const myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
    myModal.show();
  }

  </script>


</body>
</html>