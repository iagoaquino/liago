<?php
	include_once('../controler/clienteServicoViewDAO.php');
	include_once('../Model/clienteServicoModel.php');


	$clientes_servicos = listar_clientes_servicos();
	$cliente_servico = new ClienteServico();
	$cadastrar = isset($_POST['cadastrar'])?$_POST['cadastrar']:"";
	$editar = isset($_POST['editar'])?$_POST['editar']:"";
	if (!empty($cadastrar) && !empty($_POST['data']) && !empty($_POST['cod_cliente']) && !empty($_POST['cod_servico'])) {
		$cliente_servico->set_cod_servico($_POST['cod_servico']);
		$cliente_servico->set_cod_cliente($_POST['cod_cliente']);
		$cliente_servico->set_data($_POST['data']);
		$validar_servico = validar_cod_servico($cliente_servico);
		$validar_cliente = validar_cod_cliente($cliente_servico);
		if (!empty($validar_servico)) {
			if (!empty($validar_cliente)) {	
				cadastrar_clientes_servicos($cliente_servico);
				$validacao = validar_cadastro($cliente_servico);
				if (!empty($validacao)) {
					header('location:../view/listarClientesServicosView.php?cadastro=certo');
				}
			}else{
				header('location:../view/listarClientesServicosView.php?cod_cliente_error=certo'); 
			}
		}else{
			header('location:../view/listarClientesServicosView.php?cod_servico_error=certo');
		}
	}
	if (isset($_POST['apagar'])) {
		$cliente_servico->set_cod($_POST['cod']);
		apagar_clientes_servicos($cliente_servico);
		$validar_apagar = validar_apagar($cliente_servico);
		if (empty($validar_apagar)) {
			header('location:../view/listarClientesServicosView.php?apagado=certo');
		}else if(!empty($validar_apagar)){
			header('location:../view/listarClientesServicosView.php?apagado=errado');
		}
	}
	if (!empty($_POST['editar']) && !empty($_POST['cod_cliente']) && !empty($_POST['data']) && !empty($_POST['cod_servico'])) {
		$cliente_servico->set_cod($_POST['cod']);
		$cliente_servico->set_cod_servico($_POST['cod_servico']);
		$cliente_servico->set_cod_cliente($_POST['cod_cliente']);
		$cliente_servico->set_data($_POST['data']);
		$validar_servico = validar_cod_servico($cliente_servico);
		$validar_cliente = validar_cod_cliente($cliente_servico);
		if (!empty($validar_servico)) {
			if (!empty($validar_cliente)) {	
				editar_servicos($cliente_servico);
			}else{
				header('location:../view/listarClientesServicosView.php?cod_cliente_error=certo'); 
			}
		}else{
			header('location:../view/listarClientesServicosView.php?cod_servico_error=certo');
		}
	}
?>






