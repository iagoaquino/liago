<?php 
	session_start();
	include_once('../controler/clienteProdutoDAO.php');
	include_once('../model/clienteProduto.php');
	$produtos = listar_produtos();
	$clientes = listar_clientes();


	$cliente_produto = new ClienteProduto();

	$cadastrar = isset($_POST['cadastrar'])?$_POST['cadastrar']:"";
	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";
	if (!empty($cadastrar)) {
		$estoque = !empty($estoque)?$estoque:"";
		$data = isset($_POST['data'])?$_POST['data']:"";
		$cod_cliente = isset($_POST['cod_cliente'])?$_POST['cod_cliente']:"";
		$cod_produto = isset($_POST['cod_produto'])?$_POST['cod_produto']:"";
		$quant = isset($_POST['quant'])?$_POST['quant']:"";
		$cliente_produto->set_cod_cliente($cod_cliente);
		$cliente_produto->set_cod_produto($cod_produto);
		$produtos = retornar_quantidade_produto($cliente_produto);
		foreach ($produtos as $produto) {
			$estoque = $produto['estoque'];
		}
		$cliente_produto->set_data($data);
		$cliente_produto->set_quant($quant);
		if ($estoque >= $quant) {
			cadastrar_clientes_produtos($cliente_produto);
			retirar_quantidades($cliente_produto);
			header('location:../view/listarClientesProdutos.php?cadastrado=certo');
		}else{
			header('location:../view/listarClientesProdutos.php?estoque_error=certo');
		}
	}
	if (isset($_POST['apagar'])) {
		$cod = isset($_POST['cod'])?$_POST['cod']:"";
		$cliente_produto->set_cod($cod);
		$validacao = apagar_clientes_produtos($cliente_produto);
		if (empty($validacao)) {
			header('location:../view/listarClientesProdutos.php?apagado=certo');
		}else if(!empty($validacao)) {
			header('location:../view/listarClientesProdutos.php?apagado=errado');
		}
	}
$clientes_produtos = listar_clientes_produtos();



?>