<?php 
	include 'engine/session_verification.php';
	include 'header.php';
	
?>
<div class="principal">
<?php
	@$tipo_usu = $_SESSION['tipo_usu'];

	@$page = $_GET['page'];
	if(isset($page)){
		include "view/$page";
	}else 
		if(isset($tipo_usu) and $tipo_usu == 1){
			include "./view/admin/index.php";
		}else{
		include 'allprod.php';
	}
?>
</div>
<?php

	include 'footer.php';
?>