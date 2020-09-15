<?php
	session_start();
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
</form>

<div class="container"><!--container-->

	<div class="div_registro" id="div_detalhes"><!--Feed-->

	</div><!--//feed-->


	<div class="div_busca"><!--Busca-->
	<a href="registros.php"> VOLTAR</a>
	<div>
		<form method="post" action="att_status.php">
				<input type="hidden" name="id_att" id="id_att" value="<?= $id_registro ?>" >

			<select name="status" id="status" required="requiored">
				<option value="1">Na Espera</option>
				<option value="2">Em Andamento</option>
				<option value="3">Finalizado</option>
    		</select>
    		<button type="buttom" id="att_btn">Atualizar</button>
    	</form>
	</div>
	</div><!--//Busca-->

</div><!--//container-->


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>