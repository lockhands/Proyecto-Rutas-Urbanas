<?php



class conexion{
	private $servidor="localhost";
	private $usuario="root";
	private $contrasenia="";
	private $db="album3";
	private $conexion; /* va a tener toda la informacion de la base de datos*/
	
	public function __construct(){
			
		try{
			//PDO nos permite crear nuestra base de datos
			$this->conexion=new mysqli($this->servidor,$this->usuario,$this->contrasenia,$this->db);

			$sql = "CREATE DATABASE IF NOT EXISTS album3";
            if($this->conexion->query($sql) === true){
            
               }
              else {
	     
             }
		
			/* $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); */

			
		
		}			
		catch(PDOException $e){
			return "falla de conexión".$e;
		}
	}
	
	/*Esta sentencia es la que me permite ejecutar una instruccion*/
	public function ejecutar($sql){
		 /*Ejecuta este sql que lo que me va a retornar son datos*/
		$this->conexion->query($sql);
		/*Instruccion que ejecuta una inserción*/
		/* return $this->conexion->lastInsertId(); */
	
	}
	
	public function consultar($sql){
		/* $sentencia=$this->conexion->prepare($sql); //Toma la instruccion y la toma en una variable que ya tiene la información de retorno
		$sentencia->execute();
		
		return $sentencia->fetchAll(); //fetchAll retorna todos los registros que tu puedas consutlar con la sentencia sql */

		return $this->conexion->query($sql);
	}
}



 

 
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

$objconexion=new conexion();
$resultado=$objconexion->consultar("SELECT * FROM `proyectos1` ");



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
    <h1>REGISTRAR</h1>
    <form action="1.php" method="post">

    <label for="contrasenia">Nombres:</label>
    <input class="form-control border" type="text" name="contrasenia"  id="contrasenia">

    <label for="contrasenia">Apellidos:</label>
    <input class="form-control border" type="text" name="contrasenia"  id="contrasenia">

    <label for="contrasenia">Correo electronico:</label>
    <input class="form-control border" type="text" name="contrasenia"  id="contrasenia">

    <label for="contrasenia">Contrasenia:</label>
    <input class="form-control border" type="text" name="contrasenia"  id="contrasenia">

    <label for="contrasenia">Numero de telefono:</label>
    <input class="form-control border" type="text" name="contrasenia"  id="contrasenia">

    <button type="submit" class="btn btn-dark btn-custom">Registrar </button>
 
     </form>

</section>

</body>
</html>