<?php
	include_once('../controler/configDAO.php');
	include_once('../model/configModel.php');

	$cod = isset($_POST['cod'])?$_POST['cod']:"";
	$e_nome = isset($_POST['nome'])?$_POST['nome']:"";
	$e_texto_rodape = isset($_POST['texto_rodape'])?$_POST['texto_rodape']:"";
	$e_facebook = isset($_POST['facebook'])?$_POST['facebook']:"";
	$e_numero = isset($_POST['numero'])?$_POST['numero']:"";
	$e_email = isset($_POST['email'])?$_POST['email']:"";
	$e_instagram = isset($_POST['instagram'])?$_POST['instagram']:"";
	$e_twitter = isset($_POST['twitter'])?$_POST['twitter']:"";
	$e_informacoes_sobre_site = isset($_POST['informacoes_sobre_site'])?$_POST['informacoes_sobre_site']:"";
	$e_sobre_equipe = isset($_POST['sobre_equipe'])?$_POST['sobre_equipe']:"";
	$e_como_nos_sentimos = isset($_POST['como_nos_sentimos'])?$_POST['como_nos_sentimos']:"";
	$e_estado = isset($_POST['estado'])?$_POST['estado']:"";
	$e_cidade = isset($_POST['cidade'])?$_POST['cidade']:"";
	$e_rua = isset($_POST['rua'])?$_POST['rua']:"";
	$e_bairro = isset($_POST['bairro'])?$_POST['bairro']:"";
	$e_numero_casa = isset($_POST['numero_casa'])?$_POST['numero_casa']:"";

	$e_dica = isset($_POST['dica'])?$_POST['dica']:"";
	$diretorio = '../img/';
	$novo_nome = 'foto_parallax1'.'.jpeg';
	$nome_temporario = isset($_FILES['arquivo']['tmp_name'])?$_FILES['arquivo']['tmp_name']:""; 
	move_uploaded_file($nome_temporario,$diretorio.$novo_nome);

	$configuracao = new Config();
	$configuracao->set_cod($cod);
	$configuracao->set_nome($e_nome);
	$configuracao->set_texto_rodape($e_texto_rodape);
	$configuracao->set_facebook($e_facebook);
	$configuracao->set_numero($e_numero);
	$configuracao->set_email($e_email);
	$configuracao->set_instagram($e_instagram);
	$configuracao->set_twitter($e_twitter);
	$configuracao->set_foto($novo_nome);
	$configuracao->set_informacoes_sobre_site($e_informacoes_sobre_site);
	$configuracao->set_sobre_equipe($e_sobre_equipe);
	$configuracao->set_como_nos_sentimos($e_como_nos_sentimos);
	$configuracao->set_dica($e_dica);
	$configuracao->set_estado($e_estado);
	$configuracao->set_cidade($e_cidade);
	$configuracao->set_rua($e_rua);
	$configuracao->set_bairro($e_bairro);
	$configuracao->set_numero_casa($e_numero_casa);





	$apagar = isset($_POST['apagar'])?$_POST['apagar']:"";
	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";

	if (!empty($apagar)) {
		apagar_configuracoes($configuracao);
	}
	if (!empty($salvar)) {
		editar_configuracoes($configuracao);
	}
	$configuracoes = listar_configuracoes();

	$frase = isset($frase)?$frase:"";
	$texto_rodape = isset($texto_rodape)?$texto_rodape:"";
	$nome = isset($nome)?$nome:"";
	$numero = isset($numero)?$numero:"";
	$email = isset($email)?$email:"";
	$facebook = isset($facebook)?$facebook:"";
	$twitter = isset($twitter)?$twitter:"";
	$instagram = isset($instagram)?$instagram:"";
	$foto = isset($foto)?$foto:"";
	$informacoes_sobre_site = isset($informacoes_sobre_site)?$informacoes_sobre_site:"";
	$sobre_equipe = isset($sobre_equipe)?$sobre_equipe:"";
	$como_nos_sentimos = isset($como_nos_sentimos)?$como_nos_sentimos:"";
	$dica = isset($dica)?$dica:"";


	foreach ($configuracoes as $configuracao) {
		$nome = $configuracao['nome'];
		$texto_rodape = $configuracao['texto_rodape'];
		$numero = $configuracao['numero'];
		$email = $configuracao['email'];
		$facebook = $configuracao['facebook'];
		$twitter = $configuracao['twitter'];
		$instagram = $configuracao['instagram'];
		$foto = $configuracao['foto'];
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