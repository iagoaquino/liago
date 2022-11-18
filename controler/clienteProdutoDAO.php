<?php

	function listar_clientes_produtos(){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM cliente_produto";
			$listar_clientes_produtos = $pdo->prepare($sql);
			$listar_clientes_produtos->execute();
			return $listar_clientes_produtos->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function pesquisar_login($cod_cliente){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM cliente WHERE cod =:cod_cliente";
			$pesquisar_login = $pdo->prepare($sql);
			$pesquisar_login->bindValue(':cod_cliente',$cod_cliente);
			$pesquisar_login->execute();
			return $pesquisar_login->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function pesquisar_produto($cod_produto){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM produto WHERE cod =:cod_produto";
			$pesquisar_login = $pdo->prepare($sql);
			$pesquisar_login->bindValue(':cod_produto',$cod_produto);
			$pesquisar_login->execute();
			return $pesquisar_login->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}

	function listar_produtos(){
		try{
			include_once('../config/config.php');
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM produto ORDER BY nome ASC";
			$listar_produtos = $pdo->prepare($sql);
			$listar_produtos->execute();
			return $listar_produtos->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function listar_clientes(){
		try{
		include_once('../config/config.php');
		$conectar = new Conexao();
		$pdo = $conectar->conecta();
		$sql ="SELECT * FROM cliente ORDER BY login ASC";
		$listar_clientes = $pdo->prepare($sql);
		$listar_clientes->execute();
		return $listar_clientes->fetchAll(PDO::FETCH_ASSOC);
		header('location:../view/listarClientes.php');
		}catch(PDOExecption $e){
			return false;
		}
	}

	function cadastrar_clientes_produtos($cliente_produto){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "INSERT INTO cliente_produto(data,cod_cliente,cod_produto,quant) VALUES (:data,:cod_cliente,:cod_produto,:quant)";
			$cadastrar_clientes_produtos = $pdo->prepare($sql);
			$cadastrar_clientes_produtos->bindValue(':data',$cliente_produto->get_data());
			$cadastrar_clientes_produtos->bindValue(':cod_cliente',$cliente_produto->get_cod_cliente());
			$cadastrar_clientes_produtos->bindValue(':cod_produto',$cliente_produto->get_cod_produto());
			$cadastrar_clientes_produtos->bindValue(':quant',$cliente_produto->get_quant());
			$cadastrar_clientes_produtos->execute();
		}catch(PDOException $e){
			return false;
		}
	}
	function apagar_clientes_produtos($cliente_produto){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "DELETE FROM cliente_produto WHERE cod=:cod";
			$apagar_clientes_produtos = $pdo->prepare($sql);
			$apagar_clientes_produtos->bindValue(':cod',$cliente_produto->get_cod());
			$apagar_clientes_produtos->execute();
		}catch(PDOException $e){
			return false;
		}
	}
	function validar_apagar($cliente_produto){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM cliente_produto WHERE cod =:cod";
			$validar_apagar = $pdo->prepare($sql);
			$validar_apagar->bindValue(':cod',$cliente_produto->get_cod());
			$validar_apagar->execute();
			return $validar_apagar->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}

	function editar_clientes_produtos($cliente_produto){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql ="UPDATE cliente_produto set data = :data, cod_produto = :cod_produto ,cod_cliente =:cod_cliente WHERE cod = :cod";
			$editar_clientes_produtos = $pdo->prepare($sql);
			$editar_clientes_produtos->bindValue(':data',$cliente_produto->get_data());
			$editar_clientes_produtos->bindValue(':cod_produto',$cliente_produto->get_cod_produto());
			$editar_clientes_produtos->bindValue(':cod_cliente',$cliente_produto->get_cod_cliente());
			$editar_clientes_produtos->bindValue(':cod',$cliente_produto->get_cod());
			$editar_clientes_produtos->execute();
			header('location:../view/listarClientesProdutos.php?editado=certo');

		}catch(PDOException $e){
			return false;
		}
	}
	function retornar_quantidade_produto($cliente_produto){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM produto WHERE cod=:cod_produto";
			$retornar_quantidade_produto = $pdo->prepare($sql);
			$retornar_quantidade_produto->bindValue(':cod_produto',$cliente_produto->get_cod_produto());
			$retornar_quantidade_produto->execute();
			return $retornar_quantidade_produto->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
    function retirar_quantidades($cliente_produto){
    	include_once('../config/config.php');
    	try{
    		$conectar = new Conexao();
    		$pdo = $conectar->conecta();
    		$sql = "UPDATE produto set estoque = estoque - :estoque WHERE cod = :cod_produto ";
    		$retirar_quantidades = $pdo->prepare($sql);
    		$retirar_quantidades->bindValue(':estoque',$cliente_produto->get_quant());
    		$retirar_quantidades->bindValue(':cod_produto',$cliente_produto->get_cod_produto());
    		$retirar_quantidades->execute(); 
    	}catch(PDOException $e){
    		echo "error";
    	}
    }


?>