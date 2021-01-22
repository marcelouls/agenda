<?php


session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: agenda.php?erro=1');
}




echo '<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Anamnese</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">  	
  	</script>
	<style type="text/css">
	body{
		background: lightgrey;
	}

	h1{
		font-family:  Georgia serif;
		font-style: bold;
		color:#d13d04;
		text-align: center;
		margin-right: 30px;
		font-size: 25px;
		margin-bottom: 30px;

	}	

	textarea{
		width: 100%;
		align-content: center;

	}
	input[type=text]  {
		width: 100%;
	}
	
	input[type=email] {
		width: 100%;
	}

	button{
		margin: 10px 40% 20px;
		
	}

	</style>
</head>
<body>
	<div class="row">
	<div class="col-md-4 col-xs-3">
	<a href="opcoes.php">
		<button style="border:none;background-color:lightgrey;float:right;margin-top:15px">
		<span class="glyphicon glyphicon-menu-left" style="float:left;font-size:30px;color:#34475c;background-color:lightgrey;border:none;">
		</span></button></div>
	<div class="col-md-4 col-xs-6">
	<h1>Cadastro Pacientes</h1></div>
	<div class="col-md-1 col-xs-3">
		
		</div>
	<div class="col-md-3"></div>
		</a>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4">
	<div style="border: solid 1px;border-radius:15px;padding:30px 10px 10px 10px; margin-right:10px;margin-left:10px">

		<div class="row">
		
		<div class="col-md-12">
		<form method="post" action="salva_paciente.php">

    <div class="panel-group" >
    <div class="panel panel-default">
    <div class="panel-heading">
	<h2 class="panel-title" >
	 <a data-toggle="collapse" href="#collapse1" >Identificação Pessoal</a>
	</h2>

	<div id="collapse1" class="panel-collapse collapse">
	<input type="text" name="nome" placeholder="Nome" required="required" maxlength="300"><br>
	<label>Data de Nascimento</label>
	<input type="date" name="data" placeholder="Data de Nacimento" required="required"><br>
	<label>Sexo</label>
	<input type="radio" value="1" name="sexo" value="m"><label>M</label>
	<input type="radio" value="2" name="sexo" value="f"><label>F</label>
	<select class="form-control" name="estadoCivil" placeholder="Estado Civil">
		<option>Escolha Estado Civil</option>
		<option value="1" >Solteiro(a)</option>
		<option value="2">Casado(a)</option>
		<option value="3">Viuvo(a)</option>
		<option value="4">Separado(a)</option>
		<option value="5">Divorciado(a)</option>		
	</select>
	<input type="text" name="endereco" placeholder="Endereço" maxlength="300">
	<input type="text" name="cidade" placeholder="Cidade" maxlength="100"><br>
	<input type="text" name="profissao" placeholder="Profissão" maxlength="80">
	<input type="text" name="religao" placeholder="Religão" maxlength="60">
	<input type="text" name="escolaridade" placeholder="Escolaridade"><br>
	<input type="text" name="telefone" placeholder="Fone" maxlength="13" required="required">
	<input type="email" name="email" placeholder="E-mail" maxlength="150"><br>
	</div>
	</div>
	</div>
	</div>
	</div>

	</div>
	

	
	<div class="row">
	
	<div class="col-md-12">
 	<div class="panel-group">
    <div class="panel panel-default">
    <div class="panel-heading">
	<h2 class="panel-title">
		<a data-toggle="collapse" href="#collapse2">Identificação dos Pais:</a>
	</h2>
	<div id="collapse2" class="panel-collapse collapse">
	<input type="text" name="nomePai" placeholder="Nome do Pai" maxlength="150">
	<input type="text" name="idadePai" placeholder="Idade" maxlength="3">
	<input type="text" name="escolaridadePai" placeholder="Escolaridade"><br>
	<input type="text" name="profissaPai" placeholder="Profissão" maxlength="80"><br>
	<input type="text" name="nomeMae" placeholder="Nome da Mãe" maxlength="150">
	<input type="text" name="idadeMae" placeholder="Idade" maxlength="3">
	<input type="text" name="escolaridadeMae" placeholder="Escolaridade"><br>
	<input type="text" name="profissaMae" placeholder="Profissão" maxlength="80"><br>

	</div>
	</div>
	</div>
	</div>
	</div>
	
	</div>
	

	

	<div class="row">
	<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved">  Salvar</span></button>
	
	</form>

	</div>
</div>
</div>
</div>
<div class="col-md-4"></div>
<div class="col-md-2"></div>
 
</body>
</html>';