<?php
require_once('Connection.php');
class ModelPecas{


	function __construct(){
	
		$objConnection = new Connection();
		$this->con = $objConnection->Conectar();
		
	}
	function CadastrarPecas($desc,$nf,$data,$tensao){
		$data = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['data'])));
		$pecas = mysqli_query($this->con,"INSERT INTO `site`.`pecas_compradas` (`descricao`, `nota_fiscal`, `data_compra`, `tensao`) VALUES ('".$desc."', '".$nf."', '".$data."', '".$tensao."')");
		
		return $pecas;	
	}


	function getRequisicaes(){
		
		$requisicao = mysqli_query($this->con,"SELECT * FROM `requisicao` AS r");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($requisicao); $i++) ;
		
		return $array;
	}

	function getPecas(){
		
		$pecas = mysqli_query($this->con,"SELECT * FROM pecas_compradas");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($pecas); $i++) ;
		
		return $array;
	}

	function VincularPeca($id,$idPeca){
		$pecas = mysqli_query($this->con,"INSERT INTO `site`.`pivot_pecas_compradas` (`id_pecas`, `id_requisicao`) VALUES ('".$idPeca."', '".$id."')");
		
		return $pecas;	
	}

	




}
?>