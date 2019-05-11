<?php
	include '../engine/connection.php';
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$cpf = $_POST['cpf'];
	$senha = $_POST['senha'];
	if($nome==null or $email==null or $cpf==null or $senha==null){
		die("campos invalidos");
	}
	$sql = "INSERT INTO `usuarios`(`nome_usu`, `cpf_usu`, `email_usu`, `tipo_usu`, `senha_usu`) VALUES ('$nome','$cpf','$email',2,'$senha')";
	$exec = mysqli_query($con,$sql);
	if($exec){
		echo "cadastrado";
	}else{
		echo "erro";
	}



	mysqli_close($con);

?>