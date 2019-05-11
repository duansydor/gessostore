<?php
include '../../engine/connection.php';

$nome_prod = $_POST['nome_prod'];
$preco_prod = $_POST['preco_prod'];
$descricao_prod = $_POST['descricao_prod'];
$img_prod = $_FILES['img_prod'];
$tmp_name = $_FILES['img_prod']['tmp_name'];
// pegar a extensao
$explode = explode('.', $_FILES['img_prod']['name']);
$ext = end($explode);

$file_name = preg_replace('/\s+/', '', $nome_prod).".".$ext;
if(!isset($img_prod)){
	die("erro");
}

$sql = "INSERT INTO produtos(nome_prod, preco_prod, estoque, descricao_prod,img_prod) values('$nome_prod', $preco_prod, 1,'$descricao_prod','$file_name')";
move_uploaded_file($tmp_name, "../../assets/img/produtos/".$file_name);
$error = $_FILES['img_prod']['error'];
$exec = mysqli_query($con, $sql);
if($exec){
	die('deu');
}else{
	die("erro".mysqli_error($con));
	
}



?>