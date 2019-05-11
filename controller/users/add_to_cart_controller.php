<?php
 	session_start();
 	include '../../engine/connection.php';
	@$cod_usu = $_SESSION['cod_usu'];
	@$cod_prod = $_POST['id_prod'];
	@$quant_prod = $_POST['quant_prod'];
	@$total = $_POST['total'];
 	
 	$sql = "INSERT INTO carrinho(cod_prod, cod_usu, quant_prod, total_prod) values($cod_prod, $cod_usu,  $quant_prod, $total )";
 	$exec = mysqli_query($con, $sql);

	if($exec){
		echo "deu";
	}else{
		echo "erro".mysqli_error($con);
	}
	mysqli_close($con)
?>