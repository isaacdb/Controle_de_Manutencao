<?php
	session_start();


	require_once('db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();	

	$sql= "SELECT registros.date_att, registros.nome, registros.tipo,registros.id, registros.status, registros.recepcionista FROM `registros` WHERE 1 ORDER BY date_att DESC";


	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
 
		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

			 echo '<form method="post" action="detalhes_registro.php" class = "list-group-item">';
			 echo '<h4 class = "list-group-item-heading">'.$registro['tipo'].'</h4>';
			 echo '<p class = "list-group-item-text">#id '.$registro['id'].'</p>';
			 echo '<input type="hidden" name="id" id="id" value="'.$registro['id'].'">';
			 echo '<p class = "list-group-item-text"> <small>cliente </small>'.$registro['nome'].'</p>';
			 echo '<p class = "list-group-item-text"> <small>Recepcionista </small> '.$registro['recepcionista'].'</p>';
			 echo '<small> Ultima Att - '.$registro['date_att'].'</small>';

			if($registro['status'] == 1){
				$style_text = "red";
			 	$status_string = "Pendente";
			 }
			 else if($registro['status'] == 2){
				$style_text = "#eead2d";#cor amarelo escuro
			 	$status_string = "Em Andamento";
			 }
			 else if ($registro['status'] == 3) {
				$style_text = "green";
			 	$status_string = "Finalizado";
			 }
			 else{
			 	$status_string = "Error";
			 }
			 
			 echo '</br></br><p class = "list-group-item-text" style="color: '.$style_text.';">'.$status_string.'</p>';
			 echo '<button type="buttom">Detalhes</button>';
			 echo'</form>';

		}

	}else{
		echo 'Erro na consulta de tweets no banco de dados!';
	}


?>