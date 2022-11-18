<?php
	include_once('../model/usuarioModel.php');
	include_once('../controler/funcionarioLogadoDAO.php');
	session_start();
	$usuario = new Usuarios();
	$usuario->set_cod($_SESSION['cod_funcionario']);
	$nome = isset($nome)?$nome:"";
	$usuarios = pegar_dados($usuario);
	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";
	if (!empty($salvar) && !empty($_POST['nome'])) {
		$usuario->set_nome($_POST['nome']);
		editar_usuario($usuario);
		header('location:../view/funcionarioLogado.php?editado=certo');
	}
	foreach ($usuarios as $usuario) {
		$nome = $usuario['nome'];
	}
?>