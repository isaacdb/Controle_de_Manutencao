<?php
	session_start();


	require_once('db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$status_busca = $_POST['status'];
	$cliente_busca = $_POST['cliente'];
	$recepcao_busca = $_POST['recepcao'];
	$manutencao_busca = $_POST['manutencao'];
	$tipo_busca = $_POST['tipo'];
	$marca_busca = $_POST['marca'];
	$cidade_busca = $_POST['cidade'];

	$comando = "";

	if(!empty($status_busca)){
		$comando = "`status` = $status_busca";
	}

	if(!empty($cliente_busca)){
		if(!$comando == ""){
		$comando.= " AND ";
	}
		$comando.= "`nome` like '%$cliente_busca%'";
	}

	if(!empty($recepcao_busca)){
		if(!$comando == ""){
		$comando.= " AND ";
	}
		$comando.= "`recepcionista` like '%$recepcao_busca%'";
	}

	if(!empty($manutencao_busca)){
		if(!$comando == ""){
		$comando.= " AND ";
	}
		$comando.= "`manutencao` like '%$manutencao_busca%'";
	}

	if(!empty($tipo_busca)){
		if(!$comando == ""){
		$comando.= " AND ";
	}
		$comando.= "`tipo` like '%$tipo_busca%'";
	}

	if(!empty($marca_busca)){
		if(!$comando == ""){
		$comando.= " AND ";
	}
		$comando.= "`marca` like '%$marca_busca%'";
	}

	if(!empty($cidade_busca)){
		if(!$comando == ""){
		$comando.= " AND ";
	}
		$comando.= "`cidade` like '%$cidade_busca%'";
	}	

	if($comando == ""){
		$comando = "1";
	}

	$sql = "SELECT * FROM `registros` WHERE $comando ";


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