<?php  
	session_start(); 

	require_once('db.class.php');



	$id_registro = $_POST['id_att'];
	$status = $_POST['status'];
	$comentario = $_POST['consideracoes'];
	$nome_executor = $_SESSION['nome'];


	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = "UPDATE registros SET comentario = '$comentario', status = '$status', manutencao = '$nome_executor', date_att=now() WHERE id = '$id_registro' ";

	if(mysqli_query($link, $sql)){
		header('Location: registros.php');

	}
	else{
		echo'Erro ao registrar!';
	}



?>