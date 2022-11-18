<?php 
	function pegar_dados($cliente){
		include_once('config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM cliente WHERE cod = :cod";
			$pegar_dados = $pdo->prepare($sql);
			$pegar_dados->bindValue(':cod',$cliente->get_cod());
			$pegar_dados->execute();
			return $pegar_dados->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function listar_servicos(){
		include_once('config/config.php');
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
	function listar_animais($cliente){
		include_once('config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM animal WHERE cod_cliente = :cod_cliente";
			$listar_animais = $pdo->prepare($sql);
			$listar_animais->bindValue(':cod_cliente',$cliente->get_cod());
			$listar_animais->execute();
			return $listar_animais->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function editar_cliente($cliente){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "UPDATE cliente set nome = :nome, data_nasc = :data_nasc, login =:login, rua = :rua, estado =:estado, cidade=:cidade,bairro = :bairro,numero_casa = :numero_casa, telefone =:telefone WHERE cod = :cod";
			$editar_cliente = $pdo->prepare($sql);
			$editar_cliente->bindValue(':nome',$cliente->get_nome());
			$editar_cliente->bindValue(':login',$cliente->get_login());
			$editar_cliente->bindValue(':data_nasc',$cliente->get_data_nasc());
			$editar_cliente->bindValue(':rua',$cliente->get_rua());
			$editar_cliente->bindValue(':estado',$cliente->get_estado());
			$editar_cliente->bindValue(':cidade',$cliente->get_cidade());
			$editar_cliente->bindValue(':bairro',$cliente->get_bairro());
			$editar_cliente->bindValue(':numero_casa',$cliente->get_numero_casa());
			$editar_cliente->bindValue(':telefone',$cliente->get_telefone());
			$editar_cliente->bindValue(':cod',$cliente->get_cod());
			$editar_cliente->execute();
			header('location:clienteServico.php?editado=certo');
			return true;
		}
		catch(PDOExecption $e){
			return false;
		}
	}
	function listar_configuracoes(){
		include_once('config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM config";
			$listar_configuracoes = $pdo->prepare($sql);
			$listar_configuracoes->execute();
			return $listar_configuracoes->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOExeption $e){
			return false;
		}
	}



?>