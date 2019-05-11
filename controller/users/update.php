<?php
	session_start();
	include '../../engine/connection.php';
	$cod = $_SESSION['cod_usu'];
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$sql="UPDATE usuarios set nome_usu = '$nome', cpf_usu = '$cpf', email_usu = '$email'  where cod_usu = $cod";
	$exec = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con)>0){
			$_SESSION['nome_usu'] = $nome;
			$_SESSION['cpf_usu'] = $cpf;
			$_SESSION['email_usu'] = $email;
			header("Location:../../index.php?page=users/perfil.php&msg=Atualizado");
	}else{
		echo "Erro: ".mysqli_error($con);
	}

?>