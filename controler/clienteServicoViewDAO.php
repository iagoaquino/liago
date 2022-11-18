<?php
	function listar_clientes_servicos(){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM cliente_servico";
			$listar_clientes_servicos = $pdo->prepare($sql);
			$listar_clientes_servicos->execute();
			return $listar_clientes_servicos->fetchAll(PDO::FETCH_ASSOC);
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
	function pesquisar_servico($cod_servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM servico WHERE cod =:cod_servico";
			$pesquisar_servico = $pdo->prepare($sql);
			$pesquisar_servico->bindValue(':cod_servico',$cod_servico);
			$pesquisar_servico->execute();
			return $pesquisar_servico->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function listar_servicos(){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM servico ORDER BY nome ASC";
			$listar_servicos = $pdo->prepare($sql);
			$listar_servicos->execute();
			return $listar_servicos->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException  $e){
			return false;
		}
	}
	function cadastrar_clientes_servicos($cliente_servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "INSERT INTO cliente_servico (data,cod_cliente,cod_servico) VALUES (:data,:cod_cliente,:cod_servico)";
			$cadastrar_clientes_servicos = $pdo->prepare($sql);
			$cadastrar_clientes_servicos->bindValue(':data',$cliente_servico->get_data());
			$cadastrar_clientes_servicos->bindValue(':cod_cliente',$cliente_servico->get_cod_cliente());
			$cadastrar_clientes_servicos->bindValue(':cod_servico',$cliente_servico->get_cod_servico());
			$cadastrar_clientes_servicos->execute();
		}catch(PDOException $e){
			return false;
		}
	}
	function validar_cadastro($cliente_servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM cliente_servico WHERE data =:data AND cod_servico =:cod_servico AND cod_cliente =:cod_cliente";
			$validar_cadastro = $pdo->prepare($sql);
			$validar_cadastro->bindValue(':data',$cliente_servico->get_data());
			$validar_cadastro->bindValue(':cod_servico',$cliente_servico->get_cod_servico()); 
			$validar_cadastro->bindValue(':cod_cliente',$cliente_servico->get_cod_cliente()); 
			$validar_cadastro->execute();
			return $validar_cadastro->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){

		}
	}
	function validar_cod_cliente($cliente_servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql ="SELECT nome FROM cliente WHERE cod = :cod_cliente";
			$validar_cod_cliente = $pdo->prepare($sql);
			$validar_cod_cliente->bindValue(':cod_cliente',$cliente_servico->get_cod_cliente());
			$validar_cod_cliente->execute();
			return $validar_cod_cliente->fetchAll();
		}catch(PDOException $e){

		}
	}
	function validar_cod_servico($cliente_servico){
		include_once('../config/config.php');
		try{
			$conectar =  new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT nome FROM servico WHERE cod = :cod_servico";
			$validar_cod_servico = $pdo->prepare($sql);
			$validar_cod_servico->bindValue(':cod_servico',$cliente_servico->get_cod_servico());
			$validar_cod_servico->execute();
			return $validar_cod_servico->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function apagar_clientes_servicos($cliente_servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "DELETE FROM cliente_servico WHERE cod = :cod";
			$apagar_clientes_servicos = $pdo->prepare($sql);
			$apagar_clientes_servicos->bindValue(':cod',$cliente_servico->get_cod());
			$apagar_clientes_servicos->execute();
		}catch(PDOException $e){
			return false;
		}
	}
	function validar_apagar($cliente_servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM cliente_servico WHERE cod =:cod";
			$validar_apagar = $pdo->prepare($sql);
			$validar_apagar->bindValue(':cod',$cliente_servico->get_cod());
			$validar_apagar->execute();
			return $validar_apagar->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function editar_servicos($cliente_servico){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "UPDATE cliente_servico set cod_cliente =:cod_cliente , cod_servico= :cod_servico, data=:data WHERE cod=:cod";
			$editar_servicos = $pdo->prepare($sql);
			$editar_servicos->bindValue(':cod_cliente',$cliente_servico->get_cod_cliente());
			$editar_servicos->bindValue(':cod_servico',$cliente_servico->get_cod_servico());
			$editar_servicos->bindValue(':data',$cliente_servico->get_data());
			$editar_servicos->bindValue(':cod',$cliente_servico->get_cod());
			$editar_servicos->execute();
			header('location:../view/listarClientesServicosView.php?editado=certo');
		}catch(PDOException $e){
			return false;
		}
	}
?>