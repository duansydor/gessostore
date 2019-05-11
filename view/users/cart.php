<br>
<br>
<br>
<br>
<br>
<center><h1>Produtos</h1></center>
<div class="carrinho">
<?php
	include './engine/connection.php';
	if(@$_GET['msg']){
		echo "<div id='msga'class='alert'><h1>Excluido</h1></div>
		";
	}
	$cod_usu = $_SESSION['cod_usu'];
	$sql = "SELECT * FROM carrinho where cod_usu = $cod_usu";
	$exec = mysqli_query($con, $sql);
	$total_carrinho = 0;
	while($r = mysqli_fetch_assoc($exec)){
		$cod_prod = $r['cod_prod'];
		$quant_prod = $r['quant_prod'];
		$total_prod = $r['total_prod'];

		$prod ="SELECT cod_prod, nome_prod, preco_prod, img_prod FROM produtos WHERE cod_prod = $cod_prod";
		$res = mysqli_query($con,$prod);
		$prod_data = mysqli_fetch_assoc($res);
		$nome_prod = $prod_data['nome_prod'];
		$img_prod = $prod_data['img_prod'];
		$preco_prod = $prod_data['preco_prod'];
?>
<div class="item">
	<div class="excluir-item">
		<a href="./controller/users/delete_cart.php?prod=<?php echo $cod_prod ?>&quant=<?php echo $quant_prod ?>" class="action primary red">
		&nbsp X &nbsp
		</a>
	</div>
	<div align="center">
		<img style="width: 200px;" src=<?php echo constant("PRODUTOS").$img_prod; ?>>
	</div>
	<div>
		<span><?php echo $nome_prod?></span>
	</div>
	<div>
		<span>
			Quantidade:
			<?php echo $quant_prod; ?>
		</span>
	</div>
	<div>
		<span>
			Preço: R$ <?php echo $quant_prod * $preco_prod ?>
		</span>
	</div>
</div>



<?php
	$total = $quant_prod * $preco_prod;
	$total_carrinho += $total;
	}
?>
</div>
	<br>
<div align="center">
	<i class="fa fa-shopping-cart" aria-hidden="true"></i>
	Total do carrinho: R$ <?php echo $total_carrinho; ?>
</div>
<div align="center" class="form">
	<div class="form-campo">
		<a class="action primary" href="#" style="cursor: pointer;">Imprimir boleto</a>
	</div>
<div>
<script type="text/javascript">
	setTimeout(function(){
		$('#msga').css('display','none');
	},1000)
</script>
<?php	
	mysqli_close($con);
?>
