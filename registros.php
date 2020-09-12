<?php 
session_start();
?>

<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">

	<title>Controle - Registros</title>

	<link rel="stylesheet" type="text/css" href="estilos/estilo-index.css">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script type="text/javascript">
			$(document).ready(function(){
							
				$('#btn_att').click(function(){

					atualizaRegistros();

				});

				function atualizaRegistros(){
					$.ajax({
						url:'get_registro.php',
						success: function(data){
							$('#equips').html(data);
						}
					});
				}

				atualizaRegistros();
			});

		</script>


</head>
<body>

<div class="nav">
	<h1>Controle de Manutenção de Equipamentos</h1>
</div>

<div class="container"><!--container-->

<div class="div_perfil" ><!--Perfil-->
	<div class="panel panel-default">
	<div class="panel-body">
	<h4>Isaac Debiasi</h4>
	<div>
		Cargo: 
		<span>Recepcionista</span>
	</div>
	<br>
	<div>Código de funcionario</div>
	</div>
	</div>

	<div class="panel panel-default">
	<div class="panel-body">
	<div>
		<a href="cadastramento.php">Novo Registro</a>
	</div>
	</div>
	</div>

	<button id="btn_att" type="button">Att</button>


</div><!--//Perfil-->

<div class="div_feed"><!--Feed-->

	<div id="equips" class="list-group">
		
		<a href="detalhes_registro.php" class = " list-group-item div_equip">	
		<h4 class = "list-group-item-heading">Furadeira Makita</h4>
		<p class = "list-group-item-text">Cliente: Roberto Cavalcante</p>
		<p class = "list-group-item-text">Recepcionista: Abelardo Correa</p>
		<small>Ultima atualização - 10/09/20</small>
		<p class = "list-group-item-text">STATUS: aberto</p>	
		</a>
		
	</div>

</div><!--//feed-->

<div class="div_busca"><!--Busca-->
	<div class="panel panel-default">
		<div class="panel-body">
			<input type="text" name="busca">
			<a href="#">Buscar</a>
			<br>
			<select name="cargo_busca" id="cargo_busca">
                <option value="">Seleciona uma opção</option>
				<option>Na Espera</option>
				<option>Em Andamento</option>
				<option>Finalizado</option>
            </select>
		</div>
	</div>
</div><!--//Busca-->

</div><!--//container-->


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>