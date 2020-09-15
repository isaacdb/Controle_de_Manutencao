<?php
	session_start();


	require_once('db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();	

	$sql= "SELECT DATE_FORMAT(registros.data,'%d %b %Y %T') AS data_inclusao_formatada, registros.nome, registros.tipo,registros.id, registros.status, registros.recepcionista FROM `registros` WHERE 1 ORDER BY data DESC";


	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
 
		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

			 echo '<form method="post" action="detalhes_registro.php" class = "list-group-item">';
			 echo '<h4 class = "list-group-item-heading">'.$registro['tipo'].'</h4>';
			 echo '<input type="hidden" name="id" id="id" value="'.$registro['id'].'">';
			 echo '<p class = "list-group-item-text">'.$registro['nome'].'</p>';
			 echo '<p class = "list-group-item-text">'.$registro['id'].'</p>';
			 echo '<p class = "list-group-item-text"> Recepcionista: '.$registro['recepcionista'].'</p>';
			 echo '<small> Ultima Att - '.$registro['data_inclusao_formatada'].'</small>';

			if($registro['status'] == 1){
			 	$status_string = "Em Aberto";
			 }
			 else if($registro['status'] == 2){
			 	$status_string = "Em Andamento";
			 }
			 else if ($registro['status'] == 3) {
			 	$status_string = "Finalizado";
			 }
			 else{
			 	$status_string = "Error";
			 }
			 
			 echo '<p class = "list-group-item-text"> Status = '.$status_string.'</p>';
			 echo '<button type="buttom">Detalhes</button>';
			 echo'</form>';

		}

	}else{
		echo 'Erro na consulta de tweets no banco de dados!';
	}


?>