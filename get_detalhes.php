<?php
 
	session_start();


	require_once('db.class.php');
	$id_registro = $_POST['id'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();
 
	$sql = " SELECT * FROM `registros` WHERE `id` = $id_registro";


	$resultado_id = mysqli_query($link, $sql);//comando para aplicar a busca ou insercao no banco de dados

	if($resultado_id){

		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

			echo '<div class="detalhes  list-group-item">';
			echo '<h4>'.$registro['tipo'].'</h4>';
			echo '<p>Cliente: '.$registro['nome'].'</p>';
			echo '<p>Email: '.$registro['email'].'</p>';
			echo '<p>Data: '.$registro['data'].'</p>';
			echo '<p>Contato: '.$registro['telefone'].'</p>';
			echo '<p>UF: '.$registro['uf'].'</p>';
			echo '<p>Cidade: '.$registro['cidade'].'</p>';
			echo '<p>Bairro: '.$registro['bairro'].'</p>';
			echo '<p>Marca: '.$registro['marca'].'</p>';
			echo '<p>Descrição: '.$registro['defeito'].'</p>';
			echo '<p>Ultima Atualização: '.$registro['date_att'].'</p>';

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

			echo '<p>STATUS: '.$status_string.'</p>';
			echo '</div>';

		}

	}else{
		echo $id_registro;
	}


?>