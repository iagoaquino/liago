<?php
	function pegar_dados($usuario){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM usuario WHERE cod =:cod";
			$pegar_dados = $pdo->prepare($sql);
			$pegar_dados->bindValue(':cod',$usuario->get_cod());
			$pegar_dados->execute();
			return $pegar_dados->fetchAll(PDO::FETCH_ASSOC);
			header('location:../view/index.php');
		}catch(PDOException $e){
			return false;
		}
	}
	function editar_admin($usuario){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "UPDATE usuario set login =:login, senha=:senha, nome=:nome WHERE cod=:cod";
			$editar_admin = $pdo->prepare($sql);
			$editar_admin->bindValue(':login',$usuario->get_login());
			$editar_admin->bindValue(':senha',$usuario->get_senha());
			$editar_admin->bindValue(':nome',$usuario->get_nome());
			$editar_admin->bindValue(':cod',$usuario->get_cod());
			$editar_admin->execute();
			header('location:../view/');
		}catch(PDOException $e){
			return false;
		}
	}
	function validar_editar($usuario){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM usuario WHERE login =:login AND tipo ='administrador'";
			$validar_editar = $pdo->prepare($sql);
			$validar_editar->bindValue(':login',$usuario->get_login());
			$validar_editar->execute();
			return $validar_editar->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}


?>