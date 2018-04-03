<?php
	session_start();
	if(!$_SESSION["validar"])
		header("location:index.php?action=ingresar");

	$ingreso = new MvcController();
	$datos = $ingreso->traerUsuarioController();




echo '<h1>EDITAR USUARIO</h1>

<form method="post">
	
	<input type="text" placeholder="'.$datos["user"].'" name="usuarioEditar" required>

	<input type="password" placeholder="'.$datos["password"].'" name="passwordEditar" required>

	<input type="email" placeholder="'.$datos["email"].'" name="emailEditar" required>

	<input type="submit" value="Enviar">

</form>';
	
	$ingreso->EditarUsuarioController();

?>
