<?php

	session_start();

	require_once('db.class.php');

	$cod_funcionario = $_POST['campo_usuario'];
	$senha =md5( $_POST['campo_senha']);

	$sql = " SELECT id, codigo, email, nome, cargo FROM funcionarios WHERE codigo = '$cod_funcionario' AND senha = '$senha'";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['codigo'])){
		#	$cargo[1] = "Recepção";
		#	$cargo[2] = "Manutenção";

			$_SESSION['id_usuario'] = $dados_usuario['id'];
			$_SESSION['codigo'] = $dados_usuario['codigo'];
			$_SESSION['nome'] = $dados_usuario['nome'];
			$_SESSION['email'] = $dados_usuario['email'];

			if($dados_usuario['cargo'] == 1){
				$_SESSION['cargo'] = "Recepção";
			}
			else {
				$_SESSION['cargo'] = "Manutenção";
			}


			header('Location: registros.php');
		}else{
			header('Location: index.php?erro_usuario=1');
		}
	}
	else{
		echo "Erro na execucao da consulta!";
	}

?>