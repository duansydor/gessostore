<?php
	include'../../engine/connection.php';
	$cod = $_GET['cod'];
	$table = $_GET['table'];
	$connection = $con;
	if(isset($table) && isset($cod)){
		switch ($table) {
			case 'user':
				$sql = "SELECT * FROM usuarios where usuarios.cod_usu = $cod";
				mysqli_query($connection,$sql);
				
			break;
			case 'prod':
				$sql = "SELECT * FROM produtos  where cod_prod = $cod";
				$exec = mysqli_query($connection,$sql);
				while ($r = mysqli_fetch_assoc($exec)) {
					$nome = $r['nome_prod'];
					echo "$nome";
				}
			break;
				
			default:
				echo "erro";	
			break;
		}
	}
?>
