<?php
	include_once 'engine/session_verification.php';
	include_once 'engine/connection.php';
	include_once 'engine/addadmin.php';
	
	include 'engine/constantes.php';
	if(isset($_SESSION['nome_usu'])){
		$codusu = $_SESSION['cod_usu'];
		$count = "SELECT * FROM carrinho where cod_usu = $codusu";
		$exec = mysqli_query($con,$count);
		$numRows = mysqli_num_rows($exec);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/js/jquery.mask.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.css">
	<link rel="shortcut icon" href="favicon.ico">
</head>

<body>
	<header>
		<div class="logo">
			<a href="index.php">
			<img width="150px" height="100px" src="./assets/img/outros/logo.png">
			</a>
		</div>
		<div class="navigation">
			<?php 
			if (isset($tipo_usu)) {
				if($tipo_usu == 1){
			?>
			<a href="?page=admin/index.php">Pagina admin</a>
			<a onclick="logout()">Logout</a>

			<?php
			}else{
				?>
				<a href="./index.php#about">Sobre</a>
				<a href='?page=users/perfil.php'>Perfil <i class="fa fa-user-circle" aria-hidden="true"></i></a>
				<a href='?page=users/cart.php'>
					Carrinho 
					 <i class="fa fa-shopping-cart" aria-hidden="true"></i>
					 <span class="cart-counter"><?php echo "+$numRows"; ?></span>
				</a>
			    <a onclick="logout()">Logout</a>
			<?php
			}

			}else{
			?>
				<a href="./index.php#about">Sobre</a>
				<a href="?page=signin_view.php"> Cadastre-se <i class="fa fa-user-plus" aria-hidden="true"></i> </a>
				<a href="?page=login_view.php"> Login </a>
			<?php
			}
			mysqli_close($con);
			?>
		</div>
	</header>
		

		<div id="msg" >
			
		</div>
	<script type="text/javascript">
		function logout(){
			logout = "<div class='alert'> <h1>Você foi desconectado com sucesso</h1> </div>"
			$.ajax({
				url:"./controller/logout.php",
				success:function(data){
					$("#msg").html(logout);
					setTimeout(function () {
						window.location = "index.php";
					},500);
				}
			});
		}
	</script>
	<div class="principal">

