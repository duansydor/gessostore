<br>
<br>
<br>
<br>
<br>
<form class="form">
	<div class="form-campo">
		Nome
		<input type="text" placeholder="Fulano" id="nome">
	</div>
	<div class="form-campo">
		Email
		<input type="text" placeholder="ex: usuario@usuario.com" id="email">
	</div>
	<div class="form-campo">
		CPF 
		<input type="text" placeholder="cpf" id="cpf_usu" >
	</div>
	<div class="form-campo">
		Senha
		<input type="password" placeholder="senha" id="senha">
	</div>
	<div class="form-campo">
		Repita sua senha
		<input onchange="checkPassword()" type="password" placeholder="senha" id="repeat_senha"
		>
	</div>
	<div class="form-action">
		<input class="form-send primary" type="button" value="Cadastrar-se" id="enviar">
	</div>
</form>
<div id="msg"></div>
<script type="text/javascript">

	$("#enviar").click(enviarDados);
	$(document).keypress(function(e){
		 var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			enviarDados();
		}
	});
	$("#repeat_senha").on("keyup",checkPassword);
	function checkPassword(){
		senha = $("#senha");
		rsenha = $("#repeat_senha");
		if(rsenha.val() == senha.val()){
			rsenha.css("border","0.5px solid blue")
		}else{
			rsenha.css("border","0.5px solid red")
		}
	}
	function enviarDados(){
		if($("#senha").val() == $("#repeat_senha").val()){
			nome = $("#nome").val();
			email = $("#email").val();
			senha = $("#senha").val();
			cpf = $("#cpf_usu").val();


			$.post(
				"./controller/signin_controller.php",
				{
					nome:nome,
					email:email,
					senha:senha,
					cpf:cpf,

				},
				function(data, status){
					if (data == "cadastrado") {
						window.location = "index.php?page=login_view.php&msg=cadastrado";
					}else{
						$("#msg").html("<div class='alert'><h1>"+data+"</h1></div>");
						setTimeout(function () {
							$("#msg").html("");
						},900);
						
					}

				}
			)
		}else{
			alert("senha invalida");
		}
		
	}
</script>
