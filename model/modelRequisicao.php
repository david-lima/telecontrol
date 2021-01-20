<?php
require_once('Connection.php');
class modelRequisicao{


	function __construct(){
	
		$objConnection = new Connection();
		$this->con = $objConnection->Conectar();
		
	}
		
	function getRequisicao(){
		
		$requisicao = mysqli_query($this->con,"SELECT r.id, r.descricao AS descricao_req,r.prazo,r.id_situacao,s.descricao AS descricao_sit,p.descricao AS descricao_pri,u.nome, c.nome_social
		FROM `requisicao` AS r
		LEFT JOIN situacao_requisicao AS s ON s.id = r.id_situacao
		LEFT JOIN prioridade_requisicao AS p ON p.id = r.id_prioridade
		LEFT JOIN usuario AS u ON u.id = r.id_responsavel
		LEFT JOIN cliente AS c ON c.id = r.id_cliente");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($requisicao); $i++) ;
		
		return $array;
	}

	function getOneRequisicao($id){
		
		$requisicao = mysqli_query($this->con,"SELECT * FROM `requisicao` AS r WHERE r.id =".$id);
		for($i = 0; $array[$i] = mysqli_fetch_assoc($requisicao); $i++) ;
		
		return $array;
	}

	function cadastraRequisicao($cliente,$responsavel,$urgencia,$situacao,$data,$descricao){
		
		$requisicao = mysqli_query($this->con,"INSERT INTO `requisicao` (`descricao`, `prazo`,`data_cadastro`, `id_situacao`, `id_prioridade`, `id_responsavel`, `id_cliente`) VALUES ('$descricao', '$data', '".date('Y-m-d')."', '$situacao', '$urgencia', '$responsavel', '$cliente');");
		
		
		return $requisicao;
	}

	function getSituacoes(){
		
		$requisicao = mysqli_query($this->con,"SELECT * FROM situacao_requisicao");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($requisicao); $i++) ;
		
		return $array;
	}

	function getPrioridade(){
		
		$requisicao = mysqli_query($this->con, "SELECT * FROM prioridade_requisicao");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($requisicao); $i++) ;
		
		return $array;
	}

	function getUsuarios(){
		
		$requisicao = mysqli_query($this->con, "SELECT u.id,concat(u.nome,' ', u.sobrenome) as nome, u.email FROM usuario as u");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($requisicao); $i++) ;
		
		return $array;
	}
	
	function getClientes(){
		
		$requisicao = mysqli_query($this->con, "SELECT * FROM cliente");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($requisicao); $i++) ;
		
		return $array;
	}

	function alteraRequisicao($cliente,$responsavel,$urgencia,$situacao,$data,$descricao,$id){
		
		$requisicao = mysqli_query($this->con,"UPDATE `requisicao` SET `descricao`= '$descricao' , `prazo`='$data',`data_cadastro`='".date('Y-m-d')."', `id_situacao`=$situacao, `id_prioridade`=$urgencia, `id_responsavel`=$responsavel, `id_cliente`=$cliente where id = $id ;");
		
		return $requisicao;
	}
	function getAllClientes(){
		
		$clientes = mysqli_query($this->con,"SELECT * FROM cliente");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($clientes); $i++) ;
		
		return $array;
	}

	function getMDOVinculada($id){
		
		$MDO = mysqli_query($this->con,"SELECT m.descricao,m.valor
		FROM requisicao AS r
		LEFT JOIN pivot_mao_de_obra AS p ON p.id_requisicao = r.id
		LEFT JOIN mao_de_obra AS m ON m.id = p.id_mdo
		WHERE r.id=".$id);
		for($i = 0; $array[$i] = mysqli_fetch_assoc($MDO); $i++) ;
		
		return $array;
	}

	function getPecasVinculada($id){
		
		$pecas = mysqli_query($this->con,"SELECT pc.*
		FROM requisicao AS r
		LEFT JOIN pivot_pecas_compradas AS p ON p.id_requisicao = r.id
		LEFT JOIN pecas_compradas AS pc ON pc.id = p.id_pecas
		WHERE r.id = ".$id);
		for($i = 0; $array[$i] = mysqli_fetch_assoc($pecas); $i++) ;
		
		return $array;
	}

	function getValorTotalAtendido(){
		$req = mysqli_query($this->con,"SELECT sum(m.Valor) total from requisicao AS r
		LEFT JOIN pivot_mao_de_obra AS p ON p.id_requisicao = r.id
		LEFT JOIN mao_de_obra AS m ON m.id = p.id_mdo WHERE r.id_prioridade = 1");
			for($i = 0; $array[$i] = mysqli_fetch_assoc($req); $i++) ;
		
			return $array;
	}

	function getCountReq(){
		$req = mysqli_query($this->con,"SELECT count(*) as qtd from requisicao ");
			for($i = 0; $array[$i] = mysqli_fetch_assoc($req); $i++) ;
		
			return $array;
	}

	function getCountReqAtendidas(){
		$req = mysqli_query($this->con,"SELECT count(*) as qtd from requisicao AS r
		WHERE r.id_prioridade = 1");
			for($i = 0; $array[$i] = mysqli_fetch_assoc($req); $i++) ;
		
			return $array;
	}

	function getCountReqNaoFinalizadas(){
		$req = mysqli_query($this->con,"SELECT count(*) as qtd from requisicao AS r
		WHERE r.id_prioridade = 2");
			for($i = 0; $array[$i] = mysqli_fetch_assoc($req); $i++) ;
		
			return $array;
	}


}
?>