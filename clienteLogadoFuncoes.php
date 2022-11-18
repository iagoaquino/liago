<?php
	session_start();
	include_once('model/clienteModel.php');
	include_once('controler/clienteLogadoDAO.php');
	$telefone = !empty($telefone)?$telefone:"";
	$configs = listar_configuracoes();
	foreach ($configs as $config) {
		$telefone = $config['numero'];
	}
	
	$telefone = str_replace('(','',$telefone);
	$telefone = str_replace(')','',$telefone);
	$telefone = str_replace('-','',$telefone);
	$cliente = new Cliente();
	$cliente->set_cod($_SESSION['cod']);
	$nome = isset($nome)?$nome:"";
	$login = isset($login)?$login:"";
	$data_nascimento = !empty($data_nascimento)?$data_nascimento:"";
	$estado = !empty($estado)?$estado:"";
	$cidade = !empty($cidade)?$cidade:"";
	$bairro = !empty($bairro)?$bairro:"";
	$rua = !empty($rua)?$rua:"";
	$numero_casa = !empty($numero_casa)?$numero_casa:"";
	$telefone_cliente = !empty($telefone_cliente)?$telefone_cliente:"";
	$editar = isset($_POST['editar'])?$_POST['editar']:"";
	$comprar = isset($_POST['comprar'])?$_POST['comprar']:"";
	if (!empty($comprar)){
		$nome_produto = $_POST['nome_produto'];
		$nome_cliente = $_POST['nome_cliente'];
		$login = $_POST['login'];
		$preco = str_replace(',', '.' ,$_POST['preco_produto']) * $_POST['quantidade'];
		$quantidade = $_POST['quantidade'];
		echo "<script>location.href='https://api.whatsapp.com/send?phone=55$telefone&text=ol%C3%A1%20eu%20sou%20$nome_cliente%20e%20quero%20comprar%20$quantidade%20$nome_produto%20pelo%20pre%C3%A7o%20de%20%24$preco%2C00%20meu%20login%20%C3%A8%20$login'</script>";
	}
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
	//não criar nenhuma variavel com o nome cliente apartir daqui
	$clientes = pegar_dados($cliente);
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
	
	$pesquisa = isset($_POST['pesquisa'])?$_POST['pesquisa']:"";
	if (isset($_POST['pesquisar']) && !empty($pesquisa)){
		$produtos = pesquisar_produtos($pesquisa);
	}else{
		$produtos = listar_produtos();
	}
?>