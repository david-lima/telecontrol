<?php
require_once('Connection.php');
class modelCliente{


	function __construct(){
	
		$objConnection = new Connection();
		$this->con = $objConnection->Conectar();
		
	}
		
	function getAllClientes(){
		
		$clientes = mysqli_query($this->con,"SELECT * FROM cliente");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($clientes); $i++) ;
		
		return $array;
	}

	function cadastraCliente($nome,$sobrenome,$nomesocial,$endereco,$bairro,$numero,$referencia,$estado,$cep,$email,$cnpj,$telefone,$celular,$layout,$descricao,$valor,$cidade,$cpf){
		
		$cliente = mysqli_query($this->con,"INSERT INTO `cliente` (`nome`, `sobrenome`, `nome_social`, `cnpj`, `cpf`, `id_layout`, `valor`, `descricao`, `cidade`, `estado`, `endereco`, `bairro`, `referencia`, `cep`, `numero`, `email`, `telefone`, `celular`) VALUES ('$nome', '$sobrenome', '$nomesocial', '$cnpj', '$cpf', '$layout', '$valor', '$descricao', '$cidade', '$estado', '$endereco', '$bairro', '$referencia', '$cep', '$numero', '$email', '$telefone', '$celular');");
		
		
			return $cliente;
		
	}

	function getCliente($id){
		
		$clientes = mysqli_query($this->con,"SELECT * FROM cliente WHERE id = ".$id);
		for($i = 0; $array[$i] = mysqli_fetch_assoc($clientes); $i++) ;
		
		return $array;
	}

	function alteraCliente($nome,$sobrenome,$nomesocial,$endereco,$bairro,$numero,$referencia,$estado,$cep,$email,$cnpj,$telefone,$celular,$layout,$descricao,$valor,$cidade,$cpf,$idCliente){
		
		$cliente = mysqli_query($this->con,"UPDATE `cliente` SET `nome`='$nome', `sobrenome`='$sobrenome', `nome_social`='$nomesocial', `cnpj`='$cnpj', `cpf`='$cpf', `id_layout`='$layout', `valor`='$valor', `descricao`='$descricao', `cidade`='$cidade', `endereco`='$endereco', `bairro`='$bairro', `estado`='$estado', `referencia`='$referencia', `cep`='$cep', `numero`='$numero', `email`='$email', `telefone`='$telefone', `celular`='$celular' WHERE  `id`=$idCliente;");
		
		
			return $cliente;
		
	}
	
	function excluiCliente($idCliente){
		
		$clientes = mysqli_query($this->con,"DELETE FROM `site`.`cliente` WHERE  `id`=$idCliente;");
		
		return $clientes;
	}

	




}
?>