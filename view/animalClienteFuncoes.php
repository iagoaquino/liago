<?php
	session_start();
	include_once('../model/animalModel.php');
	include_once('../controler/clienteAnimalDAO.php');
	$cod = $_SESSION['cod'];
	$animal = new Animal();
	$sem_animal = false;
	$animal->set_cod_cliente($cod);
	$animais = pegar_dados_pet($animal);
		if (empty($animais)){
			$sem_animal = true;
		}
	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";
	$apagar = isset($_POST['apagar'])?$_POST['apagar']:"";
	if ($salvar == "cadastrar"){
		$cadastrar_nome = isset($_POST['nome'])?$_POST['nome']:"";
		$cadastrar_raca = isset($_POST['raca'])?$_POST['raca']:"";
		$cadastrar_idade = isset($_POST['idade'])?$_POST['idade']:"";
		$cadastrar_tipo = isset($_POST['tipo'])?$_POST['tipo']:"";
		$diretorio = '../img/';
		$novo_nome = md5(microtime()).'.jpeg';
		$nome_temporario = isset($_FILES['arquivo']['tmp_name'])?$_FILES['arquivo']['tmp_name']:""; 
		move_uploaded_file($nome_temporario,$diretorio.$novo_nome);
		$animal->set_nome($cadastrar_nome);
		$animal->set_raca($cadastrar_raca);
		$animal->set_idade($cadastrar_idade);
		$animal->set_tipo($cadastrar_tipo);
		$animal->set_imagem($novo_nome);
		cadastrar_animais($animal);
	}
	if (!empty($apagar)) {
		$animal->set_cod($_POST['cod_apagar']);
		apagar_animais($animal);
		$validacao = validar_apagar($animal);
		if (empty($validacao)) {
			header('location:../view/animalCliente.php?apagado=certo');
		}else{
			header('location:../view/animalCliente.php?apagado=errado');
		}
	}
	if ($salvar == "salvar") {
		$animal->set_cod($_POST['e_cod']);
		$animal->set_nome($_POST['e_nome']);
		$animal->set_raca($_POST['e_raca']);
		$animal->set_idade($_POST['e_idade']);
		$animal->set_tipo($_POST['e_tipo']);
		$diretorio = '../img/';
		$e_novo_nome = md5(microtime()).'.jpeg';
		$e_nome_temporario = isset($_FILES['e_arquivo']['tmp_name'])?$_FILES['e_arquivo']['tmp_name']:""; 
		move_uploaded_file($e_nome_temporario,$diretorio.$e_novo_nome);
		if ($_FILES['e_arquivo']['name'] == "") {
			$e_novo_nome = $_POST['texto_foto'];
		}
		$animal->set_imagem($e_novo_nome);
		editar_animais($animal);

	}

?>