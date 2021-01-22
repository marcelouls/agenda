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
  	<style type="text/css">
  		p {
  			color:black;
  		}

      #button{
        margin: 0 150%;
      }
  	</style>

</head>
<body style="background: lightgrey">
  <div class="row">
  	<div class="col-md-3 col-xs-3">	<a href="opcoes.php">
			<button style="border:none;background-color:lightgrey;float:left;margin-top:15px"><span class="glyphicon glyphicon-menu-left" style="font-size:30px;color:#34475c;background-color:lightgrey;border:none;"></span></button>
		</div>
		</a>
	<div class="col-md-6 col-xs-6">
    <h2 style="color:#d13d04; text-align: center">Marcação de Hora<br><br></h2>
  </div>
  
  <div class="col-md-3 col-xs-3">
		
		</div>
  </div>
  



    
	  <div class="col-md-4"></div>
	  <div class="col-md-4">
    <div class="row" style="border:solid 1px; border-radius: 15px; margin:20px 10px 10px 10px;padding-top:20px">
     
		<form class="form-group" action="escrever.php" method="post">
        
		 <div class="row">
	     <div class="col-md-2 col-xs-1"></div>	
	     <div class="col-md-8 col-xs-10">
				<span class="glyphicon glyphicon-calendar" > Data </span>
				<?php $data = isset($_POST['data']) ? $_POST['data'] : "";?>
				<!--<?php echo  'teste -> '.$data ?>-->
		        <input class="form-control" type="date" name="date" value="<?php echo $data ?> "><br>
		   </div>
	     <div class="col-md-2 col-xs-1"></div>
	   </div>

	   <div class="row">
	     <div class="col-md-2 col-xs-1"></div>	
	     <div class="col-md-8 col-xs-10">
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
  	   <div class="col-md-2 col-xs-1"></div>
  	 </div>

  

  	 <div class="row">		
	     <div class="col-md-2 col-xs-1"></div>	
	     <div class="col-md-8 col-xs-10">
	           <span class="glyphicon glyphicon-tag" > Tipo </span>
        			 <select class="form-control" name="tipo">
          				<option value="">Select...</option>
          				<option value="1">Paciente</option>
          				<option value="2">Curso</option>
          				<option value="3">Palestra</option>
          				<option value="4">Outro</option>
          				
          			</select><br>
  			</div>
  	    <div class="col-md-2 col-xs-1"></div>
      </div>

	   <div class="row">	
	       <div class="col-md-2 col-xs-1"></div>	
	       <div class="col-md-8 col-xs-10">
            	<span class="glyphicon glyphicon-pencil" > Detalhe </span>
				<?php $detalhe = isset($_POST['detalhe']) ? $_POST['detalhe'] : "";?>
            	<input class="form-control" type="text" name="detalhe"  maxlength="200" value="<?= $detalhe; ?>"><br></div>
	       <div class="col-md-2 col-xs-1"></div>
     </div>


      <div class="row">
        	<div class="col-md-2 col-xs-1"></div>	
        	<div class="col-md-8 col-xs-10">
        	     <span class="glyphicon glyphicon-phone" > Fone </span>
        		   <input class="form-control" type="text" name="fone"><br>
        	</div>
        	<div class="col-md-2 col-xs-1"></div>
	    </div>	
	

      <div class="row">
          <div class="col-md-2 col-xs-1"></div> 
        	<div class="col-md-4 col-xs-10">
                <span class="glyphicon glyphicon-tag" > Local </span>
                <select class="form-control" name="local">
                  <option >Select...</option>
                  <option value="On-line">On-line</option>
                  <option value="Presencial">Presencial</option>         
                </select><br>
          </div> 
          <div class="col-md-2 col-xs-1"></div>
      </div>

	     
	    <div class="col-md-4 col-xs-4">
           
    	     <button id="button" class="button btn-primary btn-xs" style="margin:15px 150%">Registrar</button>
    	</div>
      <div class="col-md-2 col-xs-2"></div> 
  

	    </form>
      </div>
	  </div>
	  <div class="col-md-4"></div>


    

    


</body>
</html>