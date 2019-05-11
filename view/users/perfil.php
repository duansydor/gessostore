<?php
	$nome = $_SESSION['nome_usu'];
	$cpf = $_SESSION['cpf_usu'];
	$email = $_SESSION['email_usu'];
	$senha = $_SESSION['senha_usu'];
	if(@$_GET['msg']){
		$msg = $_GET['msg'];
		echo "<div id='msga' class='alert'><h1>$msg</h1></div>
		";
	}
?>
<br>
<br>
<br>
<br>
<div class="container" style="background-image: url('./assets/img/outros/allprodback.jpg');
	background-repeat: repeat-y;" >
	<div style="display:flex; justify-content: center;">
		<div  style="align-self: center; border:2px solid;border-radius: 50%;padding: 10px;margin-right:40px;width: 200px;height: 200px;display: flex;align-items: center;justify-content: center;">
			<img width="150px" height="150px" src="./assets/img/outros/mypic.png">
		</div>
		<div style="display: flex; flex-direction: column;align-items: flex-start;">
			<h1>Nome</h1>
			<span><?php echo "$nome"; ?></span>
			<h1>CPF</h1>
			<span><?php echo "$cpf"; ?></span>
			<h1>Email</h1>
			<span><?php echo "$email"; ?></span>

			<h1>Senha</h1>
			<div>
				<input style="cursor:pointer;" type="checkbox" onchange="verSenha()" id="mostrar">
				<label style="cursor:pointer;" for="mostrar">Ver senha: </label>
			</div>
			<span style="opacity: 0; transition:.3s; font-size: 1.2em; font-weight: bold;"  id="senha"><?php echo "$senha"; ?></span>
			

			<br>
		</div>
	</div>
</div>
<div class="edit">
</div>
<br>

<center>
	<div style="margin-top: 30px;">
	<a onclick="openEdit()" class="action primary">
		Editar Informações
	</a>
	</div>
</center>
<br>
<br>
<br>
<script type="text/javascript">
	edit = $('.edit');
	function openEdit(){
		alert = "<form action='./controller/users/update.php' method='post' class='form'><div class='form-campo'><input name='nome' value=<?php echo "$nome" ?>></div><div class='form-campo'><input name='cpf' value=<?php echo "$cpf" ?>></div><div class='form-campo'><input name='email' value=<?php echo "$email" ?>></div><div class='form-campo'><input name='senha' value=<?php echo "$senha" ?>></div><div class='form-action'><input type='submit' class='primary' value='Salvar'><a class='action secondary' id='cancelar'>Cancelar</a></div></form>";
		edit.html("<div class='alert'>"+alert+"</div>");
		cancelar = document.querySelector('#cancelar');
		cancelar.addEventListener('click',function(){
			edit.html('');
		})
	}
	mostrar = false;
	function verSenha(){
		mostrar = !mostrar;
		$("#senha").css("opacity",mostrar?"1":"0");
	}



	setTimeout(function(){
		$('#msga').css('display','none');
	},1000)

</script>