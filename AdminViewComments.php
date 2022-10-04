<?php


include 'claseconexion.php';




$objconexion=new conexion();
$resultados=$objconexion->consultar("SELECT * FROM `comments` ");

$comment;

$comment["nombre"] = "";
$comment["apellido"] = "";
$comment["correo"] = "";
$comment["empresa"] = "";
$comment["mensaje"] = "";



if($_GET){
  $comment_id = $_GET['id'];
  foreach($resultados as $obj => $value){
    if($value['id'] === $comment_id){
      $comment = $value;
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

<section class="containerFormRoutes"> 

   <div class="button-footer"> <a href="./MainAdmin.php" type="submit" >Volver </a> </div>

    <h1>COMENTARIOS</h1>

    <div class="containerRoutes"> 

    <?php foreach($resultados as $obj => $value){ ?>
         <a  href="./AdminViewComments.php?id=<?php echo $value["id"] ?>"  class="routeItem"> 
            <img src="./assets/img/chat.svg" alt="route">
            <p> Mensaje <?php echo $value["id"] ?> </p>
        </a>
<?php } ?>
    </div>

</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Comentario</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom-modal">
             <div> 
                <p> Nombre del usuario: </p> <span> <?php echo $comment["nombre"]; echo $comment["apellido"]; ?></span>
             </div>
             <div> 
                <p> Email: </p> <span> <?php echo $comment["correo"]; ?>  </span>
             </div>
             <div> 
                <p> Empresa: </p> <span><?php echo $comment["empresa"]; ?>  </span>
             </div>
            
             <div> 
                <p> Mensaje: </p> <span> <?php echo $comment["mensaje"]; ?> </span>
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