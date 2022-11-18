<?php
	function listar_animais(){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM animal";
			$listar_animais = $pdo->prepare($sql);
			$listar_animais->execute();
			return $listar_animais->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function cadastrar_animais($animal){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "INSERT INTO animal(nome,tipo,raca,idade,imagem,cod_cliente) VALUES (:nome,:tipo,:raca,:idade,:imagem,:cod_cliente)";
			$cadastrar_animais = $pdo->prepare($sql);
			$cadastrar_animais->bindValue(':nome',$animal->get_nome());
			$cadastrar_animais->bindValue(':tipo',$animal->get_tipo());
			$cadastrar_animais->bindValue(':raca',$animal->get_raca());
			$cadastrar_animais->bindValue(':idade',$animal->get_idade());
			$cadastrar_animais->bindValue(':imagem',$animal->get_imagem());
			$cadastrar_animais->bindValue(':cod_cliente',$animal->get_cod_cliente());

			$cadastrar_animais->execute();
			header('location:../view/listarAnimais.php');
		}catch(PDOException $e){
			return false;
		}
	}

	function apagar_animais($animal){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "DELETE FROM animal WHERE cod = :cod";
			$apagar_animais = $pdo->prepare($sql);
			$apagar_animais->bindValue(':cod',$animal->get_cod());
			$apagar_animais->execute();
			header('location:../view/listarAnimais.php');
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	function validar_apagar($animal){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM animal WHERE cod = :cod";
			$validar_apagar = $pdo->prepare($sql);
			$validar_apagar->bindValue(':cod',$animal->get_cod());
			$validar_apagar->execute();
			return $validar_apagar->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}

	function pesquisar_animais($pesquisa){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM animal WHERE cod = '$pesquisa' OR nome LIKE '%$pesquisa%' OR cod_cliente = '$pesquisa' OR raca LIKE '%$pesquisa%' OR  tipo LIKE '%$pesquisa%' OR idade = '$pesquisa'";
			$pesquisar_animais = $pdo->prepare($sql);
			$pesquisar_animais->execute();
			return $pesquisar_animais->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}















?>