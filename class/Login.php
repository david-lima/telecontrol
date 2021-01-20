<?php
session_start();
require_once('model/modelLogin.php');
	
	
Class Login{

	function __construct(){
		
		$objModelLogin = new modelLogin();
		$this->objModelLogin = $objModelLogin;
		
	}

	function verificarLogado(){
		if(!isset($_SESSION["logado"])){
			header("Location: dirname(__FILE__)/../index.php");
			exit();
		}
	}
	
	function Logar($email,$senha){
		
		$usuario = $this->objModelLogin->verificaUser($email,$senha);	
		if($usuario['id']){
		
			if($usuario["senha"] == $senha){
				$_SESSION["id_usuario"] = $usuario["id"];
				$_SESSION["logado"] = "sim";
				header("Location: dirname(__FILE__)/../view/telaInicio.php");
			}else{
				$Erro = '<div class="alert alert-danger">Senha e/ou Email errado(s)!</div>';
				return $Erro;
			}
		}else{
			$Erro = '<div class="alert alert-danger">Senha e/ou Email errado(s)!</div>';
			return $Erro;
		};		
	}

	function registrarUsuario($nome,$sobrenome,$email,$senha){
		
		$usuario = $this->objModelLogin->verificaUser($nome,$sobrenome,$email,$senha);	
		
		if(!empty($usuario)){
		
				$Erro = '<div class="alert alert-success">Usuario Cadastrado com Sucesso!</div>';
				return $Erro;
			
		}else{
			$Erro = '<div class="alert alert-danger">Houve um erro!</div>';
			return $Erro;
		};		
	}
	
	function deslogar(){
		session_destroy();
		header("Location: dirname(__FILE__)/../index.php");
	}
}
?>