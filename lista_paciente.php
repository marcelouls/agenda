<?php

session_start();
/*
if(!isset($_SESSION['usuario'])){
		header('Location: agenda.php?erro=1');
}

require_once('db.class.php');
$pesquisa =isset($_POST['pesquisa']) ? $_POST['pesquisa']:"";
$sql_pacientes="SELECT * FROM PACIENTE WHERE nm_paciente LIKE '%$pesquisa%'";

$objDb = new db();
$link = $objDb -> conecta_mysql();

$lista = mysqli_query($link,$sql_pacientes);
*/

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
$pesquisa =isset($_POST['pesquisa']) ? $_POST['pesquisa']:"";
$sql_pacientes="SELECT * FROM paciente WHERE nm_paciente LIKE '%$pesquisa%'";

$objDb = new db();
$link = $objDb -> conecta_mysql();

$lista = mysqli_query($link,$sql_pacientes);

echo '<!DOCTYPE html>
<html>
<head lang="pt-br">
	<title>Menu</title>
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
    #lista{
    background:white;
    margin-top:20px;
    padding:10px;
    margin-left:10px;
    margin-right:10px;
   
	}
	hr{
		color:black;
	}
	
	button{
		margin: 0 35% 10px;
	}

	
	</style>

</head>
<body >

<div class="container" style="padding:10px">
<div class="row">
<div class="col-md-3 col-xs-3">
<a href="opcoes.php">
			<button style="border:none;background-color:lightgrey;float:right;;margin-top:15px"><span class="glyphicon glyphicon-menu-left" style="font-size:30px;color:#34475c;background-color:lightgrey;border:none;"></span></button>
		</div>
<div class="col-md-6 col-xs-6"><h1>Pacientes</h1></div>
<div class="col-md-3 col-xs-3"></div>
			</div>
		</a>
</div>
<div class="row">
	<div class="col-md-5 col-xs-2"></div>
	<div class="col-md-2 col-xs-8">
	<a href="anamnese.php">
	<button class="btn btn-primary">Novo</button>
	</a>
	</div>
	<div class="col-md-5 col-xs-2"></div>
</div>

<div class="row" style="margin-top:20px">
	<div class="col-md-4"></div>
	<div class="container col-md-4" style="padding:1px">	
	<div class="col-md-2 col-xs-2">
	<label>Nome:</label>
	<div class="col-md-4"></div>
	</div>
	<div class="col-md-8 col-xs-8">
	<form method="post" action="lista_paciente.php">
	<input type="text" name="pesquisa" style="width:100%" />
	
	</div>
	<div class="col-md-2 col-xs-2">
	<button class="btn btn-primary" style="float:right;"><span class="glyphicon glyphicon-search"></span></button>
	</form>
	</div>
	</div>
</div>







<div class="row" style="padding:10px;margin-left:10px;margin-right:10px">
<div class="col-md-4"></div>
<div class=" col-md-4 col-xs-12" style="border:solid 1px;border-radius:15px;background:lightgrey;text-align:justify">

';



	while ($lista_pacientes = mysqli_fetch_array($lista,MYSQLI_ASSOC)) {

		echo '<p style="color:#34475c">&nbsp cod: '.$lista_pacientes['cd_paciente'].' - &nbsp&nbsp&nbsp'.$lista_pacientes['nm_paciente'].'        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>Fone : '.$lista_pacientes['fone'].'</strong></p>';
		echo '<div class="row">';
		echo '<form class="col-md-4 col-xs-4" method="post" action="anamnese.php">';
		echo '<button name="cd_paciente" class="btn btn-primary btn-xs" value="'.$lista_pacientes['cd_paciente'].'">Anamnese</button>';
		echo '</form>';
		echo '<form class="col-md-4 col-xs-4" method="post" action="registro_acompanhamento.php">';
		echo '<button name="cd_paciente" class="btn btn-primary btn-xs" value="'.$lista_pacientes['cd_paciente'].'">Atender</button>';
		echo '</form>';
		echo '<form class="col-md-4 col-xs-4" method="post" action="sessoes.php">';
		echo '<button name="cd_paciente" class="btn btn-primary btn-xs" value="'.$lista_pacientes['cd_paciente'].'" style="float:right">Sessoes</button>';
		echo '</form>';
		echo '</div>';
		echo '<hr style="border:solid 1px">';

		
	};
	echo '

	
	</div>
	<div class="col-md-2"></div>
	</div>

	</div>
	
<div class="col-md-4"></div>

</body>
</html>';






?>
