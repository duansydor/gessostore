<?php
	session_start();
	@$nome_usu = $_SESSION['nome_usu'];
	@$email_usu = $_SESSION['email_usu'];
	@$tipo_usu = $_SESSION['tipo_usu'];
	if($nome_usu == null and $email_usu == null and $tipo_usu == null){
		session_destroy();
	}
?>