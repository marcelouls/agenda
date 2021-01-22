<?php

session_start();

require_once('db.class.php');


$nome 			=$_POST['nome'];
$data 			=isset($_POST['data']) ? $_POST['data'] :"";
$estadoCivil = isset($_POST['estadoCivil']) ? $_POST['estadoCivil'] :"";
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] :"";
$cidade 		=isset($_POST['cidade']) ? $_POST['cidade'] :"";
$profissao 		=isset($_POST['profissao']) ? $_POST['profissao'] :"";
$religao 		=isset($_POST['religao']) ? $_POST['religao'] :"";
$escolaridade 	=isset($_POST['escolaridade']) ? $_POST['escolaridade'] :"";
$telefone 		=isset($_POST['telefone']) ? $_POST['telefone']:"";
$email 			=isset($_POST['email']) ? $_POST['email'] :"";
$nomePai		=isset($_POST['nomePai']) ? $_POST['nomePai'] :"";
$idadePai 		=isset($_POST['idadePai']) ? $_POST['idadePai'] :"";
$escolaridadePai=isset($_POST['escolaridadePai']) ? $_POST['escolaridadePai'] :"";
$profissaPai	=isset($_POST['profissaPai']) ? $_POST['profissaPai'] :"";
$nomeMae 		=isset($_POST['nomeMae']) ? $_POST['nomeMae']:"";
$idadeMae 		=isset($_POST['idadeMae']) ? $_POST['idadeMae'] :"";
$escolaridadeMae=isset($_POST['escolaridadeMae']) ? $_POST['escolaridadeMae'] :"";
$profissaMae 	=isset($_POST['profissaMae']) ? $_POST['profissaMae'] :"";



$sql_paciente = "INSERT INTO agenda.paciente(nm_paciente,dt_nacimento,estado_civil,endereco,cidade,profissao,religao,escolaridade,fone,email)values(upper('$nome'),'$data','$estadoCivil',upper('$endereco'),upper('$cidade'),upper('$profissao'),upper('$religao'),'$escolaridade','$telefone',upper('$email'))";



$objDb = new db();
$link = $objDb-> conecta_mysql();

$cadastra_paciente = mysqli_query($link,$sql_paciente);
//var_dump($cadastra_paciente);
// $cadastra_pais = mysqli_query($link,$sql_pais)


$consulta_cdpaciente = "SELECT cd_paciente,nm_paciente FROM paciente WHERE nm_paciente = '$nome' AND dt_nacimento = '$data' AND estado_civil = '$estadoCivil' AND endereco = '$endereco' AND cidade = '$cidade' AND profissao = '$profissao' AND religao = '$religao' AND escolaridade = '$escolaridade' AND fone = '$telefone' AND email = '$email' ";


$codigopaciente = mysqli_query($link,$consulta_cdpaciente);

$dados = mysqli_fetch_array($codigopaciente);

$cd_paciente = $dados['cd_paciente'];
$nm_paciente = $dados['nm_paciente'];

// echo '<br>';
// echo $cd_paciente;
// echo '<br>';
// echo $consulta_cdpaciente;
// echo '<br>';
// var_dump($consulta_cdpaciente);
// echo '<br>';
// echo 'AQUI VA - '.$dados['cd_paciente'].' - HASTA AQIO';
// echo '<br>';
// var_dump($dados);

$sql_pais = "INSERT INTO agenda.pais_paciente(cd_paciente,nm_pai,idade_pai,escolaridade_pai, profissao_pai,nm_mae,idade_mae, escolaridade_mae,profissao_mae)VALUES($cd_paciente,'$nomePai','$idadePai','$escolaridadePai','$profissaPai','$nomeMae','$idadeMae','$escolaridadeMae','$profissaMae')";

$cadastro_pais = mysqli_query($link,$sql_pais);
// echo '<br>';
// var_dump($sql_pais);
// echo '<br>';
// var_dump($cadastro_pais);


// var_dump($sql_ficha);
// echo '<br>';
//var_dump($cadastro_ficha);	


//header('Location: anamnese.html?mensagem=1');

$teste=2;

if ($cadastra_paciente) {
echo	'<!DOCTYPE html>
<html>
<head lang="pt-br">
	<title>Anamnese</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
  	</script>	
	<style>
	body{
		background:lightgrey;
	}
	h1{
		color:blue;
	}
	#aviso{
	background:white;
	margin:20% 25% 0 25%;
    }
    button{
    margin: 0 50% ;
    }
    p{
    	color: #0a7b8c;
    	text-align:center;
    }

	</style>
</head>
<body >
<div class="row">
	  <div class="col-md-3 col-xs-3">
	  <a href="opcoes.php">
	  <button style="border:none;background-color:lightgrey;float:right;;margin-top:15px"><span class="glyphicon glyphicon-menu-left" style="font-size:30px;color:#34475c;background-color:lightgrey;border:none;"></span></button>
		</a>
	  </div>
	<div class="col-md-6 col-xs-6">
    <h2 style="color:#d13d04; text-align: center"><br><br></h2>
  </div>
  
  <div class="col-md-3 col-xs-3">
			</div>
		</a>
		</div>
  </div>
<div class="row">
<div class="col-md-4"></div>
<div id="aviso" class="col-md-4">
<p> Paciente <strong>N°'.$cd_paciente.'</strong></p>
<p><strong>'.$nm_paciente.'</strong></p>
<p>Salvo com sucesso!</p>

</div>
<div class="col-md-4"></div>
</div>

</body>
</html>';
	# code...
}else{
echo	'<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>teste errado</h1>
</body>
</html>';

}



?>