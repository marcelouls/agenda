<?php

require_once('db.class.php');

$cod_evento = isset($_GET['cod_evento']) ? $_GET['cod_evento']: "";


     
$sql= "DELETE FROM escreve_evento  WHERE cod_evento = $cod_evento";

$objDb = new db();

$link = $objDb-> conecta_mysql();

$apaga_registro= mysqli_query($link, $sql);

echo '<p>aqui va el codigo'.$cod_evento;
echo '<br>';
echo '<p>no If</p>';
header('Location: detalhe.php');




?>

