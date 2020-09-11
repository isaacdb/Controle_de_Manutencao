<?php

	session_start();

	require_once('db.class.php');

	$cod_funcionario = $_POST['campo_usuario'];
	$senha =md5( $_POST['campo_senha']);

	$sql = " SELECT id, codigo, email FROM funcionarios WHERE codigo = '$cod_funcionario' AND senha = '$senha'";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['codigo'])){

			$_SESSION['id_usuario'] = $dados_usuario['id'];
			$_SESSION['usuario'] = $dados_usuario['codigo'];
			$_SESSION['email'] = $dados_usuario['email'];
			header('Location: registros.php');
		}else{
			header('Location: index.php?erro=1');
		}
	}
	else{
		echo "Erro na execucao da consulta!";
	}

?>