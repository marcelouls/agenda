<?php


session_start();

require_once('db.class.php');
	$objDb = new db();
    $link = $objDb-> conecta_mysql();
	$sql_usuario = "SELECT * FROM user_agenda where usuario = '".$_SESSION['usuario']."'";
	//var_dump($sql_usuario);
	$nivel= mysqli_query($link, $sql_usuario);

	$permissao = mysqli_fetch_array($nivel, MYSQLI_ASSOC);
	//echo $_SESSION['usuario'];
	//echo 'nivel =>'.$permissao['nivel'];

if(!isset($_SESSION['usuario'])){

		echo "<script>alert('Você não tem permissao - fale com o administrador do site')</script>";
		header('Location: agenda.php?erro=1');
}else{
	 if($permissao['nivel']==9){
		

	 }else{
		echo "<script>alert('Acesso restrito Psicologo');          
			 </script>";
		echo "<script> window.location.href='opcoes.php';          
		</script>";
		
	 }

}


require_once('db.class.php');

$cd_paciente   = isset($_POST['cd_paciente']) ? $_POST['cd_paciente']: "";


$sqla = "SELECT * FROM anamnese where cd_paciente = $cd_paciente";

$objDb = new db();
$link = $objDb-> conecta_mysql();

$consulta=mysqli_query($link, $sqla); 

$anamnese = mysqli_fetch_array($consulta);

if($anamnese){

	require_once('db.class.php');

$cd_paciente   = isset($_POST['cd_paciente']) ? $_POST['cd_paciente']: "";
$nm_paciente   = isset($_POST['nm_paciente']) ? $_POST['nm_paciente']: "";
$dt_nacimento= isset($_POST['dt_nacimento']) ? $_POST['dt_nacimento']: "";
$fone          = isset($_POST['fone']) ? $_POST['fone']: "";
$data_registro = isset($_POST['data_registro']) ? $_POST['data_registro']: "";


$sql = "SELECT * FROM paciente p, anamnese a where a.cd_paciente = $cd_paciente and a.cd_paciente = p.cd_paciente";

$objDb = new db();
$link = $objDb-> conecta_mysql();

$consulta=mysqli_query($link, $sql); 

$dados_paciente = mysqli_fetch_array($consulta);

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

<div class="row">
<div class="col-md-4 col-xs-3">
<a href="opcoes.php">
	<button style="border:none;background-color:lightgrey;float:right;margin-top:15px">
	<span class="glyphicon glyphicon-menu-left" style="float:left;font-size:30px;color:#34475c;background-color:lightgrey;border:none;">
	</span></button></div></a>
<div class="col-md-4 col-xs-6">
<h1>Anamnese</h1></div>
<div class="col-md-1 col-xs-3">
	
	</div>
	</div>
	</div>

<div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-4 col-xs-12">
        <div style="border: solid 1px;border-radius:15px; padding:10px">
		    <h3 > Identificação Pessoal</h3><br>
		    <label>Nome : '.$dados_paciente['nm_paciente'].'</label> 
		    <label>Data de Nascimento : '.$dados_paciente['dt_nacimento'].'</label>     <label>Telefone : '.$dados_paciente['fone'].'</label><br>
		    <label>Data de Inicio :'.$dados_paciente['data_registro'].'</label><br>
		</div>
	</div>
	<div  class="col-md-4"></div>
</div>
<br>
<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Queixa Principal</h4><br>
	'; echo $dados_paciente['queixa_principal']; 
	echo'
		</div>	
		<div class="col-md-4 col-xs-1"></div>
</div>


<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Como comecou</h4><br>
		'; echo $dados_paciente['como_comecou'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Foi repentino ou gradual?</h4><br>
		'; echo $dados_paciente['repentino'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Quais transformações ocorreram:</h4><br>
		'; echo $dados_paciente['transformacoes'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Sintomas :</h4><br>
		'; echo $dados_paciente['sintomas'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Queixas cognitivas: </h4><br>
			<ul>
				<li>Integridade Sensorial : '.$dados_paciente['sn_integridade'].'</li>
				<li>Percepção : '.$dados_paciente['sn_percepcao'].'</li>
				<li>Atenção : '.$dados_paciente['sn_atencao'].'</li>
				<li>Memória : '.$dados_paciente['sn_memoria'].'</li>
			</ul>
		'; echo $dados_paciente['queixa_cognitiva'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Queixas Afetiva Emocionais: </h4><br>
			<ul>
				<li>Volicao : '.$dados_paciente['sn_volicao'].'</li>
				<li>Afeto : '.$dados_paciente['sn_afeto'].'</li>
				<li>Humor : '.$dados_paciente['sn_humor'].'</li>
				<li>Medo : '.$dados_paciente['sn_medo'].'</li>
				<li>Ansiedade : '.$dados_paciente['sn_ansiedade'].'</li>
				<li>Culpa : '.$dados_paciente['sn_culpa'].'</li>
				<li>Raiva : '.$dados_paciente['sn_raiva'].'</li>
				<li>Luto : '.$dados_paciente['sn_luto'].'</li>
				<li>Desanimo : '.$dados_paciente['sn_desanimo'].'</li>
			</ul>
		'; echo $dados_paciente['queixa_afetiva_emocional'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Habitos e Rotina:</h4><br>
		'; echo $dados_paciente['habitos_rotina'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Vida Social:</h4><br>
		'; echo $dados_paciente['vida_social'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Como esta a saúde:</h4><br>
		'; echo $dados_paciente['saude'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Antecedentes Familiares (Casos semelhantes na familia) :</h4><br>
		'; echo $dados_paciente['antecedentes_familiares'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>História Familiar :</h4><br>
		'; echo $dados_paciente['historia_familiar'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border: solid 1px;border-radius:15px; padding:10px">
			<h4>Tratamento :</h4><br>
		'; echo $dados_paciente['tratamento'];
		echo'
		</div>
		<div class="col-md-4 col-xs-1"></div>
</div>


		
 
</body>
</html>';

}else{

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
	  '; echo "<script>alert('Paciente ainda sem Anamnese preenchido');</script>";
	  
	  echo'	
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
	#codpac{
		width: 40px;
	}

	</style>
</head>
<body>
<div class="row">

<div class="row">
<div class="col-md-4 col-xs-3">
<a href="opcoes.php">
	<button style="border:none;background-color:lightgrey;float:right;margin-top:15px">
	<span class="glyphicon glyphicon-menu-left" style="float:left;font-size:30px;color:#34475c;background-color:lightgrey;border:none;">
	</span></button></div></a>
<div class="col-md-4 col-xs-6">
<h1>Anamnese</h1></div>
<div class="col-md-1 col-xs-3">
	
	</div>
	</div>




    <div class="col-md-4"></div>

	<div class="col-md-4 col-xs-12">
	<form method="post" action="salva_anamnese.php">
        <div style="border: solid 1px;border-radius:15px; padding:10px">
			<h3 > Identificação Pessoal</h3><br>
			<label> Cod. Paciente:</label><input id="codpac"  type="text" name="cd_paciente" value="'.$dados_paciente['cd_paciente'].'" >
		    <label>Nome : '.$dados_paciente['nm_paciente'].'</label> 
		    <label>Data de Nascimento : '.$dados_paciente['dt_nacimento'].'</label>     <label>Telefone : '.$dados_paciente['fone'].'</label><br>
		    <label>Data de Inicio :'.$dados_paciente['data_registro'].'</label><br>
		</div>
	</div>
	<div  class="col-md-4"></div>
</div>
	<br>
	<div class="col-md-4"></div>
<div class="container col-md-4" style="border: solid 1px;border-radius:15px; padding:10px>
	<div class="row">
			<br>
			<div class="col-md-12 col-xs-12">	
			
 				<div class="panel-group">
    				<div class="panel panel-default">
    					<div class="panel-heading">
							<h2 class="panel-title">
							<a data-toggle="collapse" href="#collapse3">Queixa Principal:</a>
							</h2>
								<div id="collapse3" class="panel-collapse collapse">
									<textarea name="queixa_principal" placeholder="Queixa Principal" maxlength="300"></textarea>
 								</div>
						</div>
				</div>
			</div>
	
	</div>
	<div class="col-md-4"></div>	
<br><br><br>
</div>
</div>
<div class="col-md-4"></div>
<div class="container col-md-4" style="border: solid 1px;border-radius:15px; padding:10px>

	<div class="row">
		
		<div class="col-md-12" col-xs-12>
		<br><br>
 			<div class="panel-group">
    		<div class="panel panel-default">
    		<div class="panel-heading">
				<h2 class="panel-title">
			<a data-toggle="collapse" href="#collapse4">Evolução da Queixa:</a>
				</h2>
			<div id="collapse4" class="panel-collapse collapse">
	
			<br>
			<a data-toggle="collapse" href="#collapse5"><label>Como começõu:</label></a><br>
			<div id="collapse5" class="panel-collapse collapse">
			<textarea name="como_comecou" placeholder="Escreva aqui...." maxlength="300"></textarea>
		</div>
		<a data-toggle="collapse" href="#collapse6"><label>Foi repentino ou gradual:</label></a><br>
		<div id="collapse6" class="panel-collapse collapse">
			<textarea name="repentino" placeholder="Escreva aqui...." maxlength="300"></textarea><br>
		</div>
		<a data-toggle="collapse" href="#collapse7"><label>Quais transformações ocorreram:</label></a><br>
		<div id="collapse7" class="panel-collapse collapse">
			<textarea name="transformacoes" placeholder="Escreva aqui...." maxlength="200"></textarea><br>
		</div>
		<a data-toggle="collapse" href="#collapse8"><label>Sintomas:</label></a><br>
		<div id="collapse8" class="panel-collapse collapse">
			<textarea name="sintomas" placeholder="Escreva aqui...." maxlength="300"></textarea><br>
		</div>
		<a data-toggle="collapse" href="#collapse9"><label>Queixas Cognitivas:</label></a><br>
		<div id="collapse9" class="panel-collapse collapse">
			<input type="checkbox" name="integridade" value="S"><label>Integridade Sensorial</label>
			<input type="checkbox" name="percepcao" value="S"><label>Percepção</label>
			<input type="checkbox" name="atencao" value="S"><label>Atenção</label>
			<input type="checkbox" name="memoria" value="S"><label>Memória</label><br>
			<textarea name="queixas_congnitivas" placeholder="Escreva aqui...." maxlength="300"></textarea><br>
		</div>
		<a data-toggle="collapse" href="#collapse10"><label>Queixas Afetivo-emocionais:</label></a><br>
		<div id="collapse10" class="panel-collapse collapse">
			<input type="checkbox" name="volicao" value="S"><label>Volicao</label>
			<input type="checkbox" name="afeto" value="S"><label>Afeto</label>
			<input type="checkbox" name="humor" value="S"><label>Humor</label>
			<input type="checkbox" name="ansiedade" value="S"><label>Ansiedade</label>
			<input type="checkbox" name="medo" value="S"><label>Medo</label>
			<input type="checkbox" name="culpa" value="S"><label>Culpa</label>
			<input type="checkbox" name="raiva" value="S"><label>Raiva</label>
			<input type="checkbox" name="luto" value="S"><label>Luto</label>
			<input type="checkbox" name="desanimo" value="S"><label>Desanimo</label><br>
			<textarea name="Afetivo_emocionais" placeholder="Escreva aqui...." maxlength="300"></textarea><br>
		</div>
		<a data-toggle="collapse" href="#collapse11"><label>Hábitos e rotina:</label></a><br>
		<div id="collapse11" class="panel-collapse collapse">
			<textarea name="habitos"	placeholder="Escreva aqui...." maxlength="300"></textarea><br>
		</div>
		<a data-toggle="collapse" href="#collapse12"><label>Vida Social:</label></a><br>
		<div id="collapse12" class="panel-collapse collapse">
			<textarea name="vida_social" placeholder="Escreva aqui...." maxlength="300"></textarea><br>
		</div>
		<a data-toggle="collapse" href="#collapse13"><label>Como está a saúde:</label></a><br>
		<div id="collapse13" class="panel-collapse collapse">
			<textarea name="saude" 	 placeholder="Escreva aqui...." maxlength="300"></textarea><br>
		</div>
		<a data-toggle="collapse" href="#collapse14"><label>Antecedentes Familiares (Casos semelhantes na familia):</label></a>
		<br>
		<div id="collapse14" class="panel-collapse collapse">
			<textarea name="antecedentes" placeholder="Escreva aqui...."></textarea><br>
		</div>
		<a data-toggle="collapse" href="#collapse15"><label>História Familiar</label></a><br>
		<div id="collapse15" class="panel-collapse collapse">
			<textarea name="historia" placeholder="Escreva aqui...." maxlength="300"></textarea><br>
		</div>
		<a data-toggle="collapse" href="#collapse16"><label>Tratamento:</label></a><br>
		<div id="collapse16" class="panel-collapse collapse">
			<textarea name="tratamento" placeholder="Escreva aqui...." maxlength="300"></textarea><br>
		</div>

	</div>
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
<div class="col-md-4"></div>

</body>
</html>';

}
