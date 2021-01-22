<?php

session_start();

require_once('db.class.php');

$usuario  = isset($_POST['usuario']) ? $_POST['usuario']: "";
$senha = isset($_POST['senha'])? $_POST['senha']: "";


 
$sql = " SELECT * FROM user_agenda WHERE usuario = '$usuario' AND senha = '$senha'";

$objDb = new db();
$link = $objDb-> conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

if ($resultado_id) {
	$dados_usuario = mysqli_fetch_array($resultado_id);
	var_dump($resultado_id);
	
	if(isset($dados_usuario['usuario'])){
		$_SESSION['cod_usuario'] = $dados_usuario['cod_usuario'];
		$_SESSION['usuario'] = $dados_usuario['usuario'];
		$_SESSION['nivel'] = $dados_usuario['nivel'];
		header('Location: opcoes.php');
	}else{
		header('Location: user_agenda.php?erro=1');

	}
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';
	var_dump($resultado_id);

}


?>