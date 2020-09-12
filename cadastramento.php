<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Controle - Cadastramento</title>

	<link rel="stylesheet" type="text/css" href="estilos/estilo-index.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>

<div class="nav">
	<h1>Controle de Manutenção de Equipamentos</h1>
</div>

<div class="container"><!--container-->

<div class="div_registro"><!--Feed-->

	<form method="post" action="include_registro.php" id="formRegistro">
		<div class="form-group">
			<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="requiored">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" id="email" name="email" placeholder="E-mail" required="requiored">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required="requiored">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" id="uf" name="uf" placeholder="Uf" required="requiored">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required="requiored">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required="requiored">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo do equipameto" required="requiored">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" id="marca" name="marca" placeholder="Marca do equipamento" required="requiored">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" id="defeito" name="defeito" placeholder="Descrição do defeito" required="requiored">
		</div>
					
		<button type="submit" class="btn btn-primary form-control">Registrar</button>
	</form>

</div><!--//feed-->

<div class="div_busca"><!--Busca-->
	<a href="registros.php"> VOLTAR</a>
</div><!--//Busca-->

</div><!--//container-->


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>