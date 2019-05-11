<?php
	include '../../engine/connection.php';
	if($_GET['table'] == 'prod'){
		$cod = $_POST['cod'];
		$nome = $_POST['nome'];
		$preco = $_POST['preco'];
		$estoque = $_POST['estoque'];
		$descricao = $_POST['descricao'];

		$sql = "UPDATE produtos SET nome_prod='$nome', preco_prod = $preco ,estoque = $estoque, descricao_prod = '$descricao'  WHERE cod_prod = $cod";
		$exec = mysqli_query($con,$sql);

		header("Location:../../index.php?page=admin/prodlist.php&msg=Atualizado");
	}else if($_GET['table'] == 'user'){
		$cod = $_POST['cod'];
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$tipo = $_POST['tipo'];

		$sql = "UPDATE usuarios SET nome_usu='$nome', cpf_usu = '$cpf' ,  email_usu= '$email', tipo_usu = $tipo, senha_usu = '$senha'  WHERE cod_usu = $cod";
		$exec = mysqli_query($con,$sql);

		header("Location:../../index.php?page=admin/rel_usu.php&msg=Atualizado");
	}
	

?>