<?php

require_once "conexion.php";
class Datos extends Conexion
{
	public function registroUsuarioModel($datos, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(user, email, password) VALUES (:user, :email, :password)");

		$stmt->bindParam(":user", $datos["usuario"],PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"],PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"],PDO::PARAM_STR);

		if ($stmt->execute()){
			return "success";
		}else{
			return "Error, la haz cagado";
		}

		$stmt->close();

	}

	// Modelo para validar el usuario

	public function ingresoUsuarioModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE user = :user AND password = :password");
		$stmt->bindParam(":user", $datos["usuario"],PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"],PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function traerUsuarioModel($dato, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ID = :id");
		$stmt->bindParam(":id", $dato,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}	

	// Modelo para ver a los usuarios
	public function listaUsuariosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();

	}

	public function EditarUsuarioModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET user = :user, email= :email, password = :password WHERE ID = :id");

		$stmt->bindParam(":user", $datos["usuario"],PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"],PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"],PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["ID"],PDO::PARAM_INT);

		if ($stmt->execute()){
			return "success";
		}else{
			return "Error";
		}

	}
}

?>