<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		elseif($enlaces == "index"){

			$module =  "views/modules/registro.php";
		
		}elseif ($enlaces =="ok") {
			$module =  "views/modules/usuarios.php";
		
		}elseif ($enlaces =="usuarios") {
			$module =  "views/modules/usuarios.php";
		
		}elseif ($enlaces =="fallo") {
			$module =  "views/modules/ingresar.php";
		
		}elseif ($enlaces =="editar") {
			
			$module =  "views/modules/editar.php";
		
		}

		else{

			$module =  "views/modules/registro.php";

		}
		
		return $module;

	}

}

?>