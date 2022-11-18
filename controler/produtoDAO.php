<?php
	function listar_produtos(){
		try{
			include_once('../config/config.php');
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM produto";
			$listar_produtos = $pdo->prepare($sql);
			$listar_produtos->execute();
			return $listar_produtos->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function cadastrar_produtos($produto){
		try{
			include_once('../config/config.php');
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "INSERT INTO produto (nome,promocao,estoque,preco,especificacoes,imagem) VALUES (:nome,:promocao,:estoque,:preco,:especificacoes,:imagem)";
			$cadastrar_produtos = $pdo->prepare($sql);
			$cadastrar_produtos->bindValue(':nome',$produto->get_nome());
			$cadastrar_produtos->bindValue(':promocao',$produto->get_promocao());
			$cadastrar_produtos->bindValue(':preco',$produto->get_preco());
			$cadastrar_produtos->bindValue(':estoque',$produto->get_estoque());
			$cadastrar_produtos->bindValue(':especificacoes',$produto->get_especificacoes());
			$cadastrar_produtos->bindValue(':imagem',$produto->get_imagem());
			$cadastrar_produtos->execute();
			header('location:../view/listarProdutos.php?cadastrado=certo');
		}catch(PDOException $e){
			return false;
		}
	}
	function apagar_produtos($produto){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "DELETE FROM produto WHERE cod = :cod";
			$apagar_produtos = $pdo->prepare($sql);
			$apagar_produtos->bindValue(':cod',$produto->get_cod());
			$apagar_produtos->execute();
		}catch(PDOException $e){
			return false;
		}
	}
	function validar_apagar_produtos($produto){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM produto WHERE cod=:cod";
			$validar_apagar_produtos = $pdo->prepare($sql);
			$validar_apagar_produtos->bindValue(':cod',$produto->get_cod());
			$validar_apagar_produtos->execute();
			return $validar_apagar_produtos->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function editar_produtos($produto){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "UPDATE produto set nome = :nome , preco = :preco , estoque = :estoque , promocao = :promocao ,imagem =:imagem,especificacoes =:especificacoes WHERE cod = :cod";
			$editar_produtos = $pdo->prepare($sql);
			$editar_produtos->bindValue(':nome',$produto->get_nome());
			$editar_produtos->bindValue(':preco',$produto->get_preco());
			$editar_produtos->bindValue(':estoque',$produto->get_estoque());
			$editar_produtos->bindValue(':especificacoes',$produto->get_especificacoes());
			$editar_produtos->bindValue(':promocao',$produto->get_promocao());
			$editar_produtos->bindValue(':imagem',$produto->get_imagem());
			$editar_produtos->bindValue(':cod',$produto->get_cod());
			$editar_produtos->execute();
			header('location:../view/listarProdutos.php?editado=certo');
		}catch(PDOException $e){
			return false;
		}
	}
	
	function pesquisar_produtos($pesquisa){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM produto WHERE cod = '$pesquisa' OR nome LIKE '%$pesquisa%' OR preco = '$pesquisa' OR estoque = '$pesquisa' OR promocao = '$pesquisa'";
			$pesquisar_produtos = $pdo->prepare($sql);
			$pesquisar_produtos->execute();
			return $pesquisar_produtos->fetchAll(PDO::FETCH_ASSOC);
			header('location:../view/listarProdutos.php');
		}catch(PDOException $e){
			return false;
		}
	}
?>