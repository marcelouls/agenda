<?php

session_start();

require_once('db.class.php');


$cd_paciente    =isset($_POST['cd_paciente']) ? $_POST['cd_paciente'] : "";
$nome 			=isset($_POST['nome']) ? $_POST['nome'] : "";
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
$queixa_principal=isset($_POST['queixa_principal']) ? $_POST['queixa_principal'] :"";
$como_comecou 	=isset($_POST['como_comecou']) ? $_POST['como_comecou'] :"";
$repentino 		=isset($_POST['repentino']) ? $_POST['repentino'] :"";
$transformacoes =isset($_POST['transformacoes']) ? $_POST['transformacoes'] :"";
$sintomas 		=isset($_POST['sintomas']) ? $_POST['sintomas'] :"";
$integridade  	=isset($_POST['integridade']) ? $_POST['integridade'] :"";
$percepcao 		=isset($_POST['percepcao']) ? $_POST['percepcao'] :"";
$atencao 		=isset($_POST['atencao']) ? $_POST['atencao'] :"";
$memoria 		=isset($_POST['memoria']) ? $_POST['memoria'] :"";
$queixas_congnitivas =isset($_POST['queixas_congnitivas']) ? $_POST['queixas_congnitivas'] :"";
$volicao  		=isset($_POST['volicao']) ? $_POST['volicao'] :"";
$afeto 			=isset($_POST['afeto']) ? $_POST['afeto'] :"";
$humor 			=isset($_POST['humor']) ? $_POST['humor'] :"";
$ansiedade 		=isset($_POST['ansiedade']) ? $_POST['ansiedade'] :"";
$medo 			=isset($_POST['medo']) ? $_POST['medo'] :"";
$culpa 			=isset($_POST['culpa']) ? $_POST['culpa'] :"";
$raiva 			=isset($_POST['raiva']) ? $_POST['raiva'] :"";
$luto 			=isset($_POST['luto']) ? $_POST['luto'] :"";
$desanimo 		=isset($_POST['desanimo']) ? $_POST['desanimo'] :"";
$Afetivo_emocionais =isset($_POST['Afetivo_emocionais']) ? $_POST['Afetivo_emocionais'] :"";
$habitos 		=isset($_POST['habitos']) ? $_POST['habitos'] :"";
$vida_social 	=isset($_POST['vida_social']) ? $_POST['vida_social'] :"";
$saude 			=isset($_POST['saude']) ? $_POST['saude'] :"";
$antecedentes 	=isset($_POST['antecedentes']) ? $_POST['antecedentes'] :"";
$historia  		=isset($_POST['historia']) ? $_POST['historia'] :"";
$tratamento		=isset($_POST['tratamento']) ? $_POST['tratamento'] :"";





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

//$sql_pais = "INSERT INTO agenda.pais_paciente(cd_paciente,nm_pai,idade_pai,escolaridade_pai, profissao_pai,nm_mae,idade_mae, escolaridade_mae,profissao_mae)VALUES($cd_paciente,'$nomePai','$idadePai','$escolaridadePai','$profissaPai','$nomeMae','$idadeMae','$escolaridadeMae','$profissaMae')";

//$cadastro_pais = mysqli_query($link,$sql_pais);
// echo '<br>';
// var_dump($sql_pais);
// echo '<br>';
// var_dump($cadastro_pais);
require_once('db.class.php');
$objDb = new db();
$link = $objDb-> conecta_mysql();

$sql_ficha = "INSERT INTO agenda.anamnese(cd_paciente,queixa_principal,como_comecou,repentino,transformacoes,sintomas, sn_integridade,sn_percepcao,sn_atencao,sn_memoria,queixa_cognitiva,sn_volicao,sn_afeto,sn_humor,sn_ansiedade,sn_medo,sn_culpa,sn_raiva,sn_luto,sn_desanimo,queixa_afetiva_emocional,habitos_rotina,vida_social,saude,antecedentes_familiares,historia_familiar,tratamento)VALUES($cd_paciente,'$queixa_principal','$como_comecou', '$repentino','$transformacoes','$sintomas','$integridade','$percepcao','$atencao','$memoria','$queixas_congnitivas','$volicao','$afeto','$humor','$ansiedade','$medo','$culpa','$raiva','$luto','$desanimo','$Afetivo_emocionais','$habitos','$vida_social','$saude','$antecedentes','$historia','$tratamento')";	

$cadastro_ficha = mysqli_query($link,$sql_ficha);
// echo '<br>';
// var_dump($sql_ficha);
// echo '<br>';
//var_dump($cadastro_ficha);	


//header('Location: anamnese.html?mensagem=1');

//$objDb = new db();
//$link = $objDb-> conecta_mysql();


//var_dump($cadastra_paciente);
// $cadastra_pais = mysqli_query($link,$sql_pais)

$consulta_cdpaciente = "SELECT cd_paciente,nm_paciente FROM paciente WHERE cd_paciente = $cd_paciente ";


$codigopaciente = mysqli_query($link,$consulta_cdpaciente);

$dados = mysqli_fetch_array($codigopaciente);

$cd_paciente = $dados['cd_paciente'];
$nm_paciente = $dados['nm_paciente'];

//$teste=2;

if ($cd_paciente) {
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