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

            if($this->conexion->query($sql) === true){ // echo "creo la base de datos"; 
			 }
            else { // echo "no creo la base de datos"; 
			     }

			 $sql1 = "CREATE TABLE IF NOT EXISTS rutas(
				id INT AUTO_INCREMENT PRIMARY KEY,
				nombre VARCHAR(500) NOT NULL,
				precio FLOAT NOT NULL,
				empresa VARCHAR(500) NOT NULL,
				inicio VARCHAR(500) NOT NULL,
				fin VARCHAR(500) NOT NULL,
				vias VARCHAR(500) NOT NULL
		   )";
		   
			 $sql2 = "CREATE TABLE IF NOT EXISTS comments(
				id INT AUTO_INCREMENT PRIMARY KEY,
				nombre VARCHAR(500) NOT NULL,
				apellido  VARCHAR(500) NULL,
				correo VARCHAR(500) NOT NULL,
				empresa VARCHAR(500) NOT NULL,
				mensaje VARCHAR(500) NOT NULL
		   )";
		   
		   $sql3 = "CREATE TABLE IF NOT EXISTS usuarios(
				id INT AUTO_INCREMENT PRIMARY KEY,
				cedula VARCHAR(500) NOT NULL,
				clave  VARCHAR(500) NULL,
				autorizado INT NOT NULL
		   )";
		   
		   $this->conexion=null;

		   $this->conexion=new mysqli($this->servidor,$this->usuario,$this->contrasenia,$this->db);
 
		   $this->conexion->query($sql1);
		   $this->conexion->query($sql2);
		   $this->conexion->query($sql3);

		
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
