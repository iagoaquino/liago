<?php
	function listar_configuracoes(){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "SELECT * FROM config";
			$listar_configuracoes = $pdo->prepare($sql);
			$listar_configuracoes->execute();
			return $listar_configuracoes->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOExeption $e){
			return false;
		}
	}
	function apagar_configuracoes($configuracao){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "DELETE FROM config WHERE cod = :cod";
			$apagar_configuracoes = $pdo->prepare($sql);
			$apagar_configuracoes->bindValue(':cod',$configuracao->get_cod());
			$apagar_configuracoes->execute();
			header('location:../view/listarConfig.php');
		}catch(PDOExeption $e){
			return false;
		}
	}
	function editar_configuracoes($configuracao){
		include_once('../config/config.php');
		try{
			$conectar = new Conexao();
			$pdo = $conectar->conecta();
			$sql = "UPDATE config set nome = :nome, texto_rodape = :texto_rodape,estado=:estado,cidade=:cidade,rua=:rua,bairro=:bairro,numero_casa=:numero_casa, facebook = :facebook, email =:email, numero = :numero, instagram = :instagram , twitter =:twitter,foto=:foto, informacoes_sobre_site =:informacoes_sobre_site, sobre_equipe =:sobre_equipe, como_nos_sentimos =:como_nos_sentimos,dica =:dica";
			$editar_configuracoes = $pdo->prepare($sql);
			$editar_configuracoes->bindValue(':nome',$configuracao->get_nome());	
			$editar_configuracoes->bindValue(':texto_rodape',$configuracao->get_texto_rodape());
			$editar_configuracoes->bindValue(':estado',$configuracao->get_estado());
			$editar_configuracoes->bindValue(':cidade',$configuracao->get_cidade()); 	
			$editar_configuracoes->bindValue(':bairro',$configuracao->get_bairro()); 	
			$editar_configuracoes->bindValue(':rua',$configuracao->get_rua()); 	
			$editar_configuracoes->bindValue(':numero_casa',$configuracao->get_numero_casa()); 	
			$editar_configuracoes->bindValue(':facebook',$configuracao->get_facebook()); 	
			$editar_configuracoes->bindValue(':email',$configuracao->get_email());
			$editar_configuracoes->bindValue(':numero',$configuracao->get_numero());
			$editar_configuracoes->bindValue(':instagram',$configuracao->get_instagram());
			$editar_configuracoes->bindValue(':twitter',$configuracao->get_twitter());
			$editar_configuracoes->bindValue(':foto',$configuracao->get_foto());
			$editar_configuracoes->bindValue(':informacoes_sobre_site',$configuracao->get_informacoes_sobre_site());
			$editar_configuracoes->bindValue(':sobre_equipe',$configuracao->get_sobre_equipe());
			$editar_configuracoes->bindValue(':como_nos_sentimos',$configuracao->get_como_nos_sentimos());
			$editar_configuracoes->bindValue(':dica',$configuracao->get_dica());
			$editar_configuracoes->execute();
			header('location:../view/listarConfig.php?editado=certo');	
		}catch(PDOExeption $e){
			return false;
		}
	}





?>