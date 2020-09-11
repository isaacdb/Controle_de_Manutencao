<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Controle - Detalhamento</title>

	<link rel="stylesheet" type="text/css" href="estilos/estilo-index.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>

<div class="nav">
	<h1>Controle de Manutenção de Equipamentos</h1>
</div>

<div class="container"><!--container-->

<div class="div_registro"><!--Feed-->

Nome
<br>
Email
<br>
Telefone
<br>
UF
<br>
Cidade
<br>
Bairro
<br>
Tipo do equip
<br>
Marca
<br>
data de compra
<br>
descricao
<br>
ultima att
<br>
Status
</div><!--//feed-->

<div class="div_busca"><!--Busca-->
	<a href="registros.php"> VOLTAR</a>
	<div>
	<select>
		<option value=""></option>
		<option>Na Espera</option>
		<option>Em Andamento</option>
		<option>Finalizado</option>
	</select>
	<button class="btn btn-default">Atualizar</button>
	</div>

</div><!--//Busca-->

</div><!--//container-->


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>