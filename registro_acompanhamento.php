<?php


session_start();

if(!isset($_SESSION['usuario'])){
		header('Location: agenda.php?erro=1');
}


require_once('db.class.php');

$cd_paciente   = isset($_POST['cd_paciente']) ? $_POST['cd_paciente']: "";
$nm_paciente   = isset($_POST['nm_paciente']) ? $_POST['nm_paciente']: "";
$dt_nacimento= isset($_POST['dt_nacimento']) ? $_POST['dt_nacimento']: "";
$fone          = isset($_POST['fone']) ? $_POST['fone']: "";
$data_registro = isset($_POST['data_registro']) ? $_POST['data_registro']: "";

$sql = "SELECT * FROM paciente where cd_paciente = $cd_paciente";

$objDb = new db();
$link = $objDb-> conecta_mysql();

$consulta=mysqli_query($link, $sql); 

$dados_paciente = mysqli_fetch_array($consulta);




echo '<!DOCTYPE html>
<html>
<head lang="pt-br">
	<title>Registro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">  	
  	</script>	
	<style>

	h1{
		font-family:  Georgia serif;
		font-style: bold;
		color:#d13d04;
		text-align: center;
		margin-right: 30px;
		font-size: 25px;
		margin-bottom: 30px;

	}	
		#titulo, #codigo{
		text-align: center;
		}
		h3 {
			text-align: left;
			color: #dea62c;
		}
		body{

			background: lightgrey;
		}
		
		.btn{
			margin: 2% 30%;
		}
	
	</style>  

</head>
<body>
<div class="row">
	<div name="lado1" class="col-md-4 col-xs-2">
	
<a href="opcoes.php">
<button style="border:none;background-color:lightgrey;float:right;;margin-top:15px"><span class="glyphicon glyphicon-menu-left" style="font-size:30px;color:#34475c;background-color:lightgrey;border:none;"></span></button>
</a>
	</div>
	<div class="col-md-4 col-xs-8" style="">
		<h1 >REGISTRO DE ACOMPANHAMENTO</h1>
		
		
		<br>
	</div>
	<div  class="col-md-1 col-xs-2 ">
	</div>
	<div class="col-md-3"></div>
</div>

<form class="form-group" method="post" action="salva_acompanhamento.php">
<div name="lado1" class="col-md-4 col-xs-2"></div>
<div class="col-md-4 col-xs-12">
<div style="border: solid 1px;border-radius:15px; margin-right: 10px;margin-left:10px;padding:10px">
		<h3> Identificação Pessoal</h3><br>
		<label>Nome : '.$dados_paciente['nm_paciente'].'</label> 
		<label>Data de Nascimento : '.$dados_paciente['dt_nacimento'].'</label>     <label>Telefone : '.$dados_paciente['fone'].'</label><br>
		<label>Data de Inicio :'.$dados_paciente['data_registro'].'</label>  <label>Data de Termino:</label><input type="date" name="data_alta"><br>

</div>
<div name="lado1" class="col-md-4 col-xs-2"></div>

<div class="row">


<div class="col-md-4 col-xs-12"></div>
<div style="border: solid 1px;border-radius:15px; margin-right: 10px;margin-left:10px;padding:10px">
<h3>Sintese das Sessões</h3>

<form class="form-group" method="post" action="salva_acompanhamento.php">
<label>Sessão - data:  </label> <input type="date" name="date_registro"><br>
<textarea name="sessao" placeholder="Escreva aqui ....." style="width:100%; height:100px; margin-top:20px"></textarea>

<button name="cd_paciente" class="btn btn-primary" value="'.$dados_paciente['cd_paciente'].'" style="margin:10px 40%"><span class="glyphicon glyphicon-ok"> Salvar</span></button>
</form>
</div>
</div>



</div>




</body>
</html>';




















?>