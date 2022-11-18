<?php
	include_once('../controler/usuarioDAO.php');
	include_once('../model/usuarioModel.php');

	
	$pesquisa = isset($_POST['pesquisa'])?$_POST['pesquisa']:"";
	$usuario = new Usuarios();

	
	$cadastrar = isset($_POST['cadastrar'])?$_POST['cadastrar']:"";
	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";
	$pesquisar = isset($_POST['pesquisar'])?$_POST['pesquisar']:"";
	$apagar = isset($_POST['apagar'])?$_POST['apagar']:"";


	if(!empty($cadastrar)){
		$login = isset($_POST['login'])?$_POST['login']:"";
		$nome = isset($_POST['nome'])?$_POST['nome']:"";
		$senha = isset($_POST['senha'])?$_POST['senha']:"";
		$tipo = isset($_POST['tipo'])?$_POST['tipo']:"";
		$usuario->set_login($login);
		$usuario->set_tipo($tipo);
		$usuario->set_senha(md5($senha));
		$usuario->set_nome($nome);
		$usuario->set_tipo($_POST['tipo']);
		$validacao = validar_funcionario($usuario);
		if (empty($validacao)) {
			cadastrar($usuario);
		}else{
			header('location:../view/listarUsuarios.php?existe=certo');
		}
	}
	if(!empty($apagar)){
		$cod = isset($_POST['cod_apagar'])?$_POST['cod_apagar']:"";
		$usuario->set_cod($cod);
		apagar_usuarios($usuario);
		$validacao = validar_apagar($usuario);
		if (empty($validacao)) {
			header('location:../view/listarUsuarios.php?apagado=certo');
		}else if (!empty($validacao)){
			header('location:../view/listarUsuarios.php?apagado=errado');
		}
	}

	if(!empty($salvar)){
		$cod = isset($_POST['cod'])?$_POST['cod']:"";
		$login = isset($_POST['login'])?$_POST['login']:"";
		$nome = isset($_POST['nome'])?$_POST['nome']:"";
		$tipo = isset($_POST['tipo'])?$_POST['tipo']:"";
		$usuario->set_login($login);
		$usuario->set_cod($cod);
		$usuario->set_nome($nome);
		$usuario->set_tipo($tipo);
		$validacao = validar_funcionario($usuario);
		if (empty($validacao)) {
			editar_usuarios($usuario);
		}else{
			header('location:../view/listarUsuarios.php?existe=certo');
		}
		
	}

	if (isset($_POST['pesquisar']) && !empty($pesquisa)){
		$usuarios = pesquisar_usuarios($pesquisa);
	}else{
		$usuarios = listar_usuarios();
	}

?>