<?php
	@$msg = $_GET['msg'];
	if(isset($_SESSION['tipo_usu'])){
		header("location: index.php");
	}
?>
<br>
<br>
<br>
<br>
<br>
<form class="form">
	<?php
	if($msg == "not_connected"){
		echo "<span style='color:red''>Primeiro faça seu login</span>";
	}else if($msg == "cadastrado"){
		echo "<span style='color:blue'>Cadastrado com sucesso, agora ja pode logar</span>";
	}
	?>
	<div class="form-campo">
		Email
		<input type="text" placeholder="Email" id="email">
	</div>
	<div class="form-campo">
		Senha
		<input type="password" placeholder="Senha" id="senha">
	</div>
	<div class="form-action">
		<input class="form-send primary" type="button" value="Enviar" id="enviar">

		<input class="form-reset" type="reset" value="Apagar">
	</div>
	<div id="logado" align="center"></div>
</form>
<script type="text/javascript">
	$("#enviar").click(logar);
	$(document).keypress(function(e){
		 var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			logar();
		}
	});
	function logar(){
		email = $("#email")[0].value;
		senha = $("#senha")[0].value;
		logSuccess = "<div class='alert'> <h1>Logado com sucesso</h1> </div>";
		logErro = "<div class='alert'> <h1>Usuário ou senha inválidos</h1> </div>"
		$.post(
			"./controller/login_controller.php",
			{
				email:email,
				senha:senha
			},
			function(data, status){
				console.log(data)
				if(data == "logado"){
					$("#logado").html(logSuccess);
					setTimeout(function(){
						window.location.href = "index.php";
					},1000);
				}else{
					$("#logado").html(logErro);
					setTimeout(function(){
						$("#logado").html("");
					},1500);
				}
			}
		)
	}
</script>
