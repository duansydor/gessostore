<br>
<br>
<br>
<br>
<br>
<form class="form" id="form_prod">
		<div class="form-campo">
			Nome do usuario
			<input type="text" id="nome_usu">
		</div>
		<div class="form-campo">
			Cpf
			<input type="text" id="cpf_usu">
		</div>
		<div class="form-campo">
			Email
			<input type="text" id="email_usu">
		</div>
		<div class="form-campo">
			Senha
			<input type="text" id="senha_usu">
		</div>
		<div class="form-campo">
			Tipo
			<input type="number" id="tipo_usu" min="1" max="2">
		</div>
		<div class="form-action">
			<input class="form-reset" type="reset" value="Apagar">
			<input class="form-send" type="button" value="Enviar" id="enviar">
		</div>
		<div id="erro"></div>
		<div id="msg"></div>
	</form>
<script>
	// mostrar a preview da imagem
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
	// enviar dados
	$("#enviar").click(cadastrarUsu);
	$(document).keypress(function(e){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			if(e.target.id != "descricao"){
				cadastrarUsu();
			}else{
				return;
			}
		}
	});
	function cadastrarUsu(){
		nome_usu = $("#nome_usu").val();
		cpf_usu = $("#cpf_usu").val();
		email_usu = $("#email_usu").val();
		tipo_usu = $('#tipo_usu').val();
		senha_usu = $('#senha_usu').val();
		form = new FormData();
		form.append('nome_usu', nome_usu); 
		form.append("cpf_usu", cpf_usu);
		form.append("email_usu", email_usu);
		form.append("tipo_usu", tipo_usu);
		form.append("senha_usu", senha_usu);

		$.ajax
		(
			{
	            url: './controller/admin/cadusu_controller.php',
	            data: form,
	            processData: false,
	            contentType: false,
	            type: 'POST',
	            success: function(data) 
	            {
	                if(data == "deu"){
	                	$("#msg").html("<div class='alert'><h1>Usuario cadastrado</h1></div>")
	                	setTimeout(function(){location.reload();},1000);
	              	}else{
	              		console.log(data)
	                	$("#erro").html(data);
	                }
	            }
            }
         );
	}
</script>