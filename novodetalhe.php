<?php
/*
session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: agenda.php?erro=1');
}
*/


require_once('db.class.php');
$calendario = isset($_GET['calendario']) ?  $_GET['calendario'] : date("2020-01-17") ;

function detalhe(){
$calendario = isset($_GET['calendario']) ?  $_GET['calendario'] : date("Y-m-d") ;

$objDb = new db();
$link = $objDb-> conecta_mysql();

$sql="";
$hora="";

$contador=1;
$objDb = new db();
$link = $objDb-> conecta_mysql();
$h=1;
$inicio=7;
$fim=8;
$sql="";
$hora="";

//echo '<div class="row">';
//echo '<div class="row">';
echo '<div class="col-md-12 col-xs-12" >';


while($contador<16){

	$sql = "SELECT * FROM escreve_evento WHERE hora_inicio = $h AND data_agenda ='$calendario'";
$hora= mysqli_query($link, $sql);

if ($hora) {
	$hora1 = mysqli_fetch_array($hora, MYSQLI_ASSOC);
}else{
	echo 'Erro na execucao da consulta, entrar em contato com adm do site';

	}
	    //echo '<div class="row">';
		if (isset($hora1)) {
		//	echo '<div class="row">';
		//echo '<div class="col-md-12 col-xs-12" style="border-bottom:  1px solid #591b03;">';
		echo '<strong>'.$inicio.':00 - '.$fim.':00</strong>';
			
			echo ' '.$hora1['detalhe']." - ".$hora1["local"] ; 
			echo '<form method="post" action="cancelar_registro.php">';	
			echo '<button type="button" class="btn-warning btn-xs" style="color:red;font-weight:bold;float:right;margin-left:5px" data-toggle="modal" data-target="#exampleModal">X</button>';
			echo '</form>';
			
			botao_atender();

			echo '</div>';
			echo '</div>';

			echo '<!--  MODAL -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
			  	<div class="col-md-3 col-xs-3></div>
				<h3 class="modal-title" id="exampleModalLabel">Tem certeza que quer apagar o registro?</h3><br><br>
				<p style="text-align:center; font-weight:bold; font-size:20px; color:#a33307">'.$hora1['detalhe'].'</p><br>
				<p style="text-align:center; font-weight:bold; font-size:20px; color:#a33307">'.date('d/m',strtotime($calendario)).' - '.$hora1['hora_inicio'].'</p><br>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;fdgsdfgdfgsdfgsdfg</span>
				</button>
			  </div>
			  <div class="modal-body">
				...
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
				
				<a href="cancelar_registro.php?cod_evento='.$hora1['cod_evento'].'">
				<button type="button"	 class="btn-primary" >Sim</button></a>
				
		
			  </div>
			</div>
		  </div>
		</div>';
			
		}else{  
	//	echo '<div class="row">';
	//	echo '<div class="col-md-12 col-xs-12" >';
	//echo '<strong>'.$inicio.':00 - '.$fim.':00</strong>';
			//botao_registrar();
			
			$data = $calendario;
			echo '<form method="post" action="registra_evento.php" >';
			//echo '<input type=text name="detalhe" style="border:0; background-color:lightgrey;width:60%">';
            echo '<button type="button" class="btn-default" style="border-radius:0 15px; font-size:8px;padding:5px;
            width:70px;border:2px solid green;margin:2px;color:darkgreen;font-weight:bold"
            data-toggle="modal" data-target="#marcar" >'. $inicio.':00 - '.$fim.':00'.'</button>';
           
        			
        } 
        
       
			
		 $h++;
		 $inicio++;
		 $fim++;

    $contador++;
}
echo '</form>';
echo '</div>';
echo '</div>';


echo '<!--  MODAL -->
<div class="modal fade" id="marcar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
    <div class="row">
        <div class="col-md-3 col-xs-3></div>
        <div class="col-md-6 col-xs-6">
        <h2 style="color:#d13d04; text-align: center">Marcação de Hora<br></h2>
        </div>
        <div class="col-md-3 col-xs-3></div>
    </div>

  
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     
    </button>
  </div>
  <div class="modal-body">
  
  <div class="col-md-1 col-xs-1"></div>
  <div class="col-md-10 col-xs-10">
<div class="row" style="border:solid 1px; border-radius: 15px; margin:20px 10px 10px 10px;padding-top:20px">
 
    <form class="form-group" action="escrever.php" method="post">
    
     <div class="row">
     <div class="col-md-1 col-xs-1"></div>	
     <div class="col-md-10 col-xs-10">
            <span class="glyphicon glyphicon-calendar" > Data </span>
            '.$data = isset($_POST['data']) ? $_POST['data'] : "";
            echo'
            
            <input class="form-control" type="date" name="date" value="<?php echo $data ?> "><br>
       </div>
     <div class="col-md-1 col-xs-1"></div>
   </div>

   <div class="row">
     <div class="col-md-1 col-xs-1"></div>	
     <div class="col-md-10 col-xs-10">
           <span class="glyphicon glyphicon-time" > Hora Inicio</span>
    
               <select class="form-control" name="hora_inicio">
                        <option value="">Select...</option>
                        <option value="1">07:00 - 08:00</option>
                        <option value="2">08:00 - 09:00</option>
                        <option value="3">09:00 - 10:00</option>
                        <option value="4">10:00 - 11:00</option>
                        <option value="5">11:00 - 12:00</option>
                        <option value="6">12:00 - 13:00</option>
                        <option value="7">13:00 - 14:00</option>
                        <option value="8">14:00 - 15:00</option>
                        <option value="9">15:00 - 16:00</option>
                        <option value="10">16:00 - 17:00</option>
                        <option value="11">17:00 - 18:00</option>
                        <option value="12">18:00 - 19:00</option>
                        <option value="13">19:00 - 20:00</option>
                        <option value="14">20:00 - 21:00</option>
                        <option value="15">21:00 - 22:00</option>
            </select><br>
       </div>		
     <div class="col-md-1 col-xs-1"></div>
   </div>



   <div class="row">		
     <div class="col-md-1 col-xs-1"></div>	
     <div class="col-md-10 col-xs-10">
           <span class="glyphicon glyphicon-tag" > Tipo </span>
                 <select class="form-control" name="tipo">
                      <option value="">Select...</option>
                      <option value="1">Paciente</option>
                      <option value="2">Curso</option>
                      <option value="3">Palestra</option>
                      <option value="4">Outro</option>
                      
                  </select><br>
          </div>
      <div class="col-md-1 col-xs-1"></div>
  </div>

   <div class="row">	
       <div class="col-md-1 col-xs-1"></div>	
       <div class="col-md-10 col-xs-10">
            <span class="glyphicon glyphicon-pencil" > Detalhe </span>
            '.$detalhe = isset($_POST['detalhe']) ? $_POST['detalhe'] : "";
            echo'
            <input class="form-control" type="text" name="detalhe"  maxlength="200" value="<?= $detalhe; ?>"><br></div>
       <div class="col-md-1 col-xs-1"></div>
 </div>


  <div class="row">
        <div class="col-md-1 col-xs-1"></div>	
        <div class="col-md-10 col-xs-10">
             <span class="glyphicon glyphicon-phone" > Fone </span>
               <input class="form-control" type="text" name="fone"><br>
        </div>
        <div class="col-md-1 col-xs-1"></div>
    </div>	


  <div class="row">
      <div class="col-md-1 col-xs-1"></div> 
        <div class="col-md-10 col-xs-10">
            <span class="glyphicon glyphicon-tag" > Local </span>
            <select class="form-control" name="local">
              <option >Select...</option>
              <option value="On-line">On-line</option>
              <option value="Presencial">Presencial</option>         
            </select><br>
      </div> 
      <div class="col-md-1 col-xs-1"></div>
  </div>

     
    <div class="col-md-4 col-xs-4">
       
         <button id="button" class="button btn-primary btn-xs" style="margin:15px 150%">Registrar</button>
    </div>
  <div class="col-md-2 col-xs-2"></div> 


    </form>
  </div>
  </div>
  <div class="col-md-1 col-xs-1"></div>


  </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>

    <button type="button"	 class="btn-primary" >Sim</button></a>
    

  </div>
</div>
</div>
</div>';
        
		
        //echo '</div>';
       
}

function botao_atender(){
		
			
			echo '<form method="post" action="lista_paciente.php">';	
			echo '<button name="atender" class="btn-primary btn-xs"style="float:right">Atender</button>';
			echo '</form>';
	
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Agenda</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<!-- <link rel="stylesheet" type="text/css" href="css/amet.css"> -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<script type="text/javascript"></script>
  	<style type="text/css">
  		
	  </style>
	  <script>

	  </script>
</head>
<body style="background:lightgrey ">
		<div class="row">
			<div class="col-md-4 col-xs-2">
			
				<a href="opcoes.php">
				<button style="border:none;background-color:lightgrey;float:right;;margin-top:15px"><span class="glyphicon glyphicon-menu-left" style="font-size:30px;color:#34475c;background-color:lightgrey;border:none;"></span></button>

			</div>
			<div class="col-md-4 col-xs-8">
				<form id="data_consulta" method="get" action="detalhe.php ">
					<input type="date" name="calendario">
					<?php 			
				echo '<p style="float:right; font-size:60px;color:#a33307 ">'.date('d/m',strtotime($calendario)).'</p>';
					?>
					<button style="border:none;background-color:lightgrey;margin-top:15px"><span class="glyphicon glyphicon-search" style="font-size:30px;color:#34475c;background-color:lightgrey;border:none"></span></button>
				</form>

		</div>
		<div class="col-md-4 col-xs-2"></div>
		</a>
			
        </div>
        <div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10" style="border:solid 1px red; border-radius:15px; padding:10px 30px; margin: 0px 10px">
		<?php detalhe();?>
	    </div>
        <div class="col-md-4 col-xs-1"></div>
</div>

	
</body>
</html>

