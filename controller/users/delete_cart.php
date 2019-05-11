<?php
	session_start();
	include '../../engine/connection.php';
	$cod_prod = $_GET['prod'];
	$quant_prod = $_GET['quant'];
	$usu = $_SESSION['cod_usu'];

	$sql = "DELETE FROM carrinho WHERE cod_prod = $cod_prod AND quant_prod = $quant_prod AND cod_usu = $usu LIMIT 1";
	$exec = mysqli_query($con,$sql);
	mysqli_error($con);
	header("Location: ../../index.php?page=users/cart.php&msg=Excluido");
?>