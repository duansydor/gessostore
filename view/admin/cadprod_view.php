<?php
	include 'restrito.php';
	include_once './engine/connection.php';

?>
<br>
<br>
<br>
<br>
<br>
<style type="text/css">
	#form-prod{

	}
	.img-form{
		width:420px;

	}
	label input{
		
		display: none;

	}
	label{
		cursor: pointer;
		text-align: center;
	}
	.output{
		padding:50px;
		border-radius: 10px;
		background: lightgrey;
		background-image: url('./assets/img/outros/upload.png');
		background-repeat: no-repeat;
		background-position: center;
	}
	.output img{
		display: flex;
		border-radius: 10px;
		max-width:300px;
		max-height:300px;
	}
	textarea{
		border:none;
		resize: none;
		height: 100px;
		background: lightgrey;
		border-radius: 10px;
		padding: 10px;
		font-weight: bolder;
		font-size: .7em;
		font-family: arial;
	}
</style>
	<form class="form" id="form_prod" style="font-family:Arial ">
		
		<div class="img-form">	
			Escolha sua imagem
			<label>
				<div  class="output"  >
					<img id="output"  />
				</div>
				<input nome="imagem" id="img_prod" type="file" accept="image/*" onchange="loadFile(event)">
			</label>
			<span style="font-size: .6em;color: red; font-family: Arial;">obs: o nome da imagem não deve conter espaços</span>
		</div>
		<div  class="form-campo" style="font-family:Arial ">
			Nome do produto
			<input type="text" id="nome_prod">
		</div>
		<div style="font-family:Arial " class="form-campo">
			Preço
			<input type="number" id="preco_prod">
		</div>
		<div style="font-family:Arial " class="form-campo">
			Descrição produto
			<textarea type="text" id="descricao_prod"></textarea>
		</div>
		<div class="form-action" >
			<input style="font-family:Arial " class="form-send primary" type="button" value="Enviar" id="enviar">
			<input style="font-family:Arial " class="form-reset" type="reset" value="Apagar">
		</div>
		<div id="erro"></div>
	</form>
<script>
	// mostrar a preview da imagem
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
	// enviar dados
	$("#enviar").click(cadastrarProd);
	$(document).keypress(function(e){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			if(e.target.id != "descricao"){
				cadastrarProd();
			}else{
				return;
			}
		}
	});
	function cadastrarProd(){
		nome_prod = $("#nome_prod")[0].value;
		preco_prod = $("#preco_prod")[0].value;
		descricao_prod = $("#descricao_prod")[0].value;
		img_prod = $('#img_prod')[0].files[0];
		form = new FormData();
		form.append('img_prod', img_prod); 
		form.append("nome_prod", nome_prod);
		form.append("preco_prod", preco_prod);
		form.append("descricao_prod", descricao_prod);

		$.ajax
		(
			{
	            url: './controller/admin/cadprod_controller.php',
	            data: form,
	            processData: false,
	            contentType: false,
	            type: 'POST',
	            success: function(data) 
	            {
	                if(data == "deu"){
	                	$("#msg").html("<div class='alert'><h1>Produto cadastrado</h1></div>")
	                	setTimeout(function(){location.reload();},1000);
	              	}else{
	                	$("#erro").html(data);
	                }
	            }
            }
         );
	}
</script>