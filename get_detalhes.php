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
			echo '<p>Recepcionista: '.$registro['recepcionista'].'</p>';
			echo '<p>Manutenção: '.$registro['manutencao'].'</p>';
			echo '<p>Email: '.$registro['email'].'</p>';
			echo '<p>Data do registro: '.$registro['data'].'</p>';
			echo '<p>Contato: '.$registro['telefone'].'</p>';
			echo '<p>UF: '.$registro['uf'].'</p>';
			echo '<p>Cidade: '.$registro['cidade'].'</p>';
			echo '<p>Bairro: '.$registro['bairro'].'</p>';
			echo '<p>Marca do produto: '.$registro['marca'].'</p>';
			echo '<p>Descrição do defeito: '.$registro['defeito'].'</p>';
			echo '<p>Ultima Atualização: '.$registro['date_att'].'</p>';

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

			echo '<p style="color: '.$style_text.';" >STATUS: '.$status_string.'</p>';
			echo '<p>Comentário do funcionario da manutenção: '.$registro['comentario'].'</p>';
			echo '</div>';

		}

	}else{
		echo $id_registro;
	}


?>