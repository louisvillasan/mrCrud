

<h1>REGISTRO DE USUARIO</h1>

<form method="post" onsubmit="return validarRegistro()">
	<label for="usuario">Usuario</label>	
	<input type="text" placeholder="Menos de 6 caracteres" name="usuario" id="usuario" required>

	<label for="password">Contrase;a</label>	
	<input type="password" placeholder="Contraseña" name="password" id="password" required>

	<label for="email">Email</label>	
	<input type="email" placeholder="Email" name="email" id="email" required>

	<input type="submit" value="Enviar">

</form>

<?php

$registro = new MvcController();
$registro -> registroUsuarioController();
	 	
if(isset($_GET["action"])){
	if($_GET["action"]=="ok"){
		echo "registro exitoso";
	}
}

?>