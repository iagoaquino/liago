<?php
	include_once('../model/produtoModel.php');
	include_once('../controler/produtoDAO.php');
	
	$pesquisa = isset($_POST['pesquisa'])?$_POST['pesquisa']:"";
	$diretorio = '../img/';
	if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
		$novo_nome = md5(microtime()).'.jpeg';
		$nome_temporario = isset($_FILES['arquivo']['tmp_name'])?$_FILES['arquivo']['tmp_name']:"";
		move_uploaded_file($nome_temporario,$diretorio.$novo_nome);
	}
	else{
		$novo_nome = "";
	}



	$produto = new Produto();
	


	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";
	$apagar = isset($_POST['apagar'])?$_POST['apagar']:"";

	if($salvar == 'cadastrar'){
		$novo_nome = isset($novo_nome)?$novo_nome:"";
		$nome = isset($_POST['nome'])?$_POST['nome']:"";
		$preco = isset($_POST['preco'])?$_POST['preco']:"";
		$estoque = isset($_POST['estoque'])?$_POST['estoque']:"";
		$especificacoes = isset($_POST['especificacoes'])?$_POST['especificacoes']:"";
		$promocao = isset($_POST['promocao'])?$_POST['promocao']:"";
		$produto->set_nome($nome);
		$produto->set_preco($preco);
		$produto->set_estoque($estoque);
		$produto->set_promocao($promocao);
		$produto->set_imagem($novo_nome);
		$produto->set_especificacoes($especificacoes);
		cadastrar_produtos($produto);
	}
	if(!empty($apagar)){
		$cod = isset($_POST['cod_apagar'])?$_POST['cod_apagar']:"";
		$produto->set_cod($cod);
		apagar_produtos($produto);
		$validacao = validar_apagar_produtos($produto);
		if (empty($validacao)) {
			header('location:../view/listarProdutos.php?apagado=certo');
		}else{
			header('location:../view/listarProdutos.php?apagado=errado');
		}
	}
	if ($salvar == "salvar"){
		if (isset($_FILES['e_arquivo']['name']) && $_FILES['e_arquivo']['error'] == 0) {
		$novo_nome = md5(microtime()).'.jpeg';
		$nome_temporario = isset($_FILES['e_arquivo']['tmp_name'])?$_FILES['e_arquivo']['tmp_name']:"";
		move_uploaded_file($nome_temporario,$diretorio.$novo_nome);
	}else if (empty($_FILES['e_arquivo']['name'])) {
		$novo_nome = $_POST['nome_foto'];
	}
		$cod = isset($_POST['cod'])?$_POST['cod']:"";
		$nome = isset($_POST['nome'])?$_POST['nome']:"";
		$preco = isset($_POST['preco'])?$_POST['preco']:"";
		$estoque = isset($_POST['estoque'])?$_POST['estoque']:"";
		$especificacoes = isset($_POST['especificacoes'])?$_POST['especificacoes']:"";
		$promocao = isset($_POST['promocao'])?$_POST['promocao']:"";
		$produto->set_cod($cod);
		$produto->set_imagem($novo_nome);
		$produto->set_nome($nome);
		$produto->set_preco($preco);
		$produto->set_estoque($estoque);
		$produto->set_promocao($promocao);
		$produto->set_imagem($novo_nome);
		$produto->set_especificacoes($especificacoes);
		editar_produtos($produto);
		echo "eae";
	}
	if (isset($_POST['pesquisar']) && !empty($pesquisa)) {
		$produtos = pesquisar_produtos($pesquisa);
	}else{

	$produtos = listar_produtos();
		
	}






















?>