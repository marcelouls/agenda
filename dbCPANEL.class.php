<?php 

class db{

	//host
	private $host = 'localhost';

	//usuario
	private $usuario = 'marcelo5_admyo';


	//senha
	private $senha = 'WIKMapNMIZ30';

	//banco de dados
	private $database = 'marcelo5_maap';

	public function conecta_mysql(){

		$con = mysqli_connect($this->host,$this->usuario,$this->senha,$this->database);

		mysqli_set_charset($con,'utf8');

		// verificar se houve erro de conexão 

		if (mysqli_connect_errno()) {
			echo 'Erro ao tentar conectar com o BD: '.mmysqli_connect_error();
			# code...
		}
		return $con;
		
	}
}

 ?>