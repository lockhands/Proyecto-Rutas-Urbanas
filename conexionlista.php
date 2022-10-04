<?php

class conexion{
	private $servidor="localhost";
	private $usuario="root";
	private $contrasenia="";
	private $db="administracion";
	private $tabla="rutas";
	private $conexion; /* va a tener toda la informacion de la base de datos*/
	
	public function __construct(){
			
		try{
			//PDO nos permite crear nuestra base de datos
			$this->conexion=new mysqli($this->servidor,$this->usuario,$this->contrasenia);

			$sql = "CREATE DATABASE IF NOT EXISTS $this->db";

            if($this->conexion->query($sql) === true){  echo "creo la base de datos";  }
            else {  echo "no creo la base de datos";      }

			 $sql1 = "CREATE TABLE IF NOT EXISTS rutas(
				id INT AUTO_INCREMENT PRIMARY KEY,
				precio FLOAT NOT NULL,
				empresa VARCHAR(500) NOT NULL,
				inicio VARCHAR(500) NOT NULL,
				fin VARCHAR(500) NOT NULL,
				vias VARCHAR(500) NOT NULL
		   )";
		   
		   $this->conexion=null;

		   $this->conexion=new mysqli($this->servidor,$this->usuario,$this->contrasenia,$this->db);
 
		   
		   if($this->conexion->query($sql1) === true){
		   
			   echo "creo la base de datos";
		   }
		   else {
			   echo "no creo la base de datos";
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
		$this->conexion=null;

		$this->conexion=new mysqli($this->servidor,$this->usuario,$this->contrasenia,$this->db);

		return $this->conexion->query($sql);
	}
}



?>
