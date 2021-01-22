<?php


session_start();

if(!isset($_SESSION['usuario'])){
		header('Location: agenda.php?erro=1');
}


require_once('db.class.php');

$cd_paciente   = isset($_POST['cd_paciente']) ? $_POST['cd_paciente']: "";
$nm_paciente   = isset($_POST['nm_paciente']) ? $_POST['nm_paciente']: "";
$dt_nacimento= isset($_POST['dt_nacimento']) ? $_POST['dt_nacimento']: "";
$fone          = isset($_POST['fone']) ? $_POST['fone']: "";
$data_registro = isset($_POST['data_registro']) ? $_POST['data_registro']: "";

$sql = "SELECT * FROM paciente where cd_paciente = $cd_paciente";

$objDb = new db();
$link = $objDb-> conecta_mysql();

$consulta=mysqli_query($link, $sql); 

$dados_paciente = mysqli_fetch_array($consulta);





echo '<!DOCTYPE html>
<html>
<head lang="pt-br">
	<title>Registro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">  	
  	</script>	
	<style>

	h1{
		font-family:  Georgia serif;
		font-style: bold;
		color:#d13d04;
		text-align: center;
		margin-right: 30px;
		font-size: 25px;
		margin-bottom: 30px;

	}	
		#titulo, #codigo{
		text-align: center;
		}
		h3 {
			text-align: left;
			color: #dea62c;
		}
		body{

			background: lightgrey;
		}
		
		.btn{
			margin: 2% 30%;
		}

		input{
			width:80px;
		}
		option{
			width:100%;
		}
	
	</style>  

</head>
<body>
<div class="row">
	<div  class="col-md-4 col-xs-2">
	
		<a href="opcoes.php">
		<button style="border:none;background-color:lightgrey;float:right;;margin-top:15px"><span class="glyphicon glyphicon-menu-left" style="font-size:30px;color:#34475c;background-color:lightgrey;border:none;"></span></button>
		</a>
	
	</div>
    
	<div class="col-md-4 col-xs-8" >
		<h3 style="text-align:center" >ATENDIMENTOS</h3>
		<br>
    </div>
    
	<div  class="col-md-1 ">
	</span>
    </button>
    </a>
    </div>
    
	<div class="col-md-3 col-xs-2 "></div>
</div>

<div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-4 col-xs-12">
        <div style="border: solid 1px;border-radius:15px; padding:10px">
		    <h3 > Identificação Pessoal</h3><br>
		    <label>Nome : '.$dados_paciente['nm_paciente'].'</label> 
		    <label>Data de Nascimento : '.$dados_paciente['dt_nacimento'].'</label>     <label>Telefone : '.$dados_paciente['fone'].'</label><br>
		    <label>Data de Inicio :'.$dados_paciente['data_registro'].'</label><br>
		</div>
	</div>
	<div  class="col-md-4"></div>
</div>
    
</div>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 col-xs-12">
        <h3 style="text-align:center">Sintese das Sessões</h3>
    </div>
    <div class="col-md-4"></div>
</div>
    
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 col-xs-12">
    	<div style="border: solid 1px;border-radius:15px; margin-right: 10px;margin-left:10px;padding:10px">';
        
    
    
    

        $sql2 = "SELECT * FROM acompanhamento where cd_paciente = $cd_paciente ORDER BY cod_registro ASC";

        $objDb = new db();
        $link = $objDb-> conecta_mysql();

        $lista=mysqli_query($link, $sql2); 


        while ($atendimento = mysqli_fetch_array($lista,MYSQLI_ASSOC)) {

        echo '<label>Sessão '.$atendimento['cod_registro'].'- data: '.$atendimento['date_registro'].' </label><br>'; 
		echo '<label>Resumo</label><p style="text-align:justify">'.$atendimento['sessao'].'</p>';
		if($atendimento['sn_pago']== "N"){
			
			echo '<button name="cod_registro value="'.$atendimento['cod_registro'].'"  class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" style="float:right">Pagamento</button>';
			echo '<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content" style="background:lightgrey">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title" style="background-color:grey;color:white;padding-left:15px">  Detalhe Pagamento</h4>
				</div>
				<div class="modal-body">
				<form method="post" action="receita.php">
				  <div class="row">
				  	<div class="col-md-4 col-xs-4">
					  <label>Valor Cobrado:</label>
					</div>
					<div class="col-md-4 col-xs-4">
					  <input type="text" name="valor_cobrado"/>
					</div>
					<hr>
				  </div> 
				  <div class="row">
				  	<div class="col-md-4 col-xs-4">	
				  		<label>Valor pagado:</label>
				  	</div>
				  	<div class="col-md-4 col-xs-4">
				  		<input type="text" name="valor_pago"/>
					  </div>
					  <hr>
				  </div>

				  <div class="row">
				  	<div class="col-md-4 col-xs-4">
				  		 <label>Pagado</label:>
					</div>					
				  	<div class="col-md-4 col-xs-4">
					  <select class="form-control" name="sn_pago">
					  <option value="N">Não</option>
					  <option value="S">Sim</option>
					  </select>
					</div>
					<hr>
					</div>


				  <div class="row">
				  	<div class="col-md-4 col-xs-4">
						<label>Forma de Pago:</label>
					</div>
				    <div class="col-md-4 col-xs-4">
						<select class="form-control" name="forma_pago">
						<option value="Dinheiro">Dinheiro</option>
						<option value="TRANSFERENCIA">Transferencia</option>
						<option value="PIX">PIX</option>
						<option value="CARTAO">Cartão</option>
						</select>
					</div>
					<hr>
				 </div>
				</div>
				
				<div class="modal-footer">
				<div class="row col-md-12 col-xs-12">	
				  <div class="col-md-4 col-xs-4">			
				  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				  </div>
				  
				  <div class="col-md-4 col-xs-4">
				  
				  <button  name="cod_registro" value="'.$atendimento['cod_registro'].'" class="btn btn-primary">Registrar</button>
				 <label>teste'.$atendimento['cod_registro'].'</label> 
				  </div>  
				</div>
				  </form>
				</div>
			  </div>
			  
			</div>
		  </div>
		  ';

		}

		
        echo '<hr style="color:grey">';
    
        };
    echo '
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
    
   

</body>
</html>';




















?>
