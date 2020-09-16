<?php 
	session_start();
	if(!isset($_SESSION['codigo'])){
		header('Location: index.php?erro_login=1');
	}

	$id_registro = $_POST['id'];
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
							url: 'get_detalhes.php',
							method: 'post',
							data:$('#form_id_registro').serialize(),
							success: function(data){
								$('#div_detalhes').html(data);

									if($('#cargo').text() == "Manutenção"){
										$('#painel_atualizar').show();
									}
									else{
										$('#painel_atualizar').hide();
									}

								}
					});


			});

		</script>
</head>
<body>

<div class="nav">
	<h1>Controle de Manutenção de Equipamentos</h1>
</div>
<form id="form_id_registro">
	<input type="hidden" name="id" id="id" value="<?= $id_registro ?>" >
	<span id="cargo" class="hidden"><?= $_SESSION['cargo']?></span>
</form>

<div class="container"><!--container-->

	<div class="div_registro" id="div_detalhes"><!--Feed-->

	</div><!--//feed-->


	<div class="div_busca"><!--Busca-->

	<div class="panel panel-default">
	<div class="panel-body">
	<div>

	<a href="registros.php"> VOLTAR</a>

	</div>
	</div>
	</div>

	<div class="panel panel-default" id="painel_atualizar">
	<div class="panel-body">
	<div>
		<form method="post" action="att_status.php">
				<input type="hidden" name="id_att" id="id_att" value="<?= $id_registro ?>" >

			<select name="status" id="status" required="requiored">
				<option value="1">Pendente</option>
				<option value="2">Em Andamento</option>
				<option value="3">Finalizado</option>
    		</select>
    		<button type="buttom" id="att_btn">Atualizar</button>
    		<br><br>
    		<input type="" name="consideracoes" id="consideracoes" placeholder="Considerações do funcionária que fez a manutenção">

    	</form>
	</div>
	</div>
	</div>

	</div><!--//Busca-->

</div><!--//container-->


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>