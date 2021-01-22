<?php

session_start();

require_once('db.class.php');

$calendario = $_GET['calendario']= '2020-09-17';



 
$sql = " SELECT * FROM agenda.escreve_evento where data_agenda = '$calendario'";

$objDb = new db();
$link = $objDb-> conecta_mysql();

$resultado_id = mysqli_query($link, $sql);



if ($resultado_id) {
	$dados_usuario = mysqli_fetch_array($resultado_id);
	var_dump($resultado_id);
	
	if(isset($dados_usuario['usuario'])){
		
		$_SESSION['usuario'] = $dados_usuario['usuario'];
		echo $dados_usuario['detalhe'];
		
		echo $calendario;
		
		//header('Location: opcoes.php');
	}else{
		header('Location: user_agenda.php?erro=1');

	}
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);

}


?>