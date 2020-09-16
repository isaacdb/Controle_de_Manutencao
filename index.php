<?php 
	$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
	$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
	$erro_registro = isset($_GET['erro_registro']) ? $_GET['erro_registro'] : 0;
	$erro_login = isset($_GET['erro_login']) ? $_GET['erro_login'] : 0;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Controle - Login</title>

	<link rel="stylesheet" type="text/css" href="estilos/estilo-index.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>

<div class="nav">
	<h1>Controle de Manutenção de Equipamentos</h1>
</div>

<div class="container"><!--container-->


<div class="div_cadastro">
	<?php 
		if($erro_registro){//para o php valor 1 equivale true, e 0 vale false, nao necessariamente precisa ser um Booleanx
			echo'<font style="color:green">Usuario cadastrado com sucesso!</font>';
		}
	?>
	<h3>Cadastre-se</h3>
	<br />

	<form method="post" action="registra_usuario.php" id="formCadastrarse">
		<div class="form-group">
			<input type="" class="form-control" id="cod_funcionario" name="cod_funcionario" placeholder="Cod. Funcionario" required="requiored">
			<?php 
				if($erro_usuario){//para o php valor 1 equivale true, e 0 vale false, nao necessariamente precisa ser um Booleanx
					echo'<font style="color:#FF0000">Usuario ja existe</font>';
				}
			?>
		</div>						

		<div class="form-group">
			<input type="" class="form-control" id="nome" name="nome" placeholder="Nome" required="requiored">
		</div>

		<div class="form-group">
			<select name="cargo" id="cargo" required="requiored">
                <option value="">Seleciona uma opção</option>
                <option value="1">Recepcionista</option>
                <option value="2">Manutenção</option>
            </select>
		</div>

		<div class="form-group">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
			<?php 
				if($erro_email){
					echo'<font style="color:#FF0000">Email ja existe</font>';
				}
			?>
		</div>
						
					
		<div class="form-group">
			<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
		</div>
					
		<button type="submit" class="btn btn-primary form-control">Inscreva-se</button>
	</form>
</div>

<div class="div_login">
	Logar
	<form method="post" action="valida_login.php">
		<div class="form-group">
			<input type="" class="form-control" id="campo_usuario" name="campo_usuario" placeholder="Cod. Funcionario" required="requiored" />
		</div>
								
		<div class="form-group">
			<input type="password" class="form-control red" id="campo_senha" name="campo_senha" placeholder="Senha" required="requiored" />
			<?php 
				if($erro_login){//para o php valor 1 equivale true, e 0 vale false, nao necessariamente precisa ser um Booleanx
					echo'<font style="color:#FF0000">Usuario ou senha incorretos.</font>';
				}
			?>
		</div>

								
		<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

		<br /><br />
								
	</form>
</div>


</div><!--//container-->


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>