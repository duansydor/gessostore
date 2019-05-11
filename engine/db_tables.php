<?php
	$tb_usuarios = "CREATE TABLE usuarios(cod_usu INT PRIMARY KEY AUTO_INCREMENT, nome_usu VARCHAR(30), cpf_usu VARCHAR(14), email_usu VARCHAR(50), tipo_usu INT(1), senha_usu VARCHAR(10))";
	$tb_produtos = "CREATE TABLE produtos(cod_prod int PRIMARY KEY AUTO_INCREMENT, nome_prod VARCHAR(50), preco_prod FLOAT(30), estoque INT,descricao_prod VARCHAR(50), img_prod VARCHAR(50))";
	$tb_carrinho = "CREATE TABLE carrinho(cod_prod INT, cod_usu INT, quant_prod INT, total_prod FLOAT(50))";

	mysqli_query($con, $tb_usuarios);
	mysqli_query($con, $tb_produtos);
	mysqli_query($con, $tb_carrinho);

	
?>