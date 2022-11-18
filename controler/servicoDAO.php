<?php
	function listar_servicos(){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM servico";
			$listar_servicos = $pdo->prepare($sql);
			$listar_servicos->execute();
			return $listar_servicos->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException  $e){
			return false;
		}
	}
	function cadastrar_servicos($servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "INSERT INTO servico(nome,preco,promocao,observacoes) VALUES (:nome,:preco,:promocao,:observacoes)";
			$cadastrar_servicos = $pdo->prepare($sql);
			$cadastrar_servicos->bindValue(':nome',$servico->get_nome());
			$cadastrar_servicos->bindValue(':preco',$servico->get_preco());
			$cadastrar_servicos->bindValue(':promocao',$servico->get_promocao());
			$cadastrar_servicos->bindValue(':observacoes',$servico->get_observacoes());
			$cadastrar_servicos->execute();
		}catch(PDOException $e){
			return false;
		}
	}
	function validar_cadastro($servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM servico WHERE nome =:nome";
			$validar_cadastro = $pdo->prepare($sql);
			$validar_cadastro->bindValue(':nome',$servico->get_nome());
			$validar_cadastro->execute();
			return $validar_cadastro->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function validar_apagar($servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM servico WHERE cod =:cod";
			$validar_cadastro = $pdo->prepare($sql);
			$validar_cadastro->bindValue(':cod',$servico->get_cod());
			$validar_cadastro->execute();
			return $validar_cadastro->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function editar_servicos($servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "UPDATE servico set nome = :nome, preco= :preco, promocao = :promocao, observacoes =:observacoes WHERE cod = :cod";
			$editar_servicos = $pdo->prepare($sql);
			$editar_servicos->bindValue(':nome',$servico->get_nome());
			$editar_servicos->bindValue(':preco',$servico->get_preco());
			$editar_servicos->bindValue(':promocao',$servico->get_promocao());
			$editar_servicos->bindValue(':observacoes',$servico->get_observacoes());
			$editar_servicos->bindValue(':cod',$servico->get_cod());
			$editar_servicos->execute();
			header('location:../view/listarServicos.php?editado=certo');
		}catch(PDOException $e){
			return false;
		}
	}
	function apagar_servicos($servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "DELETE FROM servico WHERE cod = :cod";
			$apagar_servicos = $pdo->prepare($sql);
			$apagar_servicos->bindValue(':cod',$servico->get_cod());
			$apagar_servicos->execute();
			header('location:../view/listarServicos.php');
		}
		catch(PDOException $e){
			return false;
		}
	}
	function pesquisar_servicos($pesquisa){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM servico WHERE cod = '$pesquisa' OR nome LIKE '%$pesquisa%' OR observacoes LIKE '%$pesquisa%' OR promocao LIKE '%$pesquisa%' OR preco LIKE '%$pesquisa%'";
			$pesquisar_servicos = $pdo->prepare($sql);
			$pesquisar_servicos->execute();
			return $pesquisar_servicos->fetchAll(PDO::FETCH_ASSOC);
			header('location:../view/listarServicos.php');
		}catch(PDOException $e){
			return false;
		}
	}

?>