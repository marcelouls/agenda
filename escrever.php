<?php

session_start();

require_once('db.class.php');

$usuario  = $_SESSION['usuario'];


$data 		= $_POST['data'];
$hora_inicio = $_POST['hora_inicio'];

$tipo		= $_POST['tipo'];
$detalhe	= $_POST['detalhe'];
$fone		= $_POST['fone'];
$local		= $_POST['local'];


$sql1 = "SELECT * FROM agenda.escreve_evento WHERE data_agenda = '$data' AND hora_inicio = '$hora_inicio'";
$objDb = new db();
$link = $objDb-> conecta_mysql();

$consulta_vazia = mysqli_query($link,$sql1);

$dados = mysqli_fetch_array($consulta_vazia);

echo '<p> TESTE  - '.$dados['detalhe'].'</p>';

if (isset($dados['detalhe'])) {

	echo '<h1>ESTA LA CGD</h1>';
	header('Location: detalhe.php?calendario='.$data);


	
}else{

	
	 $sql = "INSERT INTO agenda.escreve_evento(data_agenda,hora_inicio, tipo, detalhe,fone, local, usuario)values('$data','$hora_inicio','$tipo', '$detalhe', '$fone','$local','$usuario')";

$objDb = new db();
$link = $objDb-> conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

		
	header('Location: detalhe.php?calendario='.$data);
	echo '<p> TESTE  - '.$dados['detalhe'].'</p>';
	
}
 


?>