<?php
	include'../../engine/connection.php';
	@$img = $_GET['img'];
	$cod = $_GET['cod'];
	$table = $_GET['table'];
	$connection = $con;
	if(isset($table) && isset($cod)){
		switch ($table) {
			case 'user':
				$sql = "DELETE FROM usuarios where usuarios.cod_usu = $cod";
				mysqli_query($connection,$sql);
				if(mysqli_affected_rows($connection)>0){
					$sql = "DELETE FROM carrinho WHERE cod_usu = $cod";
					mysqli_query($connection,$sql);
					header("Location:../../index.php?page=admin/rel_usu.php&msg=Deletado");
				}else{
					echo "usuário nao deletado";
					header("Location:../../index.php?page=admin/rel_usu.php&msg=Erro");
				}
				
			break;
			case 'prod':
				$sql = "DELETE FROM produtos  where cod_prod = $cod";
				mysqli_query($connection,$sql);
				if(mysqli_affected_rows($connection)>0){
					echo "produto deletado";
					$sql = "DELETE FROM carrinho WHERE cod_prod = $cod";
					mysqli_query($connection,$sql);
					header("Location:../../index.php?page=admin/prodlist.php&msg=Deletado");
					unlink("../../assets/img/produtos/".$img);
				}else{
					echo "produto nao deletado";
					header("Location:../../index.php?page=admin/rel_usu.php&msg=Erro");
					

				}

			break;
				
			default:
				echo "erro";	
			break;
		}
	}
?>
