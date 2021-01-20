<?php
session_start();
require_once('../model/modelCliente.php');

class Cliente
{

	function __construct()
	{

		$objCliente = new modelCliente();
		$this->objCliente = $objCliente;

	}

	function getClientes($id = '')
	{
		if (!empty($id)) {
			$usuarios = $this->objCliente->getCliente($id);
		} else {
			$usuarios = $this->objCliente->getAllClientes();
		}
		
		return $usuarios;
	}

	function cadastrarCliente()
	{

		$cliente =  $this->objCliente->cadastraCliente($_POST["nome"],$_POST['sobrenome'],$_POST['nomesocial'],$_POST['endereco'],$_POST['bairro'],$_POST['numero'],$_POST['referencia'],$_POST['estado'],$_POST['cep'],$_POST['email'],$_POST['cnpj'],$_POST['telefone'],$_POST['celular'],$_POST['layout'],$_POST['descricao'],$_POST['valor'],$_POST['cidade'],$_POST['cpf']);

		if (!empty($cliente)) {

			$resposta = '<div class="alert alert-success">Cliente Cadastrado com Sucesso!</div>';
			return $resposta;
		} else {
			$resposta = '<div class="alert alert-danger">Houve um erro!</div>';
			return $resposta;
		};
	}

	function atualizaCliente(){
		
		$altera =  $this->objCliente->AlteraCliente($_POST["nome"],$_POST['sobrenome'],$_POST['nomesocial'],$_POST['endereco'],$_POST['bairro'],$_POST['numero'],$_POST['referencia'],$_POST['estado'],$_POST['cep'],$_POST['email'],$_POST['cnpj'],$_POST['telefone'],$_POST['celular'],$_POST['layout'],$_POST['descricao'],$_POST['valor'],$_POST['cidade'],$_POST['cpf'],$_GET['cliente']);
		
		if(!empty($altera)){
		
				$Erro = '<div class="alert alert-success">Cliente Alterado com Sucesso!</div>';
				return $Erro;
			
		}else{
			$Erro = '<div class="alert alert-danger">Houve um erro!</div>';
			return $Erro;
		};		
	}
	
	function deleteCliente($idCliente){
		
		$delete =  $this->objCliente->ExcluiCliente($idCliente);
		
		if(!empty($delete)){
		
				header("Location: dirname(__FILE__)/../listaClientes.php");
			
		}else{
			$Erro = '<div class="alert alert-danger">Houve um erro!</div>';
			return $Erro;
		};		
	}
}
