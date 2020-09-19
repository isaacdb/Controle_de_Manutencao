<?php

class set_tb {

	//qual host
	private $host = 'localhost';

	//qual usuario
	private $usuario = 'root';

	//qual senha
	private $senha = '';

	private $database = 'bethateste';

	public function conecta_mysql_tb(){
		//criar conexao
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		//ajustar o charset de comunicacao entre a aplicacao e o banco de dados
		mysqli_set_charset($con, 'utf8');

		//verificar se houve erro de conexão
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com o BD MySql : '.mysqli_connect_error();
		}

		return $con;
	}
}

class set_db {

	//qual host
	private $host = 'localhost';

	//qual usuario
	private $usuario = 'root';

	//qual senha
	private $senha = '';

	public function conecta_mysql(){
		//criar conexao
		$con = mysqli_connect($this->host, $this->usuario, $this->senha);

		//ajustar o charset de comunicacao entre a aplicacao e o banco de dados
		mysqli_set_charset($con, 'utf8');

		//verificar se houve erro de conexão
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com o BD MySql : '.mysqli_connect_error();
		}

		return $con;
	}
}

	$objDb = new set_db();
	$link = $objDb->conecta_mysql();
	$sql = "create database bethateste ";

		if(mysqli_query($link, $sql)){
		header('Location: index.php');
	}
	else{
		echo 'Erro ao registrar database!';
	}




	$objDb2 = new set_tb();
	$link2 = $objDb2->conecta_mysql_tb();
	$sql2 = "create table funcionarios(id int not null primary key auto_increment, nome varchar(150) not null, codigo int not null, cargo int not null, email varchar(150) not null, senha varchar(32) );";

	$sql3 = "create table registros ( id int not null primary key auto_increment, status int not null default(1), nome varchar(150) not null, email varchar(150) not null, telefone int not null, uf varchar(150) not null, cidade varchar(150) not null, bairro varchar(150) not null, tipo varchar(150) not null, marca varchar(150) not null, data datetime not null default(current_timestamp()), defeito varchar(1000) not null, date_att datetime not null default(current_timestamp()), recepcionista varchar(150) not null, manutencao varchar(150) not null, comentario varchar(1000) not null );";

		if(mysqli_query($link2, $sql2) && mysqli_query($link2, $sql3)){
		header('Location: index.php');
	}
	else{
		echo 'Erro ao registrar tabelas!';
	}

?>