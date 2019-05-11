<?php
include 'connection.php';
$cpf_admin = "123.456.789-10";
mysqli_query($con, "SELECT * FROM usuarios where cpf_usu = '$cpf_admin' ");
if(mysqli_affected_rows($con)>0){
	
}else{
	$insertadmin = "INSERT INTO `usuarios`(`nome_usu`, `cpf_usu`, `email_usu`, `tipo_usu`, `senha_usu`) VALUES ('admin','$cpf_admin','admin@gmail.com',1,'admin');";
 	mysqli_query($con,$insertadmin);
}

?>
