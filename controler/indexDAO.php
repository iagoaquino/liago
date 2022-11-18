<?php
	function listar_config_para_index(){
		include_once('config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM config";
			$listar_config_para_index = $pdo->prepare($sql);
			$listar_config_para_index->execute();
			return $listar_config_para_index->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function logar_usuarios($cliente){
		include_once('config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM cliente WHERE login = :login AND senha = :senha";
			$logar_usuario = $pdo->prepare($sql);
			$logar_usuario->bindValue(':login',$cliente->get_login());
			$logar_usuario->bindValue(':senha',$cliente->get_senha());
			$logar_usuario->execute();
			return $logar_usuario->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function validar_cadastro($cliente){
		include_once('config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT nome FROM cliente WHERE login =:login";
			$validar_cadastro = $pdo->prepare($sql);
			$validar_cadastro->bindValue(':login',$cliente->get_login());
			$validar_cadastro->execute();
			return $validar_cadastro->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}
	function cadastrar_clientes($cliente){
		try{
			include_once('config/config.php');
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "INSERT INTO cliente(data_nasc,nome,login,senha,rua,estado,cidade,bairro,numero_casa,telefone) VALUES(:data_nasc,:nome,:login,:senha,:rua,:estado,:cidade,:bairro,:numero_casa,:telefone)";
			$cadastrar_cliente = $pdo->prepare($sql);
			$cadastrar_cliente->bindValue(':data_nasc',$cliente->get_data_nasc());
			$cadastrar_cliente->bindValue(':nome',$cliente->get_nome());
			$cadastrar_cliente->bindValue(':login',$cliente->get_login());
			$cadastrar_cliente->bindValue(':senha',$cliente->get_senha());
			$cadastrar_cliente->bindValue(':rua',$cliente->get_rua());
			$cadastrar_cliente->bindValue(':estado',$cliente->get_estado());
			$cadastrar_cliente->bindValue(':cidade',$cliente->get_cidade());
			$cadastrar_cliente->bindValue(':bairro',$cliente->get_bairro());
			$cadastrar_cliente->bindValue(':numero_casa',$cliente->get_numero_casa());
			$cadastrar_cliente->bindValue(':telefone',$cliente->get_telefone());
			$cadastrar_cliente->execute();
		}catch(PDOExecption $e){
 			return false;
		}
		
	}
?>
