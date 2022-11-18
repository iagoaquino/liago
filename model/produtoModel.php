<?php
	class Produto{
		private $cod;
		private $nome;
		private $especificacoes;
		private $preco;
		private $promocao;
		private $estoque;
		private $imagem;

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

		function get_especificacoes(){
			return $this->especificacoes;
		}
		function set_especificacoes($especificacoes){
			$this->especificacoes = $especificacoes;
		}

		function get_preco(){
			return $this->preco;
		}
		function set_preco($preco){
			$this->preco = $preco;
		}

		function get_promocao(){
			return $this->promocao;
		}
		function set_promocao($promocao){
			$this->promocao = $promocao;
		}

		function get_estoque(){
			return $this->estoque;
		}
		function set_estoque($estoque){
			$this->estoque = $estoque;
		}

		function get_imagem(){
			return $this->imagem;
		}
		function set_imagem($imagem){
			$this->imagem = $imagem;
		}
	}










?>