<br>
<br>
<br>
<!DOCTYPE html>
<html>
<head>
	<title>Error</title>
</head>
<style type="text/css">
	.error{
		
	}
	.error-title{
		text-align: center;
	}
	.error-msg{
		display: flex;

	}
	.error-msg img{
		width: 250px;
		height: 250px;
	}
	.error-msg div{
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		padding: 20px;
	}
	.error-msg div a{
		text-decoration: none;
		background: #01579b;
		color: white;
		font-weight: bold;
		padding: 5px;
		border-radius: 10px; 

	}
</style>
<body>
	<div class="error">
		<h1 class="error-title">Erro ao acessar essa Pagina :(</h1>
		<div class="error-msg">
			<img src="./assets/img/outros/error.png">
			<div>
				<span>A pagina solicitada é restrita ou não existe</span>
				<a href="./index.php">Ir para a pagina inicial <i class="fas fa-home"></i></a>
			</div>
		</div>
	</div>
</body>
</html>