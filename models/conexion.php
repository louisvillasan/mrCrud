<?php
	class Conexion
	{
		
		function conectar(){
			$link = new PDO("mysql:host=localhost;dbname=sineditar", "root", "");
			return $link;
		}
	}
?>