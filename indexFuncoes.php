<?php
	include_once('controler/indexDAO.php');
	include_once('model/clienteModel.php');
	$configuracoes = listar_config_para_index();
	session_start();
	/*setando log*/
	$logar_usuario = isset($logar_usuario)?$logar_usuario:"";
	$login = isset($_POST['login'])?$_POST['login']:"";
  $senha = isset($_POST['senha'])?$_POST['senha']:"";
 	$cliente  = new Cliente();
  $logar = isset($_POST['logar'])?$_POST['logar']:"";

  	$nome = isset($nome)?$nome:"";

  	/*testando o log*/
  	if (!empty($logar)) {
      $cliente->set_login($login);
      $cliente->set_senha(md5($senha));
  		$logar_clientes = logar_usuarios($cliente);
  		if(!empty($logar_clientes)) {
  			foreach ($logar_clientes as $logar_cliente) {
  				$cod = $logar_cliente['cod'];
  				$_SESSION['cod'] = $cod;
  		}
      }else{
        header('location:index.php?logar=error');
  	}
  	}
  	$cadastrar = isset($_POST['cadastrar'])?$_POST['cadastrar']:"";
  	/*setando o cadastro*/
  	
  	if (!empty($cadastrar)){
  		$cadastrar_nome = $_POST['nome']?$_POST['nome']:"";
  		$cadastrar_data_nasc = $_POST['data_nasc']?$_POST['data_nasc']:"";
  		$cadastrar_estado = $_POST['estado']?$_POST['estado']:"";
  		$cadastrar_cidade = $_POST['cidade']?$_POST['cidade']:"";
  		$cadastrar_bairro = $_POST['bairro']?$_POST['bairro']:"";
  		$cadastrar_rua = $_POST['rua']?$_POST['rua']:"";
  		$cadastrar_numero_casa = $_POST['numero_casa']?$_POST['numero_casa']:"";
  		$cadastrar_telefone = $_POST['telefone']?$_POST['telefone']:"";
  		$cadastrar_login = $_POST['nick']?$_POST['nick']:"";  		
  		$cadastrar_senha = $_POST['senha']?$_POST['senha']:"";
  		$cliente->set_nome($cadastrar_nome);
  		$cliente->set_data_nasc($cadastrar_data_nasc);
  		$cliente->set_estado($cadastrar_estado);
  		$cliente->set_cidade($cadastrar_cidade);
  		$cliente->set_bairro($cadastrar_bairro);
  		$cliente->set_rua($cadastrar_rua);
  		$cliente->set_numero_casa($cadastrar_numero_casa);
  		$cliente->set_telefone($cadastrar_telefone);
  		$cliente->set_login($cadastrar_login);
  		$cliente->set_senha(md5($cadastrar_senha));
  		$validar_cadastro = validar_cadastro($cliente);
  		if (empty($validar_cadastro)){
  			cadastrar_clientes($cliente);
  			header('location:index.php?validacao=certo');
  		}
  		else{
  			header('location:index.php?validacao=errado');
  		}
  	}
  	/*setando config*/
	$nome = isset($nome)?$nome:"";
	$foto = isset($foto)?$foto:"";
	$texto_rodape = isset($texto_rodape)?$texto_rodape:"";
	$numero = isset($numero)?$numero:"";
	$email = isset($email)?$email:"";
	$facebook = isset($facebook)?$facebook:"";
	$twitter = isset($twitter)?$twitter:"";
	$instagram = isset($instagram)?$instagram:"";
  $informacoes_sobre_site = isset($informacoes_sobre_site)?$informacoes_sobre_site:"";
  $sobre_equipe = isset($sobre_equipe)?$sobre_equipe:"";
  $como_nos_sentimos = isset($como_nos_sentimos)?$como_nos_sentimos:"";
  $dica = isset($dica)?$dica:"";
  $cidade = isset($cidade)?$cidade:"";
  $estado = isset($estado)?$estado:"";
  $bairro = isset($bairro)?$bairro:"";
  $rua = isset($rua)?$rua:"";
  $numero_casa = isset($numero_casa)?$numero_casa:"";


	foreach ($configuracoes as $configuracao) {
		$nome = $configuracao['nome'];
		$foto = $configuracao['foto'];
		$texto_rodape = $configuracao['texto_rodape'];
		$numero = $configuracao['numero'];
		$email = $configuracao['email'];
		$facebook = $configuracao['facebook'];
		$twitter = $configuracao['twitter'];
		$instagram = $configuracao['instagram'];
    $informacoes_sobre_site = $configuracao['informacoes_sobre_site'];
    $sobre_equipe = $configuracao['sobre_equipe'];
    $como_nos_sentimos = $configuracao['como_nos_sentimos'];
    $dica = $configuracao['dica'];
    $estado = $configuracao['estado'];
    $cidade = $configuracao['cidade'];
    $rua = $configuracao['rua'];
    $bairro = $configuracao['bairro'];
    $numero_casa = $configuracao['numero_casa'];
	}
?>