<?php

session_start();

if(!isset($_SESSION['usuario'])){
		header('Location: agenda.php?erro=1');
}

require_once('db.class.php');

$calendario = isset($_GET['calendario']) ?  $_GET['calendario'] : date("Y-m-d") ;






$objDb = new db();
$link = $objDb-> conecta_mysql();




$sql1 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 1 AND data_agenda ='$calendario'";
$hora_1 = mysqli_query($link, $sql1);
if ($hora_1) {
	$hora1 = mysqli_fetch_array($hora_1);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}


$sql2 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 2 AND data_agenda ='$calendario'";
$hora_2 = mysqli_query($link, $sql2);
if ($hora_2) {
	$hora2 = mysqli_fetch_array($hora_2);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql3 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 3 AND data_agenda ='$calendario'";
$hora_3 = mysqli_query($link, $sql3);
if ($hora_3) {
	$hora3 = mysqli_fetch_array($hora_3);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql4 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 4 AND data_agenda ='$calendario'";
$hora_4 = mysqli_query($link, $sql4);
if ($hora_4) {
	$hora4 = mysqli_fetch_array($hora_4);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql5 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 5 AND data_agenda ='$calendario'";
$hora_5 = mysqli_query($link, $sql5);
if ($hora_5) {
	$hora5 = mysqli_fetch_array($hora_5);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql6 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 6 AND data_agenda ='$calendario'";
$hora_6 = mysqli_query($link, $sql6);
if ($hora_6) {
	$hora6 = mysqli_fetch_array($hora_6);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql7 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 7 AND data_agenda ='$calendario'";
$hora_7 = mysqli_query($link, $sql7);
if ($hora_7) {
	$hora7 = mysqli_fetch_array($hora_7);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql8 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 8 AND data_agenda ='$calendario'";
$hora_8 = mysqli_query($link, $sql8);
if ($hora_8) {
	$hora8 = mysqli_fetch_array($hora_8);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql9 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 9 AND data_agenda ='$calendario'";
$hora_9 = mysqli_query($link, $sql9);
if ($hora_9) {
	$hora9 = mysqli_fetch_array($hora_9);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql10 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 10 AND data_agenda ='$calendario'";
$hora_10 = mysqli_query($link, $sql10);
if ($hora_10) {
	$hora10 = mysqli_fetch_array($hora_10);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql11 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 11 AND data_agenda ='$calendario'";
$hora_11 = mysqli_query($link, $sql11);
if ($hora_11) {
	$hora11 = mysqli_fetch_array($hora_11);	
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql12 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 12 AND data_agenda ='$calendario'";
$hora_12 = mysqli_query($link, $sql12);
if ($hora_12) {
	$hora12 = mysqli_fetch_array($hora_12);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql13 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 13 AND data_agenda ='$calendario'";
$hora_13 = mysqli_query($link, $sql13);
if ($hora_13) {
	$hora13 = mysqli_fetch_array($hora_13);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql14 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 14 AND data_agenda ='$calendario'";
$hora_14 = mysqli_query($link, $sql14);
if ($hora_4) {
	$hora14 = mysqli_fetch_array($hora_14);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

$sql15 = "SELECT detalhe, local FROM escreve_evento WHERE hora_inicio = 15 AND data_agenda ='$calendario'";
$hora_15 = mysqli_query($link, $sql15);
if ($hora_15) {
	$hora15 = mysqli_fetch_array($hora_15);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);
}

function botao_atender(){
			echo '<div style="display:inline">';
			echo '<form method="post" action="registro_acompanhamento.php">';	
			echo '<button name="cancelar" class="btn-warning btn-xs" style="float:right">Cancelar</button>';
			echo '<button name="atender" class="btn-primary btn-xs"style="float:right">Atender</button>';
			echo '</form>';
			echo '</div>';

}

function botao_registrar(){
			echo '<div style="display:inline">';
			echo '<form method="post" action="registra_evento.php" style="display:inline">';
			echo '<input type=text name="reg_novo" style="border:0; background-color:lightgrey;width:60%">';
			echo '<button class="btn-success btn-xs" style="float:right" >Registrar</button>';
			echo '</form>';
			echo '</div>';

}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Agenda</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<!-- <link rel="stylesheet" type="text/css" href="css/amet.css"> -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<script type="text/javascript"></script>
  	<style type="text/css">
  		span {
  			color:#a33307;
  			font-weight: bold

  		}

  		input{
  			margin-top: 25px;
  			margin-bottom: 5px;
  		}
  		button{
  			margin-left:  5px;
  		}
  	</style>
</head>
<body style="background:lightgrey ">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 col-xs-8">
			<form id="data_consulta" method="get" action="detalhe.php">
			<input type="date" name="calendario">
			<?php 
			
			echo '<p style="float:right; font-size:60px;color:#a33307 ">'.date('d/m',strtotime($calendario)).'</p>';

		
			?>
			<button ><span class="glyphicon glyphicon-search" style="font-size:30px;color:#34475c"></span></button>
			
			</form>
			<!-- <a href="registra_evento.php">
			<button class="button btn-warning" ><span class="glyphicon glyphicon-ok">  Ingresar</span></button>
			</a> -->
		</div>
		<!-- <div class="col-md-6 col-xs-6">
			<h1 style="text-align: right;"></h1>
			<br><br><br>
		</div> -->
		<div class="col-md-2"></div>
	</div>
	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		
		<strong>07:00 - 08:00 <?php if (isset($hora1)) {
			
			echo $hora1['detalhe']." - ".$hora1["local"] ; 
			botao_atender();
			
		}else{
			
			
			botao_registrar();
			
		} ?><strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>08:00 - 09:00 </strong><?php if (isset($hora2)) {
			
			    echo $hora2['detalhe']." - ".$hora2["local"];
			    botao_atender();
			
			
		}else{
			
			botao_registrar();
			
		} ?>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="display:inline;border-bottom:  1px solid #591b03">
		
		<strong>09:00 - 10:00 <?php if (isset($hora3)) {
			echo '<strong>'.$hora3['detalhe']." - ".$hora3["local"].'</strong>';
			botao_atender();
			
		}else{ 
			
			botao_registrar();
			
		} ?></strong>
		
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<p>10:00 - 11:00 <?php if (isset($hora4)) {
			
			echo $hora4['detalhe']." - ".$hora4["local"] ; 
			botao_atender();
			
		}else{
			
		
			botao_registrar();
			
		} ?></strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>11:00 - 12:00 <?php if (isset($hora5)) {
			
			echo $hora5['detalhe']." - ".$hora5["local"] ; 
			botao_atender();
			
		}else{
			
			botao_registrar();
			
		} 
		?></strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>12:00 - 13:00 <?php if (isset($hora6)) {
			
			echo $hora6['detalhe']." - ".$hora6["local"] ;
			botao_atender(); 
			
		}else{
			
			
			botao_registrar();
			
		} ?></strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>13:00 - 14:00 <?php if (isset($hora7)) {
			
			echo $hora7['detalhe']." - ".$hora7["local"] ; 
			botao_atender();
			
		}else{
			
			
			botao_registrar();
			
		} ?></strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>14:00 - 15:00 <?php if (isset($hora8)) {
			
			echo $hora8['detalhe']." - ".$hora8["local"] ; 
			botao_atender();
			
		}else{
			
			
			botao_registrar();
			
		} ?></strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>15:00 - 16:00 <?php if (isset($hora9)) {
			
			echo $hora9['detalhe']." - ".$hora9["local"] ; 
			botao_atender();
			
		}else{
			
			
			botao_registrar();
			
		} ?></strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>16:00 - 17:00 <?php if (isset($hora10)) {
			
			echo $hora10['detalhe']." - ".$hora10["local"] ; 
			botao_atender();
			
		}else{
		
			botao_registrar();
			
		} ?></strong>

	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>17:00 - 18:00 <?php if (isset($hora11)) {
			
			echo $hora11['detalhe']." - ".$hora11["local"] ; 
			botao_atender();
			
		}else{
			
			
			botao_registrar();
			
		} ?></strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>18:00 - 19:00 <?php if (isset($hora12)) {
			
			echo $hora12['detalhe']." - ".$hora12["local"] ; 
			botao_atender();
			
		}else{
			
			
			botao_registrar();
			
		} ?></strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>19:00 - 20:00 <?php if (isset($hora13)) {
			
			echo $hora13['detalhe']." - ".$hora13["local"] ; 
			botao_atender();
			
		}else{
			
			
			botao_registrar();
			
		} ?></strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>20:00 - 21:00 <?php if (isset($hora14)) {
			
			echo $hora14['detalhe']." - ".$hora14["local"] ; 
			botao_atender();
			
		}else{
			
			
			botao_registrar();
			
		} ?></strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	<div class="row">
	<div class="col-md-2"></div>
	<div class=" col-md-8 col-xs-12" style="border-bottom:  1px solid #591b03">
		<strong>21:00 - 22:00 <?php if (isset($hora15)) {
			
			echo $hora15['detalhe']." - ".$hora15["local"] ; 
			botao_atender();
			
		}else{
			
			botao_registrar();
			
		} ?></strong>
	</div>
	<div class="col-md-2"></div>
	</div>

	


</body>
</html>

