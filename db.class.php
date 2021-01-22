<?php 

class db{

	//host
	private $host = 'localhost';

	//usuario
	private $usuario = 'root';


	//senha
	private $senha = '';

	//banco de dados
	private $database = 'agenda';

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