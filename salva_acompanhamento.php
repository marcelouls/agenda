<?php

require_once('db.class.php');

$cd_paciente = isset($_POST['cd_paciente']) ? $_POST['cd_paciente']: "";
$date_registro = isset($_POST['date_registro']) ? $_POST['date_registro']: "";
$data_alta = isset($_POST['data_alta']) ? $_POST['data_alta']: "";
$sessao = isset($_POST['sessao']) ? $_POST['sessao']: "";


$objDb = new db();
$link = $objDb-> conecta_mysql();

$sql = "INSERT INTO acompanhamento(cd_paciente,date_registro,data_alta, sessao)VALUES($cd_paciente,'$date_registro','$data_alta', upper('$sessao'))";

$registra_acompanhamento= mysqli_query($link,$sql);

header('Location:opcoes.php');





?>
