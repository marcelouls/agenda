<?php


echo '<!DOCTYPE html>
<html lang="">
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
	  <style>
	 	#erro{
			 color:red;
		 } 
	  </style>
</head>
<body >
	<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4"><br><br><br></div>
	<div class="col-md-4"></div>
    </div>

	<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	
	<form id="entrar" method="post" action="checkin.php">
		<div class="col-md-2 col-xs-2"></div>
		<div class="col-md-8 col-xs-8" style="border-top:3px solid gray;border-bottom:3px solid gray">
			<br><br><br>
			';
			$erro = isset($_GET['erro']) ? $_GET['erro']: "0";
			if($erro==="1") {
				echo '<p id=erro>*Usuario incorreto!</p>';
			}
			echo '
		<input type="user" name="usuario" placeholder="Usuario"><br><br>
		<input type="password" name="senha" placeholder="Senha"><br><br>
		<button class="button btn-primary btn-sm">Entrar</button>
		<br><br><br>
		</div>
		<div class="col-md-2 col-xs-2"></div>
	</form>	
		
	</div>
	<div class="col-md-4"></div>
	</div>




</body>
</html>'

?>