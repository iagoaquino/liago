<?php
	function pegar_dados($usuario){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM usuario WHERE cod = :cod AND tipo='funcionario'";
			$pegar_dados = $pdo->prepare($sql);
			$pegar_dados->bindValue(':cod',$usuario->get_cod());
			$pegar_dados->execute();
			return $pegar_dados->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e) {
			return false;
		}
	}
	function editar_usuario($usuario){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "UPDATE usuario set nome = :nome WHERE cod=:cod";
			$editar_usuario = $pdo->prepare($sql);
			$editar_usuario->bindValue(':nome',$usuario->get_nome());
			$editar_usuario->bindValue(':cod',$usuario->get_cod());
			$editar_usuario->execute();
		}catch(PDOException $e){
			return false;
		}
	}
?>