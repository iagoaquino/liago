<?php
	session_start();
	include_once('../model/clienteModel.php');
	include_once('../controler/clienteDAO.php');


	$cliente = new Cliente();
	$cadastrar = isset($_POST['cadastrar'])?$_POST['cadastrar']:"";
	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";
	$apagar = isset($_POST['apagar'])?$_POST['apagar']:"";
	if(!empty($cadastrar)){
		$nome = isset($_POST['nome'])?$_POST['nome']:"";
		$data_nasc = isset($_POST['data_nasc'])?$_POST['data_nasc']:"";
		$estado = isset($_POST['estado'])?$_POST['estado']:"";
		$login = isset($_POST['login'])?$_POST['login']:"";
		$email = isset($_POST['email'])?$_POST['email']:"";
		$senha = isset($_POST['senha'])?$_POST['senha']:"";
		$cidade = isset($_POST['cidade'])?$_POST['cidade']:"";
		$bairro = isset($_POST['bairro'])?$_POST['bairro']:"";
		$telefone = isset($_POST['telefone'])?$_POST['telefone']:"";
		$numero_casa = isset($_POST['numero_casa'])?$_POST['numero_casa']:"";
		$rua = isset($_POST['rua'])?$_POST['rua']:"";
		$pesquisa = isset($_POST['pesquisa'])?$_POST['pesquisa']:"";
		$cliente->set_nome($nome);
		$cliente->set_email($email);
		$cliente->set_login($login);
		$cliente->set_senha(md5($senha));
		$cliente->set_data_nasc($data_nasc);
		$cliente->set_estado($estado);
		$cliente->set_rua($rua);
		$cliente->set_cidade($cidade);
		$cliente->set_bairro($bairro);
		$cliente->set_numero_casa($numero_casa);
		$cliente->set_telefone($telefone);
		$cliente->set_cod($cod);
		cadastrar_cliente($cliente);
	}
	if (!empty($apagar)){
		$cliente->set_cod($_POST['cod_apagar']);
		apagar_cliente($cliente);
		$validacao = validar_apagar_cliente($cliente);
		if (empty($validacao)) {
			header('location:../view/listarClientes.php?apagado=certo');
		}else{
			header('location:../view/listarClientes.php?apagado=errado');
		}
	}
	if (!empty($salvar)) {
		$cod = isset($_POST['cod'])?$_POST['cod']:"";
		$nome = isset($_POST['nome'])?$_POST['nome']:"";
		$data_nasc = isset($_POST['data_nasc'])?$_POST['data_nasc']:"";
		$estado = isset($_POST['estado'])?$_POST['estado']:"";
		$login = isset($_POST['login'])?$_POST['login']:"";
		$email = isset($_POST['email'])?$_POST['email']:"";
		$senha = isset($_POST['senha'])?$_POST['senha']:"";
		$cidade = isset($_POST['cidade'])?$_POST['cidade']:"";
		$bairro = isset($_POST['bairro'])?$_POST['bairro']:"";
		$telefone = isset($_POST['telefone'])?$_POST['telefone']:"";
		$numero_casa = isset($_POST['numero_casa'])?$_POST['numero_casa']:"";
		$rua = isset($_POST['rua'])?$_POST['rua']:"";
		$pesquisa = isset($_POST['pesquisa'])?$_POST['pesquisa']:"";
		$cliente->set_nome($nome);
		$cliente->set_email($email);
		$cliente->set_login($login);
		$cliente->set_senha(md5($senha));
		$cliente->set_data_nasc($data_nasc);
		$cliente->set_estado($estado);
		$cliente->set_rua($rua);
		$cliente->set_cidade($cidade);
		$cliente->set_bairro($bairro);
		$cliente->set_numero_casa($numero_casa);
		$cliente->set_telefone($telefone);
		$cliente->set_cod($cod);
		editar_cliente($cliente);
		
	}
	
	if (isset($_POST['pesquisar']) && !empty($pesquisa)){
		$clientes = pesquisar_cliente($pesquisa);
	}else{
		$clientes = listar_clientes();
	}
?>