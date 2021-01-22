<?php

session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: agenda.php?erro=1');
}



require_once('db.class.php');
$calendario = isset($_GET['calendario']) ?  $_GET['calendario'] : date("Y-m-d") ;

function detalhe(){
$calendario = isset($_GET['calendario']) ?  $_GET['calendario'] : date("Y-m-d") ;

$objDb = new db();
$link = $objDb-> conecta_mysql();

$sql="";
$hora="";

$contador=1;
$objDb = new db();
$link = $objDb-> conecta_mysql();
$h=1;
$inicio=7;
$fim=8;
$sql="";
$hora="";

while($contador<16){

	$sql = "SELECT * FROM escreve_evento WHERE hora_inicio = $h AND data_agenda ='$calendario'";
$hora= mysqli_query($link, $sql);

if ($hora) {
	$hora1 = mysqli_fetch_array($hora, MYSQLI_ASSOC);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';

	}
	    echo '<div class="row">';
		if (isset($hora1)) {
			echo '<div class="row">';
		echo '<div class="col-md-12 col-xs-12" style="border-bottom:  1px solid #591b03;">';
		echo '<strong>'.$inicio.':00 - '.$fim.':00</strong>';
			
			echo ' '.$hora1['detalhe']." - ".$hora1["local"] ; 
			echo '<form method="post" action="cancelar_registro.php">';	
			echo '<button type="button" class="btn-warning btn-xs" style="color:red;font-weight:bold;float:right;margin-left:5px" data-toggle="modal" data-target="#exampleModal">X</button>';
			echo '</form>';
			
			botao_atender();

			echo '</div>';
			echo '</div>';

			echo '<!--  MODAL -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
			  	<div class="col-md-3 col-xs-3></div>
				<h3 class="modal-title" id="exampleModalLabel">Tem certeza que quer apagar o registro?</h3><br><br>
				<p style="text-align:center; font-weight:bold; font-size:20px; color:#a33307">'.$hora1['detalhe'].'</p><br>
				<p style="text-align:center; font-weight:bold; font-size:20px; color:#a33307">'.date('d/m',strtotime($calendario)).' - '.$hora1['hora_inicio'].'</p><br>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;fdgsdfgdfgsdfgsdfg</span>
				</button>
			  </div>
			  <div class="modal-body">
				...
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
				
				<a href="cancelar_registro.php?cod_evento='.$hora1['cod_evento'].'">
				<button type="button"	 class="btn-primary" >Sim</button></a>
				
		
			  </div>
			</div>
		  </div>
		</div>';
			
		}else{
		echo '<div class="row">';
		echo '<div class="col-md-12 col-xs-12" style="border-bottom:  1px solid #591b03;">';
		echo '<strong>'.$inicio.':00 - '.$fim.':00</strong>';
		
	
			//botao_registrar();
			echo '<form method="get" action="registra_evento.php" style="display:inline">';
			$data = $calendario;
			
			echo '<input type=text name="detalhe" style="border:0; background-color:lightgrey;width:60%">';
			echo '<button class="btn-success btn-xs" style="float:right">Registrar</button>';
			echo '</form>';
			echo '</div>';
			echo '</div>';



				
		} 
	     echo '</div>';
		 $h++;
		 $inicio++;
		 $fim++;

$contador++;
}
}

function botao_atender(){
		
			
			echo '<form method="post" action="lista_paciente.php">';	
			echo '<button name="atender" class="btn-primary btn-xs"style="float:right">Atender</button>';
			echo '</form>';
	
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
  		
	  </style>
	  <script>

	  </script>
</head>
<body style="background:lightgrey ">
		<div class="row">
			<div class="col-md-4 col-xs-2">
			
				<a href="opcoes.php">
				<button style="border:none;background-color:lightgrey;float:right;;margin-top:15px"><span class="glyphicon glyphicon-menu-left" style="font-size:30px;color:#34475c;background-color:lightgrey;border:none;"></span></button>

			</div>
			<div class="col-md-4 col-xs-8">
				<form id="data_consulta" method="get" action="detalhe.php ">
					<input type="date" name="calendario">
					<?php 			
				echo '<p style="float:right; font-size:60px;color:#a33307 ">'.date('d/m',strtotime($calendario)).'</p>';
					?>
					<button style="border:none;background-color:lightgrey;margin-top:15px"><span class="glyphicon glyphicon-search" style="font-size:30px;color:#34475c;background-color:lightgrey;border:none"></span></button>
				</form>

		</div>
		<div class="col-md-4 col-xs-2">
			</div>
		</a>
			
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4" style="border:solid 1px; border-radius:15px; padding:10px 30px; margin: 0px 10px">
		<?php detalhe();?>
	</div>
	<div class="col-md-4"></div>

	
</body>
</html>

