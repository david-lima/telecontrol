<?php
require_once('Connection.php');
class ModelMDO{


	function __construct(){
	
		$objConnection = new Connection();
		$this->con = $objConnection->Conectar();
		
	}
	function CadastrarMDO($desc,$valor){
		
		$MDO = mysqli_query($this->con,"INSERT INTO `site`.`mao_de_obra` (`descricao`, `Valor`) VALUES ('".$desc."', '".$valor."');");
		
		return $MDO;	
	}

	
	function getRequisicaes(){
		
		$requisicao = mysqli_query($this->con,"SELECT * FROM `requisicao` AS r");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($requisicao); $i++) ;
		
		return $array;
	}

	function getMDO(){
		
		$MDO = mysqli_query($this->con,"SELECT * FROM mao_de_obra");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($MDO); $i++) ;
		
		return $array;
	}

	function VincularMDO($id,$idMDO){
		$pecas = mysqli_query($this->con,"INSERT INTO `site`.`pivot_mao_de_obra` (`id_mdo`, `id_requisicao`) VALUES ('".$idMDO."', '".$id."')");
		
		return $pecas;	
	}

	function getMDOVinculada($id){
		
		$MDO = mysqli_query($this->con,"SELECT m.descricao,m.Valor
		FROM requisicao AS r
		LEFT JOIN pivot_mao_de_obra AS p ON p.id_requisicao = r.id
		LEFT JOIN mao_de_obra AS m ON m.id = p.id_mdo
		WHERE r.id=".$id);
		for($i = 0; $array[$i] = mysqli_fetch_assoc($MDO); $i++) ;
		
		return $array;
	}

	function getPecasVinculada($id){
		
		$pecas = mysqli_query($this->con,"SELECT pc.descricao
		FROM requisicao AS r
		LEFT JOIN pivot_pecas_compradas AS p ON p.id_requisicao = r.id
		LEFT JOIN pecas_compradas AS pc ON pc.id = p.id_pecas
		WHERE r.id = ".$id);
		for($i = 0; $array[$i] = mysqli_fetch_assoc($pecas); $i++) ;
		
		return $array;
	}


}
?>