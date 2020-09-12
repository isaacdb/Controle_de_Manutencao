<?php
	session_start();


	require_once('db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();	

	$sql= "SELECT DATE_FORMAT(registros.data,'%d %b %Y %T') AS data_inclusao_formatada, registros.nome, registros.tipo FROM `registros` WHERE 1 ORDER BY data DESC";


	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
 
		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

			 echo '<a href="detalhes_registro.php" class = " list-group-item div_equip">';
			 echo '<h4 class = "list-group-item-heading">'.$registro['tipo'].'</h4>';
			 echo '<p class = "list-group-item-text">'.$registro['nome'].'</p>';
			 echo '<p class = "list-group-item-text"> Recepcionista: '.$registro['nome'].'</p>';
			 echo '<small> Ultima Att - '.$registro['data_inclusao_formatada'].'</small>';
			 echo '<p class = "list-group-item-text"> Status = '.$registro['nome'].'</p>';
			 echo'</a>';

		}

	}else{
		echo 'Erro na consulta de tweets no banco de dados!';
	}


?>