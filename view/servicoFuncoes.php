<?php 
	include_once('../controler/servicoDAO.php');
	include_once('../model/servicoModel.php');
	$servico = new Servico();

	$apagar = isset($_POST['apagar'])?$_POST['apagar']:"";
	$cadastrar = isset($_POST['cadastrar'])?$_POST['cadastrar']:"";
	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";
	if (!empty($cadastrar)) {
		
		$nome = isset($_POST['nome'])?$_POST['nome']:"";
		$promocao = isset($_POST['promocao'])?$_POST['promocao']:"";
		$observacoes = isset($_POST['observacoes'])?$_POST['observacoes']:"";
		$preco = isset($_POST['preco'])?$_POST['preco']:"";
		$servico->set_nome($nome);
		$servico->set_promocao($promocao);
		$servico->set_observacoes($observacoes);
		$servico->set_preco($preco);
		cadastrar_servicos($servico);
		$validacao = validar_cadastro($servico);
		if (!empty($validacao)) {
			header('location:../view/listarServicos.php?cadastrado=certo');
		}else{
			header('location:../view/listarServicos.php?cadastrado=errado');
		}
	}

	if (!empty($apagar)) {
		$cod = isset($_POST['cod_apagar'])?$_POST['cod_apagar']:"";
		$servico->set_cod($cod);
		apagar_servicos($servico);
		$validacao = validar_apagar($servico);
		if (empty($validacao)) {
			header('location:../view/listarServicos.php?apagado=certo');
		}else if(!empty($validacao)){
			header('location:../view/listarServicos.php?apagado=errado');
		}
	}
	if (!empty($salvar)) {
		$cod = isset($_POST['cod'])?$_POST['cod']:"";
		$nome = isset($_POST['nome'])?$_POST['nome']:"";
		$promocao = isset($_POST['promocao'])?$_POST['promocao']:"";
		$observacoes = isset($_POST['observacoes'])?$_POST['observacoes']:"";
		$preco = isset($_POST['preco'])?$_POST['preco']:"";
		$servico->set_cod($cod);
		$servico->set_nome($nome);
		$servico->set_promocao($promocao);
		$servico->set_observacoes($observacoes);
		$servico->set_preco($preco);
		editar_servicos($servico);
	}
	$pesquisa = isset($_POST['pesquisa'])?$_POST['pesquisa']:"";
	if (isset($_POST['pesquisar']) && !empty($pesquisa)) {
		$servicos = pesquisar_servicos($pesquisa);
	}else{
		$servicos = listar_servicos();
	}






?>