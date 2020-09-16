<?php
	session_start();
	
	if(!isset($_SESSION['codigo'])){
		header('Location: index.php?erro_login=1');
	}

	$status_busca = $_POST['status'];
	$cliente_busca = $_POST['cliente'];
	$recepcao_busca = $_POST['recepcionista'];
	$manutencao_busca = $_POST['manutencao'];
	$tipo_busca = $_POST['tipo'];
	$marca_busca = $_POST['marca'];
	$cidade_busca = $_POST['cidade'];
?> 

<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">

	<title>Controle - Detalhamento</title>

	<link rel="stylesheet" type="text/css" href="estilos/estilo-index.css">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script type="text/javascript">
			$(document).ready(function(){

						$.ajax({
							url: 'busca_filtro.php',
							method: 'post',
							data:$('#form_busca').serialize(),
							success: function(data){
								$('#div_buscados').html(data);
								}
					});
			});

		</script>
</head>
<body>

<div class="nav">
	<h1>Controle de Manutenção de Equipamentos</h1>
</div>
<form id="form_busca">
	<input type="hidden" name="status" id="status" value="<?= $status_busca ?>" >
	<input type="hidden" name="cliente" id="cliente" value="<?= $cliente_busca ?>" >
	<input type="hidden" name="recepcao" id="recepcao" value="<?= $recepcao_busca ?>" >
	<input type="hidden" name="manutencao" id="manutencao" value="<?= $manutencao_busca ?>" >
	<input type="hidden" name="tipo" id="tipo" value="<?= $tipo_busca ?>" >
	<input type="hidden" name="marca" id="marca" value="<?= $marca_busca ?>" >
	<input type="hidden" name="cidade" id="cidade" value="<?= $cidade_busca ?>" >
</form>

<div class="container"><!--container-->

<div class="div_registro" id="div_buscados"><!--Feed-->

</div><!--//feed-->

<div class="div_busca"><!--Busca-->

	<div class="panel panel-default">
	<div class="panel-body">
	<div>
		<a href="registros.php"> VOLTAR</a>
	</div>
	</div>
	</div>

</div><!--//Busca-->

</div><!--//container-->


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>