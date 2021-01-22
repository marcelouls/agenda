<?php

session_start();

require_once('db.class.php');

$usuario  = $_SESSION['usuario'];
$cod_registro=  $_POST['cod_registro'];
$valor_cobrado= $_POST['valor_cobrado'];
$valor_pago=    $_POST['valor_pago'];
$sn_pago=       $_POST['sn_pago'];
$forma_pago=    $_POST['forma_pago'];


$sql = "UPDATE acompanhamento set valor_cobrado = $valor_cobrado,valor_pago=$valor_pago,sn_pago='$sn_pago',forma_pago='$forma_pago' WHERE cod_registro = $cod_registro";



$objDb = new db();
$link = $objDb-> conecta_mysql();

$consulta_vazia = mysqli_query($link,$sql);

echo 'cod_registro=> '.$cod_registro;
	header('Location: lista_paciente.php');
	
	

 


?>