<?php 
	session_start();

	require_once('db.class.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$tipo = $_POST['tipo'];
$marca = $_POST['marca'];
$defeito = $_POST['defeito'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = " insert into registros(nome, email, telefone, uf, cidade, bairro, tipo, marca, defeito) values('$nome', '$email','$telefone', '$uf', '$cidade', '$bairro', '$tipo', '$marca', '$defeito')";

	if(mysqli_query($link, $sql)){
		header('Location: registros.php');

	}
	else{
		echo'Erro ao registrar!';
	}



?>