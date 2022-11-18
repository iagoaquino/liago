<?php
include_once('controler/clienteServicoDAO.php');
include_once('model/ClienteModel.php');
session_start();
$cliente = new Cliente();
$cliente->set_cod($_SESSION['cod']);
$animais = listar_animais($cliente);

$nome = !empty($nome)?$nome:"";
$login = !empty($login)?$login:"";
$editar = isset($_POST['editar'])?$_POST['editar']:"";
$clientes = pegar_dados($cliente);

	if (!empty($editar)){
		$cliente->set_nome($_POST['nome']);
		$cliente->set_login($_POST['login']);
		$cliente->set_data_nasc($_POST['data_nasc']);
		$cliente->set_cidade($_POST['cidade']);
		$cliente->set_bairro($_POST['bairro']);
		$cliente->set_estado($_POST['estado']);
		$cliente->set_rua($_POST['rua']);
		$cliente->set_bairro($_POST['bairro']);
		$cliente->set_numero_casa($_POST['numero_casa']);
		$cliente->set_telefone($_POST['telefone']);
		editar_cliente($cliente);
	}
	foreach ($clientes as $cliente) {
		$nome = $cliente['nome'];
		$login = $cliente['login'];
		$data_nascimento = $cliente['data_nasc'];
		$estado = $cliente['estado'];
		$cidade = $cliente['cidade'];
		$bairro = $cliente['bairro'];
		$rua = $cliente['rua'];
		$numero_casa = $cliente['numero_casa'];
		$telefone_cliente = $cliente['telefone'];
	}
	$telefone = !empty($telefone)?$telefone:"";
	$configs = listar_configuracoes();
	foreach ($configs as $config) {
		$telefone = $config['numero'];
	}
	$telefone = str_replace('(','',$telefone);
	$telefone = str_replace(')','',$telefone);
	$telefone = str_replace('-','',$telefone);
$solicitar = isset($_POST['solicitar'])?$_POST['solicitar']:"";
if (!empty($solicitar)) {
	$nome_animal = $_POST['animal'];
	$nome_cliente = $nome;
	$preco = $_POST['preco'];
	$nome_servico = $_POST['nome_servico'];
	echo "<script>location.href='https://api.whatsapp.com/send?phone=55$telefone&text=ol%C3%A1%20eu%20sou%20$nome_cliente%20e%20quero%20solicitar%20o%20servi%C3%A7o%20$nome_servico%20para%20o%20meu%20$nome_animal%20pelo%20pre%C3%A7o%20de%20R%24$preco%2C00%20e%20meu%20login%20%C3%A9%20$login'</script>";

}
$servicos = listar_servicos();





?>