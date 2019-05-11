<?php
	$host = "localhost";
	$server_user = "root";
	$server_pass = "";
	$db_name = "duan";

	$con = mysqli_connect($host, $server_user, $server_pass,$db_name);
	if($con){
		echo "";
	}else{
		echo "nao deu";
	}
	include 'db_tables.php';
?>