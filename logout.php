<?php 

	session_start();

	unset($_SESSION['id_usuario']);
	unset($_SESSION['codigo']);
	unset($_SESSION['nome']);
	unset($_SESSION['cargo']);
	unset($_SESSION['email']);

	header('Location: index.php');
	

?>