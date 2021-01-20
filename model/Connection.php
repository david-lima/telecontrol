<?php
class Connection{
	
	var $Server = "localhost";
	var $Username = "root";
	var $Password = "";
	var $Database = "site";
		
	function __construct(){
		$this->Conectar();
	}
		
	function Conectar(){
		if(!($conectar = mysqli_connect($this->Server,$this->Username,$this->Password))){
			echo "Erro ao tentar abrir a conexão!";
		}else{
			if(!($con = mysqli_select_db($conectar,$this->Database))){
				echo "Erro ao selecionar o banco!";
			}
		}
		return $conectar;
	}
}
?>