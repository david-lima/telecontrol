<?php
session_start();
require_once('../model/modelMDO.php');

class MaoDeObra
{

	function __construct()
	{

		$objMDO = new modelMDO();
		$this->objMDO = $objMDO;
	}
	function CadastrarMDO()
	{
		$MDO =  $this->objMDO->CadastrarMDO($_POST["desc"],$_POST['valor']);

	
		if (!empty($MDO)) {

			$resposta = '<div class="alert alert-success">Mão de Obra Cadastrada com Sucesso!</div>';
			return $resposta;
		} else {
			$resposta = '<div class="alert alert-danger">Houve um erro!</div>';
			return $resposta;
		};
	}

	
	function getRequisicaes()
	{
		$cliente =  $this->objMDO->getRequisicaes();

	
		return $cliente;
	}

	function getMDO()
	{
		$cliente =  $this->objMDO->getMDO();

	
		return $cliente;
	}

	function VincularMDO()
	{
		$vinculado =  $this->objMDO->VincularMDO($_GET['id'],$_POST['MDO']);

	
		if (!empty($vinculado)) {

			$resposta = '<div class="alert alert-success">Mão de Obra Vinculada com Sucesso!</div>';
			return $resposta;
		} else {
			$resposta = '<div class="alert alert-danger">Houve um erro!</div>';
			return $resposta;
		};
	}
	
}
