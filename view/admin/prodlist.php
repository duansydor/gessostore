<br>
<br>
<br>
<br>
<br>
<?php
	include 'restrito.php';
	include './engine/connection.php';
	$sql = "SELECT * FROM produtos";
	$exec = mysqli_query($con, $sql);
	if(@$_GET['msg']){
		$msg = $_GET['msg'];
		echo "<div id='msga'class='alert'><h1>$msg</h1></div>
		";
	}
?>
<br>
<center>
<table width="1200px" >
	<thead>
		<tr>
			<th style="display: none;">Cod</th>
			<th>Nome</th>
			<th>Preço</th>
			<th>Estoque</th>
			<th>Descrição</th>
			<th>Imagem</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php
		while ($result = mysqli_fetch_assoc($exec)) {	
			$cod = $result['cod_prod'];
			$nome = $result['nome_prod'];
			$preco = $result['preco_prod'];
			$estoque = $result['estoque'];
			$descricao = $result['descricao_prod'];
			$img = $result['img_prod'];
?>
		<tr>
			<td style="display:none;"id="<?php echo $cod ?>cod"><?php echo"$cod";?></td>
			<td id="<?php echo $cod ?>nome"><?php echo"$nome";?></td>
			<td id="<?php echo $cod ?>preco"><?php echo"$preco";?></td>
			<td id="<?php echo $cod ?>estoque"><?php echo "$estoque"; ?></td>
			<td id="<?php echo $cod ?>descricao"><?php echo"$descricao";?></td>
			<td id="<?php echo $cod ?>img"><?php echo"$img";?></td>
			<td>
				<a onclick="openEdit(<?php echo "$cod"; ?>)" class="action primary">Editar</a>
				<a href="./controller/admin/delete.php?table=prod&cod=<?php echo $cod; ?>&img=<?php echo $img?>" class="action secondary">Excluir</a>
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
		preco = $("#"+cod+"preco").html();
		estoque = $("#"+cod+"estoque").html();
		descricao = $("#"+cod+"descricao").html();
		edit = $(".edit");
		editWindow = "<form class='form' method='post' action='./controller/admin/update.php?table=prod'><input type='hidden' name='cod' value="+cod+">Nome<div class='form-campo'><input name='nome' type='text' id='editNome' value="+nome+"></div>Preco<div class='form-campo'><input name='preco' type='text' id='editPreco' value="+preco+"></div>Descricao<div class='form-campo'><input type='text' name='descricao' id='editDescricao' value="+descricao+"></div>Estoque<div class='form-campo'><input name='estoque' type='text' id='editEstoque' value="+estoque+"></div><div class='form-action'><input type='submit' class='action primary red' value='Salvar'><a class='action secondary' id='cancelar'>Cancelar</a></div></form>";
		edit.html("<div class='alert'>"+editWindow+"</div>")

		console.log(preco)
		cancelar = document.querySelector('#cancelar');
		cancelar.addEventListener('click',function(){
			edit.html('');
		})
	}
	setTimeout(function(){
		$('#msga').css('display','none');
	},1000)
	console.log($('#msga').html())
</script>