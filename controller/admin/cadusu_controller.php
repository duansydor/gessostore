<?php
include '../../engine/connection.php';

$nome_usu = $_POST['nome_usu'];
$cpf_usu = $_POST['cpf_usu'];
$email_usu = $_POST['email_usu'];
$tipo_usu = $_POST['tipo_usu'];

$senha_usu = $_POST['senha_usu'];

$sql = "INSERT INTO usuarios(nome_usu, cpf_usu, email_usu,tipo_usu, senha_usu) values('$nome_usu', '$cpf_usu', '$email_usu',$tipo_usu, '$senha_usu')";
$contaValida = "SELECT * FROM usuarios where cpf_usu = '$cpf_usu'";
$validar = mysqli_query($con, $contaValida);
if(mysqli_affected_rows($con)>0){
	die("usuario ja cadastrado");
}
$exec = mysqli_query($con, $sql);
if(!$exec){
	echo "erro"+mysqli_error($con);
}else{
	echo "deu";
}



?>