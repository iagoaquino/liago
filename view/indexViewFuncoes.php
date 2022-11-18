<?php
	session_start();
	include_once('../model/usuarioModel.php');
	include_once('../controler/indexViewDAO.php');
	$usuario = new Usuarios();
	$usuario->set_cod($_SESSION['cod_administrador']);

	$usuarios = pegar_dados($usuario);

	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";
	if (!empty($salvar) && isset($_POST['e_login']) && isset($_POST['e_senha']) && isset($_POST['e_nome'])) {
		$e_login = isset($_POST['e_login'])?$_POST['e_login']:"";
		$e_nome = isset($_POST['e_nome'])?$_POST['e_nome']:"";
		$e_senha = isset($_POST['e_senha'])?$_POST['e_senha']:"";
		$usuario->set_login($e_login);
		$usuario->set_senha(md5($e_senha));
		$usuario->set_nome($e_nome);
		$validar = validar_editar($usuario);
		if (empty($validar)) {
			editar_admin($usuario);
		}else{
			header('location:../view/index.php?existe=certo');
		}
		
	}
	$login = isset($login)?$login:"";
	$nome = isset($nome)?$nome :"";
	foreach ($usuarios as $usuario_logado) {
		$login = $usuario_logado['login'];
		$nome = $usuario_logado['nome'];
	}

?>