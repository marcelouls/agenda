<?php

session_start();

if(!isset($_SESSION['usuario'])){
		header('Location: agenda.php?erro=1');
}

require_once('db.class.php');

$sql_pacientes="SELECT p.cd_paciente,p.nm_paciente,p.fone,a.date_registro,SUM(a.valor_cobrado) AS total,a.valor_pago , a.sn_pago FROM acompanhamento a, paciente p where a.cd_paciente = p.cd_paciente and a.sn_pago = 'N' group BY cd_paciente";

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
<div class="col-md-6 col-xs-6"><h1>Pagamentos Pendentes</h1></div>
<div class="col-md-3 col-xs-3"></div>
		</a>
</div>










<div class="row" style="padding:10px;margin-left:10px;margin-right:10px">
<div class="col-md-4"></div>
<div class=" col-md-4 col-xs-12" style="border:solid 1px;border-radius:15px;background:lightgrey;text-align:justify">

';



	while ($lista_pacientes = mysqli_fetch_array($lista,MYSQLI_ASSOC)) {
        echo '<div class="row" style="padding:10px">';
        echo '<p style="color:#34475c">cod: '.$lista_pacientes['cd_paciente'].'
             <br>'.$lista_pacientes['nm_paciente'].' <br><strong>Fone : '.$lista_pacientes['fone'].'
             <br>Total : R$ '.$lista_pacientes['total'].'</strong> <br>';
            if($lista_pacientes){

                $sql_detalhe = "SELECT * FROM acompanhamento where cd_paciente = ".$lista_pacientes['cd_paciente']." AND sn_pago = 'N'";
                $objDb = new db();
                $link = $objDb -> conecta_mysql();

                $listados = mysqli_query($link,$sql_detalhe);
                
                
                while ($lista_nova = mysqli_fetch_array($listados,MYSQLI_ASSOC)){
                    echo '<p><strong>'.$lista_nova['date_registro'].'</strong>- Valor : R$ '.$lista_nova['valor_cobrado'].'</p>';
                   
                }
            }
        
		
	
		echo '</div>';
		echo '<hr style="border:solid 1px">';

		
    };
    
	

	
	echo '</div>
	<div class="col-md-2"></div>
	</div>

	</div>
	
<div class="col-md-4"></div>

</body>
</html>';






?>

