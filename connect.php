<?php
	
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "ganhadores_db";

	if ( $connect = mysqli_connect($server, $user, $pass, $db)) {
		//echo "Conectado!";
	} else
		echo "Erro: ".mysqli_connect_error();


	/*function mensagem($texto, $tipo) {
		echo "<div class='alert alert-$tipo' role='alert'>
				$texto
			</div>";
	}*/

?>