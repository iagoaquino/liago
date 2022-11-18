<?php
	function login_adm($usuario){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha AND tipo = 'administrador'";
			$login_adm = $pdo->prepare($sql);
			$login_adm->bindValue(':login',$usuario->get_login());
			$login_adm->bindValue(':senha',$usuario->get_senha());
			$login_adm->execute();
			return $login_adm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){

		}
	}
	function login_funcionario($usuario){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha AND tipo = 'funcionario'";
			$login_funcionario = $pdo->prepare($sql);
			$login_funcionario->bindValue(':login',$usuario->get_login());
			$login_funcionario->bindValue(':senha',$usuario->get_senha());
			$login_funcionario->execute();
			return $login_funcionario->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
?>