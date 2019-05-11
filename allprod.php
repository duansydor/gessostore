<?php 
	include 'engine/connection.php';

	// variáveis de paginação
	$total_reg = "6";
	@$pagina = $_GET['pagina'];
	if(!$pagina){
		$pc = "1";
	}else{
		$pc = $pagina;
	}
	$inicio = $pc - 1;
	$inicio = $inicio * $total_reg;

?>
<div class="background">
	<div class="title">
		<h1>
			Seja bem-vindo(a)<br> <?php echo @$_SESSION['nome_usu']; ?>
		</h1>
	</div>		
</div>

<div class="prod-container">
<span class="produtos-title">Todos os produtos</span>
<?php
	$sql = "SELECT * FROM produtos";
	$todos = mysqli_query($con, $sql);
	$limite = mysqli_query($con, "$sql LIMIT $inicio, $total_reg");
	$tr = mysqli_num_rows($todos);
	$tp = $tr/$total_reg;


	while ($result = mysqli_fetch_assoc($limite)) {	
		$id = $result['cod_prod'];
		$nome = $result['nome_prod'];
		$preco = $result['preco_prod'];
		$descricao = $result['descricao_prod'];
		$img = $result['img_prod'];
?>
	<div class="card" id=<?php echo "card$id"; ?>>
		<input type="hidden" style="display: none;" value=<?php ?>>
		<img src=<?php echo constant("PRODUTOS")."$img" ?>>
		<h3 class="card-name"><?php echo$nome;?></h3>
		<div class="card-price">
			<span>
				R$ <?php echo "$preco"; ?>	
			</span>
		</div>
		<div class="card-action">
			<a href="?page=users/add_to_cart.php&id=<?php echo $id; ?>" class="add" id=<?php echo"$id"; ?>>
				<i class="fa fa-cart-plus" aria-hidden="true"></i>			</a>
			<a class="card-more">
				<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
			</a>
		</div>
		<div class="info" id="oi">
			<h2><?php echo "$nome"; ?></h2>
			<?php echo "$descricao"; ?>
		</div>
	</div>
<?php 

} 
?>
</div>
<div align="center" class="paginacao">
<?php
	$anterior = $pc - 1;
	$proximo = $pc + 1;
	$next2 = $pc +2;
	$back2 = $pc -2;

	$total_paginas = ceil($tp);

	if($pc>1){
		echo "<a class='item' href='?pagina=$anterior'><i class='fa fa-arrow-circle-left' aria-hidden='true'></i></a>";
	}
	if($pc>1){
		if($back2 > 0){
			echo "<a class='item' href='?pagina=$back2'>$back2</a>";
		}
		echo "<a class='item' href='?pagina=$anterior'>$anterior</a>";
		
	}
	echo "<span class='item active'>$pc</span>";
	if($pc<$tp){
		echo "<a class='item' href='?pagina=$proximo'>$proximo</a>";
		if($next2<=$total_paginas){
			echo "<a class='item' href='?pagina=$next2'>$next2</a>";
		}
	}	
	if ($pc<$tp) {
		echo " <a class='item' href='?pagina=$proximo'><i class='fa fa-arrow-circle-right' aria-hidden='true'></i></a>";
	}

?>
</div>
<script type="text/javascript">
	$('.card-more').click(function(id){
		id = $(this).parent().parent().attr('id');
		card_info = $('#'+id).children('.info');
		card_info.toggleClass('visible');
	});
</script>
<div class="infocont about" id="about">
	<div>
		<div class="mypic">
			<img src="./assets/img/outros/mypic.png">
		</div>
		<div class="about-text">
			<span>Sobre nós</span>
			Gesso Store é uma Loja especializada em tudo o que envolve o gesso, buscamos ter sempre um bom atendimento.
			
			<div class="social" style="position: relative;left: -98px;">
				<a href="">
					<i class="fa fa-facebook-square" aria-hidden="true"></i>
				</a>
				<a href="">
					<i class="fa fa-instagram" aria-hidden="true"></i>
				</a>
				<a href="">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
				</a>
				

				
			</div>
		</div>

	</div>
</div>





