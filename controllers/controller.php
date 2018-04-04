<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}


	// REgristro de usuario
	// -------------------------

	public function registroUsuarioController(){

		if(isset($_POST["usuario"])){

			if (preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/', $_POST["password"]) &&
			 preg_match('/^[a-zA-Z0-9]{6,}/', $_POST["usuario"])
			){
				// $password = $_POST["password"];

				$datos = array("usuario" =>$_POST["usuario"] ,
										"email" =>$_POST["email"],
										"password" => $_POST["password"]);
				// echo $password;

				$respuesta = Datos::registroUsuarioModel($datos, 'usuario');

				if ($respuesta=="success"){
					session_start();
					$_SESSION["validar"] = true;
					
					header("location:index.php?action=ok");
				}else{
					header("location:index.php");
				}
			}
		}
	}

	// Ingreso usuario
	public function ingresoUsuarioController(){
		if(isset($_POST["usuarioIn"])){

			$datos = array("usuario" =>$_POST["usuarioIn"],
										"password" =>$_POST["passwordIn"]);
			// var_dump($datos);
			$respuesta = Datos::ingresoUsuarioModel($datos, 'usuario');

			if($respuesta["user"] == $_POST["usuarioIn"] && $respuesta["password"] == $_POST["passwordIn"]){
// Inicializar sesion
				session_start();
				$_SESSION["validar"] = true;
				header("location:index.php?action=usuarios");

			}else{
				header("location:index.php?action=fallo");
			}
		}
	}

	// Mostrar usuarios

	public function listaUsuariosController(){
		$respuesta = Datos::listaUsuariosModel("usuario");
		foreach ($respuesta as $user => $item) {
		echo '<tr>
				<td>'.$item["user"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar&id='.$item["ID"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["ID"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}

	// Traer Datos del usuario
	public function traerUsuarioController(){
		$respuesta = Datos::traerUsuarioModel($_GET['id'], "usuario");
		return $respuesta;
	}

	// Editar usuario
	public function EditarUsuarioController(){
		
		if(isset($_POST["usuarioEditar"])){

			$datos = array("usuario" =>$_POST["usuarioEditar"] ,
										"email" =>$_POST["emailEditar"],
										"password" =>$_POST["passwordEditar"],"ID" => $_GET['id']);

			$respuesta = Datos::EditarUsuarioModel($datos, 'usuario');

			if ($respuesta=="success"){
				header("location:index.php?action=usuarios");
			}else{
				echo ("A sucedido un error");
			}
		}
	}

	// BORRAR
	public function BorrarUsuarioController(){
		
		if(isset($_GET["idBorrar"])){

			$dato = $_GET['idBorrar'];

			$respuesta = Datos::borrarUsuarioModel($dato, 'usuario');

			if ($respuesta=="success"){
				header("location:index.php?action=usuarios");
			}else{
				echo ("A sucedido un error");
			}
		}
	}

}

?>