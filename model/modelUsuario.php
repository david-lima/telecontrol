<?php
require_once('Connection.php');
class ModelUsuario{


	function __construct(){
	
		$objConnection = new Connection();
		$this->con = $objConnection->Conectar();
		
	}
		
	function alteraUsuario($nome,$sobrenome,$setor,$funcao,$email,$senha,$id){
		
		$clientes = mysqli_query($this->con,"UPDATE `site`.`usuario` SET `nome`='$nome', `sobrenome`='$sobrenome', `email`='$email', `senha`='$senha', `setor`='$setor', `funcao`='$funcao' WHERE  `id`=$id;");
		
		
		return $clientes;
	}

	function excluirUsuario($id){
		$usuario = mysqli_query($this->con,"DELETE FROM `site`.`usuario` WHERE  `id`=$id;");
		
		
			return $usuario;
		
	}

	function getAllUsuarios(){
		
		$usuario = mysqli_query($this->con,"SELECT u.id, CONCAT(u.nome,' ', u.sobrenome) AS nome, u.email, s.nome_setor, f.descricao,f.salario
		FROM usuario AS u
		LEFT JOIN setores AS s ON s.id = u.setor
		LEFT JOIN funcao AS f ON f.id = u.funcao
		ORDER BY f.salario DESC");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($usuario); $i++) ;
		
		return $array;
	}

	function getOneUsuario($id){
		
		$usuario = mysqli_query($this->con,"SELECT * FROM usuario AS u WHERE u.id = $id");
		for($i = 0; $array[$i] = mysqli_fetch_assoc($usuario); $i++) ;
		
		return $array;
	}

	function getSetores(){
		
		$usuario = mysqli_query($this->con,"SELECT * FROM setores AS s");
		
		
			return $usuario;
		
	}
	
	function getFuncoes(){
		
		$usuario = mysqli_query($this->con,"SELECT * FROM funcao AS f");	
		
		return $usuario;
	}

	function CadastrarUsuario($nome,$sobrenome,$setor,$funcao,$email,$senha){
		
		$usuario = mysqli_query($this->con,"INSERT INTO `site`.`usuario` (`nome`, `sobrenome`, `email`, `senha`, `setor`, `funcao`) VALUES ('$nome', '$sobrenome', '$email', '$senha', '$setor', '$funcao');");
		
		return $usuario;	
	}

	




}
?>