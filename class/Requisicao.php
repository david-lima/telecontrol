<?php
session_start();
require_once('../model/modelRequisicao.php');


class Requisicao
{

	function __construct()
	{

		$objModelRequisicao = new modelRequisicao();
		$this->objModelRequisicao = $objModelRequisicao;
	}

	function getRequisicoes()
	{

		$requisicao = $this->objModelRequisicao->getRequisicao();

		return $requisicao;
	}


	function cadastrarRequisicao()
	{
		$data = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['data'])));
		$requisicao = $this->objModelRequisicao->cadastraRequisicao($_POST['cliente'], $_POST['responsavel'], $_POST['urgencia'], $_POST['situacao'], $data, $_POST['descricao']);


		if (!empty($requisicao)) {

			$resposta = '<div class="alert alert-success">Usuario Cadastrado com Sucesso!</div>';
			return $resposta;
		} else {
			$resposta = '<div class="alert alert-danger">Houve um erro!</div>';
			return $resposta;
		};
	}



	function getSituacoes()
	{

		$requisicao = $this->objModelRequisicao->getSituacoes();

		return $requisicao;
	}

	function getPrioridade()
	{

		$requisicao = $this->objModelRequisicao->getPrioridade();

		return $requisicao;
	}

	function getUsuarios()
	{

		$requisicao = $this->objModelRequisicao->getUsuarios();

		return $requisicao;
	}

	function alteraRequisicao(){
		$data = date("Y-m-d",strtotime(str_replace('/','-',$_POST['data'])));
		$requisicao = $this->objModelRequisicao->alteraRequisicao($_POST['cliente'],$_POST['responsavel'],$_POST['urgencia'],$_POST['situacao'],$data,$_POST['descricao'],$_GET['id']);
	
		
		if(!empty($requisicao)){
		
				$resposta = '<div class="alert alert-success">Requisição Alterado com Sucesso!</div>';
				return $resposta;
			
		}else{
			$resposta = '<div class="alert alert-danger">Houve um erro!</div>';
			return $resposta;
		};		
	}

	function getClientes()
	{
		
		$requisicao = $this->objModelRequisicao->getAllClientes();

		return $requisicao;
	}
	
	function getOneRequisicao()
	{

		$requisicao = $this->objModelRequisicao->getOneRequisicao($_GET['id']);

		return $requisicao;
	}

	function getMDOVinculada()
	{

		$requisicao = $this->objModelRequisicao->getMDOVinculada($_GET['id']);

		return $requisicao;
	}

	function getPecasVinculada()
	{

		$requisicao = $this->objModelRequisicao->getPecasVinculada($_GET['id']);

		return $requisicao;
	}

	function getValorTotalAtendido()
	{

		$requisicao = $this->objModelRequisicao->getValorTotalAtendido();

		return $requisicao;
	}
	function getCountReq()
	{

		$requisicao = $this->objModelRequisicao->getCountReq();

		return $requisicao;
	}
	function getCountReqAtendidas()
	{

		$requisicao = $this->objModelRequisicao->getCountReqAtendidas();

		return $requisicao;
	}
	function getCountReqNaoFinalizadas()
	{

		$requisicao = $this->objModelRequisicao->getCountReqNaoFinalizadas();

		return $requisicao;
	}
	function deslogar()
	{
		session_destroy();
		header("Location: dirname(__FILE__)/../index.php");
	}
}
