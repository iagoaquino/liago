<?php
	class Cliente{
		private $cod;
		private $data_nasc;
		private $nome;
		private $login;
		private $senha;
		private $rua;
		private $estado;
		private $cidade;
		private $bairro;
		private $numero_casa;
		private $telefone;
		private $email;


		function get_cod(){
			return $this->cod;
		}

		function set_cod($cod){
			$this->cod = $cod;
		}

		function get_data_nasc(){
			return $this->data_nasc;
		}
		
		function set_data_nasc($data_nasc){
			$this->data_nasc = $data_nasc;
		}
		function get_nome(){
			return $this->nome;
		}

		function set_nome($nome){
			$this->nome = $nome;
		}
		function get_login(){
			return $this->login;
		}
		function set_login($login){
			$this->login = $login;
		}
		function get_senha(){
			return $this->senha;
		}
		function set_senha($senha){
			$this->senha = $senha;
		}
		function get_rua(){
			return $this->rua;
		}

		function set_rua($rua){
			$this->rua = $rua;
		}

		function get_estado(){
			return $this->estado;
		}
		
		function set_estado($estado){
			$this->estado = $estado;
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

		function get_numero_casa(){
			return $this->numero_casa;
		}

		function set_numero_casa($numero_casa){
			$this->numero_casa = $numero_casa;
		}

		function get_telefone(){
			return $this->telefone;
		}

		function set_telefone($telefone){
			$this->telefone = $telefone;
		}
		function get_email(){
			return $this->email;
		}

		function set_email($email){
			$this->email = $email;
		}
	}
?>