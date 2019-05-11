<?php
	if(!isset($_SESSION['tipo_usu'])){
		header('Location: ?page=login_view.php&msg=not_connected');
	}
	include './engine/connection.php';
	$id = $_GET['id'];

	$sql = "SELECT * FROM produtos WHERE cod_prod = $id";
	$exec = mysqli_query($con, $sql);
	while ($result = mysqli_fetch_array($exec)) {
		$nome = $result['nome_prod'];
		$preco = $result['preco_prod'];
		$descricao = $result['descricao_prod'];
		$img = $result['img_prod'];
	}
?>
<div class="container">
	<div class="form">
		<input type="hidden" id="id_prod" value="<?php echo $id ?>">
		<div class="form-campo">
			<img class="form-img" src="<?php echo  constant("PRODUTOS")."$img"; ?>">
		</div>
		<div class="form-campo">
			<?php echo "$nome"; ?>
		</div>
		<div class="form-campo" style="display: block;">
			R$ <span id="preco_prod" ><?php echo "$preco"; ?></span>
			
		</div>
		<div class="form-campo">
			<input onchange="somarPreco()" type="number" min="1" id="quant_prod" style="width:50px;">
		
		</div>
		<div class="form-campo" style="display: block;">
			Soma: R$ <span id="total"></span>
		</div>
		<div class="form-action">
			<a id="finalizar" class="button" onclick="addToCart('finalizar')">finalizar a compra</a>
			<a onclick="addToCart('continuar')" class="button">Continuar comprando</a>
		</div>
	</div>
</div>
<script type="text/javascript">
	var quant_prod = $("#quant_prod").val('1');
	var preco_prod = $("#preco_prod").html();
	$("#total").html(quant_prod.val()*preco_prod);
	function somarPreco(){
		
		$("#total").html(quant_prod.val()*preco_prod);
		
	}
	function addToCart(action){
		quant = $("#quant_prod").val();
		total = $("#total").html();
		if(quant == 0){
			alert("adicione pelo menos um item")
		}else{
				id_prod = $("#id_prod").val();
				formd = new FormData();
				formd.append('total',total);
				formd.append('quant_prod',quant_prod.val());
				formd.append('id_prod',id_prod);
				$.ajax({
					url:'./controller/users/add_to_cart_controller.php',
					processData: false,
			        contentType: false,
					type:'POST',
					data:formd,
					success:function(data){
						if(data == "deu"){
							if(action=="finalizar"){
								window.location="?page=users/cart.php";
							}else{
								window.location="index.php";
							}
						}
						console.log(data);
					}
			})
		}
	}
	$("#finalizar").click(function(){
		addToCart;
	});
</script>
<?php
	mysqli_close($con);
?>
