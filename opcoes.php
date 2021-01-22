<?php

session_start();
if(!isset($_SESSION['usuario'])){
		header('Location: agenda.php?erro=1');
	}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Agenda</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/amet.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<script type="text/javascript"></script>
</head>
<body style="background: lightgrey">
<div class="row" style="margin-top:25px">
		<div class="col-md-4 col-xs-2"></div>
		<div class="col-md-4 col-xs-8"><h1 style="border-radius:10px; background-color:#c24802; color:white; text-align:center">	Ametpsicologia</h1></div>
		<div class="col-md-4 col-xs-2"></div>
	</div>
	<div class="col-md-4 col-xs-2"></div>
	<div class="container col-md-4">
	
					<!--<div class="col-md-4" style="padding:20px">-->
		
		
			<div class="row" style="margin-top: 50px">
			
				<div class="col-md-6 col-xs-6" style="font-size: 100px;text-align: center;color:#ccf099;">
					<a href="detalhe.php">
						<span class="glyphicon glyphicon-calendar" style="border-style:dashed;padding: 20px; border-color:#c24802 ">
						</span>
					</a>
		    	</div>

				<div class="col-md-6 col-xs-6"style="font-size: 100px;text-align: center;color:#ccf099">
					<a href="pacientes.php">
						<span class="glyphicon glyphicon-user" style="border-style:dashed;padding: 20px; border-color:#c24802 " >
						</span>
					</a>
				</div>
			</div>

			<div class="row" style="margin-bottom: 50px">

				<div class="col-md-6 col-xs-6"style="font-size: 100px;text-align: center;color:#ccf099">
					<a href="lista_paciente.php">
						<span class="glyphicon glyphicon-list-alt" style="border-style:dashed;padding: 20px; border-color:#c24802 " >
						</span>
					</a>
				</div>

				<div class="col-md-6 col-xs-6"style="font-size: 100px;text-align: center;color:#ccf099">
					<a href="panel.php">
						<span class="glyphicon glyphicon-tasks" style="border-style:dashed;padding: 20px; border-color:#c24802 " >
						</span>
					</a>
				</div>
		
		
				

				
		    	
			</div>

			<div class="row" style="margin-bottom: 50px">

				
		
		
				<div class="col-md-6 col-xs-6" style="font-size: 100px;text-align: center;color:#ccf099;">
					<a href="cobranca.php">
						<span class="glyphicon glyphicon-briefcase" style="border-style:dashed;padding: 20px; border-color:#c24802 ">
						</span>
					</a>
		    	</div>

				

				
		    	<br><br>
			</div>
	</div>
		
		<div class="col-md-4 col-xs-2"></div>
	 </div>
	
	</div>



</body>
</html>