<br>
<br>
<br>
<br>
<br>
<?php
	include 'restrito.php';
	include './engine/connection.php';
	
	$sql = "SELECT * FROM usuarios";
	$exec = mysqli_query($con, $sql);
	if(@$_GET['msg']){
		$msg = $_GET['msg'];
		echo "<div id='msga' class='alert'><h1>$msg</h1></div>
		";
	}
?>
<br>
<center>
<table width="1200px">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Cpf</th>
			<th>Email</th>
			<th>Senha</th>
			<th>tipo</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php

	while ($result = mysqli_fetch_assoc($exec)) {	
		$cod = $result['cod_usu'];
		$nome = $result['nome_usu'];
		$cpf = $result['cpf_usu'];
		$email = $result['email_usu'];
		$senha = $result['senha_usu'];
		$tipo = $result['tipo_usu'];
?>
	<tr>
		<td style="display:none;"id="<?php echo $cod ?>cod"><?php echo"$cod";?></td>
		<td id="<?php echo $cod ?>nome"><?php echo"$nome";?></td>
		<td id="<?php echo $cod ?>cpf"><?php echo"$cpf";?></td>

		<td id="<?php echo $cod ?>email"><?php echo"$email";?></td>
		<td id="<?php echo $cod ?>senha"><?php echo"$senha";?></td>
		<td id="<?php echo $cod ?>tipo"><?php echo"$tipo";?></td>
		<td class="action">
			<a onclick="openEdit(<?php echo $cod; ?>)" class="action primary">Editar</a>
			<a href="./controller/admin/delete.php?table=user&cod=<?php echo $cod; ?>"" class="action secondary">Excluir</a>
		</td>
	</tr>
<?php 
} 
?>
</tbody>
</table>
</center>
<div class="edit">
</div>
<script type="text/javascript">

	
	function openEdit(cod){
		cod = $("#"+cod+"cod").html();
		nome = $("#"+cod+"nome").html();
		cpf = $("#"+cod+"cpf").html();
		email = $("#"+cod+"email").html();
		senha = $("#"+cod+"senha").html();
		tipo = $("#"+cod+"tipo").html();
		edit = $(".edit");
		editWindow = "<form class='form' method='post' action='./controller/admin/update.php?table=user'><input type='hidden' name='cod' value="+cod+">Nome<div class='form-campo'><input name='nome' type='text' id='editNome' value="+nome+"></div>Preco<div class='form-campo'><input name='cpf' type='text' id='editCpf' value="+cpf+"></div>Descricao<div class='form-campo'><input type='text' name='email' id='editEmail' value="+email+"></div>Estoque<div class='form-campo'><input name='senha' type='text' id='editSenha' value="+senha+"></div>Tipo<div class='form-campo'><input name='tipo' type='text' id='editTipo' value="+tipo+"></div><div class='form-action'><input type='submit' class='action primary red' value='Salvar'><a class='action secondary' id='cancelar'>Cancelar</a></div></form>";
		edit.html("<div class='alert'>"+editWindow+"</div>")


		cancelar = document.querySelector('#cancelar');
		console.log(cancelar)
		cancelar.addEventListener('click',function(){
			edit.html('');
		})
	}
	setTimeout(function(){
		$('#msga').css('display','none');
	},1000)
</script>