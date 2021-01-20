<?php
session_start();
require_once('../model/modelUsuario.php');

class Usuario
{

	function __construct()
	{

		$objUsuario = new modelUsuario();
		$this->objUsuario = $objUsuario;
	}

	function getAllUsuarios()
	{
		$usuarios =  $this->objUsuario->getAllUsuarios();

		return $usuarios;
	}

	function getOneUsuario()
	{
		$usuarios =  $this->objUsuario->getOneUsuario($_GET['usuario']);

		return $usuarios;
	}
	function getSetores()
	{
		$usuarios =  $this->objUsuario->getSetores();

		return $usuarios;
	}
	function getFuncoes()
	{
		$usuarios =  $this->objUsuario->getFuncoes();

		return $usuarios;
	}

	function CadastrarUsuario()
	{
		$usuarios =  $this->objUsuario->CadastrarUsuario($_POST["nome"],$_POST['sobrenome'],$_POST['setor'],$_POST['funcao'],$_POST['email'],$_POST['senha']);

		if (!empty($usuarios)) {

			$resposta = '<div class="alert alert-success">Usuario Excluido com Sucesso!</div>';
			return $resposta;
		} else {
			$resposta = '<div class="alert alert-danger">Houve um erro!</div>';
			return $resposta;
		};
	}
	function excluirUsuario()
	{
		$usuarios =  $this->objUsuario->excluirUsuario($_GET['usuario']);


		if (!empty($usuarios)) {

			header("Location: dirname(__FILE__)/../listaUsuarios.php");
		} else {
			$resposta = '<div class="alert alert-danger">Houve um erro!</div>';
			return $resposta;
		};
	}

	function alteraUsuario()
	{
		$usuarios =  $this->objUsuario->alteraUsuario($_POST["nome"], $_POST['sobrenome'], $_POST['setor'], $_POST['funcao'], $_POST['email'], $_POST['senha'], $_GET['usuario']);

		if (!empty($usuarios)) {

			$resposta = '<div class="alert alert-success">Usuario Excluido com Sucesso!</div>';
			return $resposta;
		} else {
			$resposta = '<div class="alert alert-danger">Houve um erro!</div>';
			return $resposta;
		};
	}
}
