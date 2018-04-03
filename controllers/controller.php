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

			$datos = array("usuario" =>$_POST["usuario"] ,
										"email" =>$_POST["email"],
										"password" =>$_POST["password"]);
			// var_dump($datos);
			$respuesta = Datos::registroUsuarioModel($datos, 'usuario');

			if ($respuesta=="success"){
				header("location:index.php?action=ok");
			}else{
				header("location:index.php");
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
				header("location:index.php?action=usuarios");

			}else{
				header("location:index.php?action=fallo");
			}

			// if ($respuesta=="success"){
			// 	header("location:index.php?action=ok");
			// }else{
			// 	header("location:index.php");
			// }
		}
	}

	public function listaUsuariosController(){
		$respuesta = Datos::listaUsuariosModel("usuario");
		foreach ($respuesta as $user => $item) {
		echo '<tr>
				<td>'.$item["user"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><button>Editar</button></td>
				<td><button>Borrar</button></td>
			</tr>';
		}
	}

}

?>