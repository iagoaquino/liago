<?php
	class Config{
		private $cod;
		private $nome;
		private $frase;
		private $foto;
		private $texto_rodape;
		private $rua;
		private $cidade;
		private $bairro;
		private $estado;
		private $numero_casa;
		private $numero;
		private $email;
		private $facebook;
		private $twitter;
		private $instagram;
		private $informacoes_sobre_site;
		private $sobre_equipe;
		private $como_nos_sentimos;
		private $dica;



		function get_cod(){
			return $this->cod;
		}
		function set_cod($cod){
			$this->cod = $cod;
		}
		function get_nome(){
			return $this->nome;
		}
		function set_nome($nome){
			$this->nome = $nome;
		}		
		function get_foto(){
			return $this->foto;
		}
		function set_foto($foto){
			$this->foto = $foto;
		}	
	
		function get_texto_rodape(){
			return $this->texto_rodape;
		}
		function set_texto_rodape($texto_rodape){
			$this->texto_rodape = $texto_rodape;
		}		
		function get_numero(){
			return $this->numero;
		}
		function set_numero($numero){
			$this->numero = $numero;
		}		
		function get_email(){
			return $this->email;
		}
		function set_email($email){
			$this->email = $email;
		}		
		function get_facebook(){
			return $this->facebook;
		}
		function set_facebook($facebook){
			$this->facebook = $facebook;
		}		
		function get_twitter(){
			return $this->twitter;
		}
		function set_twitter($twitter){
			$this->twitter = $twitter;
		}		
		function get_instagram(){
			return $this->instagram;
		}
		function set_instagram($instagram){
			$this->instagram = $instagram;
		}
		function get_informacoes_sobre_site(){
			return $this->informacoes_sobre_site;
		}
		function set_informacoes_sobre_site($informacoes_sobre_site){
			$this->informacoes_sobre_site = $informacoes_sobre_site;
		}
		function get_sobre_equipe(){
			 return $this->sobre_equipe;
		}
		function set_sobre_equipe($sobre_equipe){
			$this->sobre_equipe = $sobre_equipe;
		}
		function get_como_nos_sentimos(){
			return $this->como_nos_sentimos;
		}
		function set_como_nos_sentimos($como_nos_sentimos){
			$this->como_nos_sentimos = $como_nos_sentimos;
		}
		function get_dica(){
			return $this->dica;
		}
		function set_dica($dica){
			$this->dica = $dica;
		}
		function get_rua(){
			return $this->rua;
		}
		function set_rua($rua){
			$this->rua = $rua;
		}
		function get_cidade(){
			return $this->cidade;
		}
		function set_cidade($cidade){
			$this->cidade = $cidade;
		}
		function get_bairro(){
			return $this->bairro;
		}
		function set_bairro($bairro){
			$this->bairro = $bairro;
		}
		function get_estado(){
			return $this->estado;
		}
		function set_estado($estado){
			$this->estado = $estado;
		}
		function get_numero_casa(){
			return $this->numero_casa;
		}
		function set_numero_casa($numero_casa){
			$this->numero_casa = $numero_casa;
		}
	}

?>