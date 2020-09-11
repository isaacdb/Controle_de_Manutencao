<?php 

	require_once('db.class.php');


$cod_funcionario = $_POST['cod_funcionario'];
$email = $_POST['email'];
$nome = $_POST['nome'];
$cargo = $_POST['cargo'];
$senha = md5($_POST['senha']);

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$funcionario_existe =  false;
	$email_existe = false;


	//verificar se o usuario ja existe
	$sql = "select * from funcionarios where codigo = '$cod_funcionario' ";
	if($resultado_id = mysqli_query($link,$sql)){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		
		if(isset($dados_usuario['codigo'])){
			$funcionario_existe = true;
		}
	}else{
		echo 'Erro ao tentar localizar registro de usuario';
	}

	//verificar se o email ja existe

	$sql = "select * from funcionarios where email = '$email' ";
	if($resultado_id = mysqli_query($link,$sql)){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		
		if(isset($dados_usuario['email'])){
			$email_existe = true;
		}

	}else{
		echo 'Erro ao tentar localizar registro de email';
	}

	if($funcionario_existe || $email_existe){
		$retorno_get = '';

		if($funcionario_existe){
			$retorno_get.="erro_usuario=1&";
		}
		if($email_existe){
			$retorno_get.="erro_email=1&";
		}
		header('Location: index.php?'.$retorno_get);
		die();
	}

	$sql = " insert into funcionarios(codigo, email, senha, nome, cargo) values('$cod_funcionario', '$email', '$senha', '$nome', '$cargo')";

	//executar a query
	if(mysqli_query($link, $sql)){
		echo 'Usuario registrado com sucesso!';
			$retorno_get.="erro_registro=1&";
		header('Location: index.php?'.$retorno_get);
	}
	else{
		echo'Erro ao registrar usuario!';
	}



?>