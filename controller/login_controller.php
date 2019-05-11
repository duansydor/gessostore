<?php
	session_start();
	include '../engine/connection.php';
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$sql = "SELECT * FROM usuarios WHERE email_usu = '$email' and senha_usu = '$senha'";
	$query = mysqli_query($con, $sql);
	if($query){
		$info = mysqli_fetch_assoc($query);
		$cod = $info['cod_usu'];
		$nome = $info['nome_usu'];
		$cpf = $info['cpf_usu'];
		$email = $info['email_usu'];
		$tipo = $info['tipo_usu'];
		$senha = $info['senha_usu'];
		if($nome != null or $cpf != null or $tipo != null){
			$_SESSION['cod_usu'] = $cod;
			$_SESSION['nome_usu'] = $nome;
			$_SESSION['cpf_usu'] = $cpf;
			$_SESSION['tipo_usu'] = $tipo;
			$_SESSION['email_usu'] = $email;
			$_SESSION['senha_usu'] = $senha;

			echo "logado";
		}
	}else{
		echo "nao logado";
		session_destroy();
	}
?>