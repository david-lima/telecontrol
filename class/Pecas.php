<?php
session_start();
require_once('../model/modelPecas.php');

class Pecas
{

	function __construct()
	{

		$objPecas = new modelPecas();
		$this->objPecas = $objPecas;
	}
	function CadastrarPecas()
	{$data = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['data'])));
		$peca =  $this->objPecas->CadastrarPecas($_POST["desc"],$_POST['nf'],$data,$_POST['tensao']);

	
		if (!empty($peca)) {

			$resposta = '<div class="alert alert-success">Peca Cadastrada com Sucesso!</div>';
			return $resposta;
		} else {
			$resposta = '<div class="alert alert-danger">Houve um erro!</div>';
			return $resposta;
		};
	}

	function getRequisicaes()
	{
		$cliente =  $this->objPecas->getRequisicaes();

	
		return $cliente;
	}

	function getPecas()
	{
		$cliente =  $this->objPecas->getPecas();

	
		return $cliente;
	}

	function VincularPeca()
	{
		$vinculado =  $this->objPecas->VincularPeca($_GET['id'],$_POST['peca']);

	
		if (!empty($vinculado)) {

			$resposta = '<div class="alert alert-success">Peça Vinculada com Sucesso!</div>';
			return $resposta;
		} else {
			$resposta = '<div class="alert alert-danger">Houve um erro!</div>';
			return $resposta;
		};
	}
	
}
