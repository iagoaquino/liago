<?php
	function pegar_dados_pet($animal){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM animal WHERE cod_cliente = :cod_cliente";
			$pegar_dados_pet = $pdo->prepare($sql);
			$pegar_dados_pet->bindValue(':cod_cliente',$animal->get_cod_cliente());
			$pegar_dados_pet->execute();
			return $pegar_dados_pet->fetchAll(PDO::FETCH_ASSOC);
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
			header('location:../view/animalCliente.php');
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
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	function validar_apagar($animal){
		include_once('../config/config.php');
		try {
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM animal WHERE cod= :cod";
			$validar_apagar = $pdo->prepare($sql);
			$validar_apagar->bindValue(':cod',$animal->get_cod());
			$validar_apagar->execute();
			return $validar_apagar->fetchAll(PDO::FETCH_ASSOC); 
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	function editar_animais($animal){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "UPDATE animal set nome=:nome, raca=:raca, idade=:idade, tipo=:tipo, imagem=:imagem WHERE cod=:cod";
			$editar_animais = $pdo->prepare($sql);
			$editar_animais->bindValue(':nome',$animal->get_nome());
			$editar_animais->bindValue(':cod',$animal->get_cod());
			$editar_animais->bindValue(':raca',$animal->get_raca());
			$editar_animais->bindValue(':idade',$animal->get_idade());
			$editar_animais->bindValue(':tipo',$animal->get_tipo());
			$editar_animais->bindValue(':imagem',$animal->get_imagem());
			$editar_animais->execute();
			header('location:../view/animalCliente.php?editado=certo');
		}catch(PDOException $e){
			return false;
		}
	}





















?>