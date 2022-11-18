<?php
	class Usuarios{
		private $login;
		private $cod;
		private $nome;
		private $tipo;
		private $senha;


		function get_login(){
			return $this->login;
		}
		function set_login($login){
			$this->login = $login;
		}
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
		function get_tipo(){
			return $this->tipo;
		}
		function set_tipo($tipo){
			$this->tipo = $tipo;
		}
		function get_senha(){
			return $this->senha;
		}
		function set_senha($senha){
			$this->senha = $senha;
		}

	}




























?>