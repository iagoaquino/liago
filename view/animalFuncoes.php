<?php
	include_once('../model/animalModel.php');
	include_once('../controler/animalDAO.php');
	$nome = isset($_POST['nome'])?$_POST['nome']:"";
	$raca = isset($_POST['raca'])?$_POST['raca']:"";
	$tipo = isset($_POST['tipo'])?$_POST['tipo']:"";
	$idade = isset($_POST['idade'])?$_POST['idade']:"";
	$cod_cliente = isset($_POST['cod_cliente'])?$_POST['cod_cliente']:"";
	$pesquisa = isset($_POST['pesquisa'])?$_POST['pesquisa']:"";
	$diretorio = '../img/';
	$novo_nome = md5(microtime()).'.jpeg';
	$nome_temporario = isset($_FILES['arquivo']['tmp_name'])?$_FILES['arquivo']['tmp_name']:""; 
	move_uploaded_file($nome_temporario,$diretorio.$novo_nome);

	
	$animal = new Animal();
	$animal->set_nome($nome);
	$animal->set_raca($raca);
	$animal->set_tipo($tipo);
	$animal->set_idade($idade);
	$animal->set_imagem($novo_nome);
	$animal->set_cod_cliente($cod_cliente);
	$apagar = isset($_POST['apagar'])?$_POST['apagar']:"";

	if (!empty($apagar)) {
		$cod = isset($_POST['cod_apagar'])?$_POST['cod_apagar']:"";
		$animal->set_cod($cod);
		$validacao = apagar_animais($animal);
		if (empty($validacao)) {
			header('location:../view/listarAnimais.php?apagado=certo');
		}else if (!empty($validacao)) {
			header('location:../view/listarAnimais.php?apagado=errado');
		}
	}

	if (isset($_POST['pesquisar']) && !empty($pesquisa)) {
		$animais = pesquisar_animais($pesquisa);
	}else{
		$animais = listar_animais();
	}

?>