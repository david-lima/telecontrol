<?php
require_once('Connection.php');
class modelLogin{


	function __construct(){
	
		$objConnection = new Connection();
		$this->con = $objConnection->Conectar();
		
	}
		
	function verificaUser($email,$senha){
		
		$q_usuario = mysqli_query($this->con,"select * from usuario where usuario.email ='".$email."' AND usuario.senha ='".$senha."' limit 1");
		
		return mysqli_fetch_array($q_usuario);
	}


	function registraUser($nome,$sobrenome,$email,$senha){
		
		$usuario = mysqli_query($this->con,"INSERT INTO `usuario` (`nome`, `sobrenome`, `email`, `senha`) VALUES ('".$nome."', '".$sobrenome."', '".$email."', '".$senha."')");
		
		return mysqli_fetch_array($usuario);
	}
}
?>