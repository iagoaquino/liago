<?php
	function logar_usuario($usuario){
		try{
			require_once('config/config.php');
			$conectar = new Conexao();
  			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha  AND tipo = 'cliente'";
			$logarUsuario = $pdo->prepare($sql);
			$logarUsuario->bindValue(':login',$usuario->get_login());
			$logarUsuario->bindValue(':senha',$usuario->get_senha());
			$logarUsuario->execute();
			$resultado = $logarUsuario->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}catch(PDOException $e){
		    echo('error:'.$e->getMessage());
		    return false;
		}
	}

	function listar_usuarios(){
		try{
			include_once("../config/config.php");
			$conectar = new Conexao();
  			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM usuario";
			$listarUsuarios = $pdo->prepare($sql);
			$listarUsuarios->execute();
			return $listarUsuarios->fetchAll(PDO::FETCH_ASSOC);
			header('location:../view/listarUsuarios.php');
		}catch(PDOexception $e){
			echo('erro:'. $e->getMessage());
			return false;
		}
	}

	function apagar_usuarios($usuario){
		try{
			include_once("../config/config.php");
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "DELETE FROM usuario WHERE cod = :cod";
			$apagarUsuarios = $pdo->prepare($sql);
			$apagarUsuarios->bindValue(':cod',$usuario->get_cod());
			$apagarUsuarios->execute();
			header('location:../view/listarUsuarios.php');
		}
		catch(PDOException $e){
			return false;
		}

	}
	function validar_apagar($usuario){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM usuario WHERE cod = :cod";
			$validar_apagar = $pdo->prepare($sql);
			$validar_apagar->bindValue(':cod',$usuario->get_cod());
			$validar_apagar->execute();
			return $validar_apagar->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function cadastrar($usuario){
		try{
		include_once('../config/config.php');
		$conectar = new Conexao();
		$pdo = $conectar->conecta();
		$sql = "INSERT INTO usuario (login,nome, tipo, senha) VALUES (:login,:nome,:tipo,:senha)";
		$cadastrarUsuarios = $pdo->prepare($sql);
		$cadastrarUsuarios->bindValue(':login',$usuario->get_login());
		$cadastrarUsuarios->bindValue(':nome',$usuario->get_nome());
		$cadastrarUsuarios->bindValue(':tipo',$usuario->get_tipo());
		$cadastrarUsuarios->bindValue(':senha',$usuario->get_senha());
		$cadastrarUsuarios->execute();
		header('location:../view/listarUsuarios.php?cadastrado=certo');
		}catch(PDOException $e){
			return false;
		}
	}
	function editar_usuarios($usuario){
		try{
		include_once('../config/config.php');
		$conectar = new Conexao();
		$pdo = $conectar->conecta();
		$sql = "UPDATE usuario set login = :login, nome = :nome, tipo=:tipo WHERE cod = :cod";
		$editarUsuarios = $pdo->prepare($sql);
		$editarUsuarios->bindValue(':login',$usuario->get_login());
		$editarUsuarios->bindValue(':nome',$usuario->get_nome());
		$editarUsuarios->bindValue(':tipo',$usuario->get_tipo());
		$editarUsuarios->bindValue(':cod',$usuario->get_cod());
		$editarUsuarios->execute();
		header('location:../view/listarUsuarios.php?editado=certo');
		return true;
		}catch(PDOException $e){
			return false;
		}
	}
	function pesquisar_usuarios($pesquisa){
		try{
		include_once('../config/config.php');
		$conectar = new Conexao();
		$pdo = $conectar->conecta();
		$sql = "SELECT * FROM usuario WHERE cod ='$pesquisa' OR nome LIKE '%$pesquisa%' OR tipo LIKE '%$pesquisa%'";
		$pesquisarUsuarios = $pdo->prepare($sql);
		$pesquisarUsuarios->execute();
		return $pesquisarUsuarios->fetchAll(PDO::FETCH_ASSOC);
		header('location:../view/listarUsuarios.php');
		}
		catch(PDOException $e){
			return false;
		}

	}
	function validar_funcionario($usuario){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM usuario WHERE login=:login AND tipo = :tipo";
			$validar_funcionario = $pdo->prepare($sql);
			$validar_funcionario->bindValue(':login',$usuario->get_login());
			$validar_funcionario->bindValue(':tipo',$usuario->get_tipo());
			$validar_funcionario->execute();
			return $validar_funcionario->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
?>