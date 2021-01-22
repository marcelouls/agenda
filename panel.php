<?php

require_once('db.class.php');

$cod_evento = isset($_POST['cod_evento']) ? $_POST['cod_evento']: "";

$date_inicio = isset($_POST['date_inicio']) ? $_POST['date_inicio']: "2020-01-01";
$date_final = isset($_POST['date_final']) ? $_POST['date_final']: "2030-01-01";

$p_total   = isset($_POST['p_total'])   ? $_POST['p_total']  : "";
$p_periodo = isset($_POST['p_periodo']) ? $_POST['p_periodo']: "";
$p_cobrar  = isset($_POST['p_cobrar'])  ? $_POST['p_cobrar'] : "";
$v_cobrar  = isset($_POST['v_cobrar'])  ? $_POST['v_cobrar'] : "";
$s_total   = isset($_POST['s_total'])   ? $_POST['s_total']  : "";
$s_periodo = isset($_POST['s_periodo']) ? $_POST['s_periodo']: "";
$s_cobrar  = isset($_POST['s_cobrar'])  ? $_POST['s_cobrar'] : "";
$v_recebido  = isset($_POST['v_recebido'])  ? $_POST['v_recebido'] : "";


$sql = "SELECT count(`cd_paciente`) as p_total FROM `paciente`"; 
$objDb = new db();
$link = $objDb-> conecta_mysql();
$result= mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
     $p_total = $row['p_total'];
 }

$sql2 = "SELECT count(`cod_registro`) as s_total FROM `acompanhamento`"; 
$objDb = new db();
$link = $objDb-> conecta_mysql();
$result1= mysqli_query($link,$sql2);
while($row1 = mysqli_fetch_array($result1)){
     $s_total = $row1['s_total'];
}

$sql3 = "SELECT count(`cd_paciente`) as p_periodo FROM paciente WHERE (data_registro BETWEEN '$date_inicio' AND '$date_final')"; 
$objDb = new db();
$link = $objDb-> conecta_mysql();
$result3= mysqli_query($link,$sql3);
while($row3 = mysqli_fetch_array($result3)){
     $p_periodo = $row3['p_periodo'];
 }

$sql4 = "SELECT count(`cod_registro`) as s_periodo FROM `acompanhamento` WHERE (date_registro BETWEEN '$date_inicio' AND '$date_final')"; 
$objDb = new db();
$link = $objDb-> conecta_mysql();
$result4= mysqli_query($link,$sql4);
while($row4 = mysqli_fetch_array($result4)){
     $s_periodo = $row4['s_periodo'];
}

$sql5 = "SELECT count(DISTINCT `cd_paciente`) as p_cobrar FROM `acompanhamento` WHERE sn_pago = 'N'"; 
$objDb = new db();
$link = $objDb-> conecta_mysql();
$result5= mysqli_query($link,$sql5);
while($row5 = mysqli_fetch_array($result5)){
     $p_cobrar = $row5['p_cobrar'];
}

$sql6 = "SELECT count( `cod_registro`) as s_cobrar FROM `acompanhamento` WHERE sn_pago = 'N'"; 
$objDb = new db();
$link = $objDb-> conecta_mysql();
$result6= mysqli_query($link,$sql6);
while($row6 = mysqli_fetch_array($result6)){
     $s_cobrar = $row6['s_cobrar'];
}

$sql7 = "SELECT sum( `valor_cobrado`) as v_cobrar FROM `acompanhamento` WHERE sn_pago = 'N'"; 
$objDb = new db();
$link = $objDb-> conecta_mysql();
$result7= mysqli_query($link,$sql7);
while($row7 = mysqli_fetch_array($result7)){
     $v_cobrar = $row7['v_cobrar'];
}

$sql8 = "SELECT sum(`valor_pago`) as v_recebido FROM `acompanhamento` WHERE sn_pago = 'S'"; 
$objDb = new db();
$link = $objDb-> conecta_mysql();
$result8= mysqli_query($link,$sql8);
while($row8 = mysqli_fetch_array($result8)){
     $v_recebido = $row8['v_recebido'];
}







?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <style>
          input{
              width: 100%;
              float: right;
          }
          .btn-default{
              margin: 2em 40%;
              background-color: #7385ec;
              color:hsl(240, 35%, 94%);
              border: none;
              box-shadow: 5px 5px #151b3d;
              border-radius: 20px;
          }
          .btn-default:hover{
            background-color: green;
              color:#bcfd78;
              transition: 0.3s;
              box-shadow: 5px 3px darkgreen;

          }
          label{
              color: white;
          }
         
        
      </style>
</head>

<body style="background: lightgrey; padding:10px ">

<div class="row">
<div class="col-md-3 col-xs-3"><a href="opcoes.php">
			<button style="border:none;background-color:lightgrey;float:right;;margin-top:15px"><span class="glyphicon glyphicon-menu-left" style="font-size:30px;color:#34475c;background-color:lightgrey;border:none;"></span></button>
			</a></div>
<div class="col-md-6 col-xs-6"><h1>Panel</h1></div>
<div class="col-md-3 col-xs-3"></div>
			
</div>

    <div class="col-md-3"></div>
    <div class="container col-md-6" style="background: gray;padding: 15px;padding: 25px;">
        <div class="row" style="border: lightsteelblue 1px solid; border-radius: 10px;">
            <br>
            <h4>&nbsp;   Consultar Periodo</h4><br>
            <div class="row" style="padding: 5px; ">
                <form action="panel.php" method="post" >
                <div class="col-xs-6">
                <label for="date_inicio">Inicio</label><input type="date" name="date_inicio">
                </div>
                <div class="col-xs-6">
                <label for="date_final">Final</label><input type="date" name="date_final">
                </div>
                <div class="col-xs-12">
                <button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-search"> Consultar</span></button>
                </div>
                </form>
            </div>
        </div>
        
        <div class="row" style="padding: 10px;">
            <div class="col-md-6 col-xs-6" style="border: lightsteelblue 1px solid; border-radius: 10px;">
                <h3>Pacientes</h3>
                <label>Total: </label><p>.<?php echo $p_total?>.</p>
                <label>Novos: </label><p>.<?php echo $p_periodo?>.</p>
                <label>Por Cobrar: </label><p><?php echo $p_cobrar ?>.</p>
                <label>R$ Recebido </label><p><?php echo 'R$ '.$v_recebido ?>.</p>



            </div>
            <div class="col-md-6 col-xs-6" style="border: lightsteelblue 1px solid; border-radius: 10px;">
                <h3>Sessões</h3>
                <label>Total: </label><p>.<?php echo $s_total?>.</p>
                <label>Periodo: </label><p>.<?php echo $s_periodo ?>.</p>
                <label>Por Cobrar: </label><p>.<?php echo $s_cobrar ?>.</p>
                <label>R$ por Cobrar </label>.<?php echo 'R$ '.$v_cobrar ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>

    
</body>
</html>
<html>

</html>
