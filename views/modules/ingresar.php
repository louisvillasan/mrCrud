<h1>INGRESAR</h1>

	<form method="post">
		
		<input type="text" placeholder="Usuario" name="usuarioIn" required>

		<input type="password" placeholder="Contraseña" name="passwordIn" required>

		<input type="submit" value="Enviar">

	</form>

<?php
	$ingreso = new MvcController();
	$ingreso->ingresoUsuarioController();

	if(isset($_GET["action"])){
	if($_GET["action"]=="fallo"){
		echo "Usuario y contrasena no encontrado";
	}
}
?>