<?php
	function listar_imagens(){
		include_once('../config/config.php');
		try{	
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM imagens";
			$listar_imagens = $pdo->prepare($sql);
			$listar_imagens ->execute();
			return $listar_imagens->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}

	function cadastrar_imagens($imagem){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "INSERT INTO imagens(url,cod_produto) VALUES (:url,:cod_produto)";
			$cadastrar_imagens = $pdo->prepare($sql);
			$cadastrar_imagens->bindValue(':url',$imagem->get_url());
			$cadastrar_imagens->bindValue(':cod_produto',$imagem->get_cod_produto());
			$cadastrar_imagens->execute();
			header("location:../view/listarImagens.php");
		}catch(PDOException $e){
			return false;
		}
	}
	function apagar_imagens($imagem){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "DELETE FROM imagens WHERE cod = :cod";
			$apagar_imagens = $pdo->prepare($sql);
			$apagar_imagens->bindValue(':cod',$imagem->get_cod());
			$apagar_imagens->execute();
			header("location:../view/listarImagens.php");
		}catch(PDOException $e){
			return false;
		}
	}






?>