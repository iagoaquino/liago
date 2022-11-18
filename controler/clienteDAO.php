<?php
	function listar_clientes(){
		try{
		include_once('../config/config.php');
		$conectar = new Conexao();
		$pdo = $conectar->conecta();
		$sql ="SELECT * FROM cliente";
		$listar_clientes = $pdo->prepare($sql);
		$listar_clientes->execute();
		return $listar_clientes->fetchAll(PDO::FETCH_ASSOC);
		header('location:../view/listarClientes.php');
		}catch(PDOExecption $e){
			return false;
		}
	}
	function cadastrar_cliente($cliente){
		try{
			include_once('../config/config.php');
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "INSERT INTO cliente(data_nasc,nome,email,login,senha,rua,estado,cidade,bairro,numero_casa,telefone) VALUES(:data_nasc,:nome,:email,:login,:senha,:rua,:estado,:cidade,:bairro,:numero_casa,:telefone)";
			$cadastrar_cliente = $pdo->prepare($sql);
			$cadastrar_cliente->bindValue(':data_nasc',$cliente->get_data_nasc());
			$cadastrar_cliente->bindValue(':nome',$cliente->get_nome());
			$cadastrar_cliente->bindValue(':email',$cliente->get_email());
			$cadastrar_cliente->bindValue(':login',$cliente->get_login());
			$cadastrar_cliente->bindValue(':senha',$cliente->get_senha());
			$cadastrar_cliente->bindValue(':rua',$cliente->get_rua());
			$cadastrar_cliente->bindValue(':estado',$cliente->get_estado());
			$cadastrar_cliente->bindValue(':cidade',$cliente->get_cidade());
			$cadastrar_cliente->bindValue(':bairro',$cliente->get_bairro());
			$cadastrar_cliente->bindValue(':numero_casa',$cliente->get_numero_casa());
			$cadastrar_cliente->bindValue(':telefone',$cliente->get_telefone());
			$cadastrar_cliente->execute();
			header('location:../view/listarClientes.php?cadastrado=certo');
			return true;
		}catch(PDOExecption $e){
 			return false;
		}
		
	}

	function apagar_cliente($cliente){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "DELETE FROM cliente WHERE cod = :cod";
			$apagar_cliente = $pdo->prepare($sql);
			$apagar_cliente->bindValue(':cod',$cliente->get_cod());
			$apagar_cliente->execute();
		}
		catch(PDOExecption $e){
			echo "error";
		}
	}

	function validar_apagar_cliente($cliente){
		try{
			include_once('../config/config.php');
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM cliente WHERE cod=:cod";
			$validar_apagar_cliente = $pdo->prepare($sql);
			$validar_apagar_cliente->bindValue(':cod',$cliente->get_cod());
			$validar_apagar_cliente->execute();
			return $validar_apagar_cliente->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOExecption $e){
			
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
			header('location:../view/listarClientes.php?editado=certo');
			return true;
		}
		catch(PDOExecption $e){
			return false;
		}
	}
	function pesquisar_cliente($pesquisa){
		try{
		include_once('../config/config.php');
		$conectar = new Conexao();
		$pdo = $conectar->conecta();
		$sql = "SELECT * FROM cliente WHERE cod ='$pesquisa' OR nome  LIKE '%$pesquisa%' OR login LIKE '%$pesquisa%' OR data_nasc LIKE '%$pesquisa%' OR rua LIKE '%$pesquisa%'  OR estado LIKE '%$pesquisa%' OR cidade LIKE '%$pesquisa%' OR numero_casa = '$pesquisa' OR telefone LIKE '%$pesquisa%' OR bairro LIKE '%$pesquisa%'";
		$pesquisar_cliente = $pdo->prepare($sql);
		$pesquisar_cliente->execute();
		return $pesquisar_cliente->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOExecption $e){
			return false;
		}
	}

?>
