<?php
	class Animal{
		private $cod;
		private $nome;
		private $raca;
		private $idade;
		private $tipo;
		private $imagem;
		private $cod_cliente;

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

		function get_raca(){
			return $this->raca;
		}
		function set_raca($raca){
			$this->raca = $raca;
		}
		function get_idade(){
			return $this->idade;
		}

		function set_idade($idade){
			$this->idade = $idade;
		}

		function get_tipo(){
			return $this->tipo;
		}
		function set_tipo($tipo){
			$this->tipo = $tipo;
		}
		function get_imagem(){
			return $this->imagem;
		}

		function set_imagem($imagem){
			$this->imagem = $imagem;
		}
		function get_cod_cliente(){
			return $this->cod_cliente;
		}
		function set_cod_cliente($cod_cliente){
			$this->cod_cliente = $cod_cliente;
		}
	}







?>