<?php

	class Servico{

		private $cod;
		private $nome;
		private $promocao;
		private $observacoes;
		private $preco;

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
		function get_promocao(){
			return $this->promocao;
		}
		function set_promocao($promocao){
			$this->promocao = $promocao;
		}
		function get_observacoes(){
			return $this->observacoes;
		}
		function set_observacoes($observacoes){
			$this->observacoes = $observacoes;
		}
		function get_preco(){
			return $this->preco;
		}
		function set_preco($preco){
			$this->preco = $preco;
		}























	}
?>