<?php
	session_start();
	include_once('../controler/loginAdmDAO.php');
	include_once('../model/usuarioModel.php');
	
	$usuario = new Usuarios();
	
	$logar_adm = isset($_POST['logar_adm'])?$_POST['logar_adm']:"";
	$logar_funcionario = isset($_POST['logar_funcionario'])?$_POST['logar_funcionario']:"";

	if (!empty($logar_adm)) {
		$login = isset($_POST['login'])?$_POST['login']:"";
		$senha = isset($_POST['senha'])?$_POST['senha']:"";
		$usuario->set_login($login);
		$usuario->set_senha(md5($senha));
		$usuarios = login_adm($usuario);
		if (!empty($usuarios)) {
			foreach ($usuarios as $usuario ) {
				$_SESSION['cod_administrador'] = $usuario['cod'];
			}
		}else{
			header('location:../view/loginAdm.php?logado=errado');	
		}		
	}
	if (!empty($logar_funcionario)) {
		$login = isset($_POST['login'])?$_POST['login']:"";
		$senha = isset($_POST['senha'])?$_POST['senha']:"";
		$usuario->set_login($login);
		$usuario->set_senha(md5($senha));
		$usuarios = login_funcionario($usuario);
		if (!empty($usuarios)) {
			foreach ($usuarios as $usuario ) {
				$_SESSION['cod_funcionario'] = $usuario['cod'];
			}
		}else{
			header('location:../view/loginAdm.php?logado=errado');	
		}	

	}


?>