<?php 
session_start();

	if(!isset($_SESSION['codigo'])){
		header('Location: index.php?erro_usuario=1');
	}

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
	<h4><?= $_SESSION['nome']?></h4>
	<div>
		Cargo: 
		<span><?= $_SESSION['cargo']?></span>
	</div>
	<br>
	<div>Codigo de funcionario <?= $_SESSION['codigo']?></div>
	</div>
	</div>

	<div class="panel panel-default">
	<div class="panel-body">
	<div>
		<a href="cadastramento.php">Novo Registro</a>
	</div>
	</div>
	</div>

<a href="logout.php">Logout</a>


</div><!--//Perfil-->

<div class="div_feed"><!--Feed-->

	<div id="equips" class="list-group">
		
		<!--<a href="detalhes_registro.php" class = " list-group-item div_equip">	
		<h4 class = "list-group-item-heading">Furadeira Makita</h4>
		<p class = "list-group-item-text">Cliente: Roberto Cavalcante</p>
		<p class = "list-group-item-text">Recepcionista: Abelardo Correa</p>
		<small>Ultima atualização - 10/09/20</small>
		<p class = "list-group-item-text">STATUS: aberto</p>	
		</a>-->
		
	</div>

</div><!--//feed-->

<div class="div_busca"><!--Busca-->
	<div class="panel panel-default">
		<div class="panel-body">
				<h4>Secção de busca</h4>

			<form action="pag_busca.php" method="post">

			<select name="status" id="status" class="form-control">
                <option value="">Status do serviço</option>
				<option value="1">Na Espera</option>
				<option value="2">Em Andamento</option>
				<option value="3">Finalizado</option>
            </select>

            <div><input type="text" name="cliente" id="cliente" placeholder="Nome do cliente" class="form-control"></div>
            <div><input type="text" name="recepcionista" id="recepcionista" placeholder="Nome do Recepcionista" class="form-control"></div>
            <div><input type="text" name="manutencao" id="manutencao" placeholder="Nome do executor do serviço" class="form-control"></div>
            <div><input type="text" name="tipo" id="tipo" placeholder="Tipo do equipamento" class="form-control"></div>
            <div><input type="text" name="marca" id="marca" placeholder="Marca do equipamento" class="form-control"></div>
            <div><input type="text" name="cidade" id="cidade" placeholder="Cidade" class="form-control"></div>
            <br>

            <button type="buttom" class="btn-primary">Buscar</button>
        	</form>


		</div>
	</div>
</div><!--//Busca-->

</div><!--//container-->


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>