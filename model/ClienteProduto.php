<?php

	class ClienteProduto{
		private $data;
		private $quant;
		private $cod_produto;
		private $cod_cliente;
		private $cod;

		function get_cod(){
			return $this->cod;
		}
		function set_cod($cod){
			$this->cod = $cod;
		}
		function get_quant(){
			return $this->quant;
		}
		function set_quant($quant){
			$this->quant = $quant;
		}
		function get_cod_produto(){
			return $this->cod_produto;
		}
		function set_cod_produto($cod_produto){
			$this->cod_produto = $cod_produto;
		}

		function get_cod_cliente(){
			return $this->cod_cliente;
		}
		function set_cod_cliente($cod_cliente){
			$this->cod_cliente = $cod_cliente;
		}
		function get_data(){
			return $this->data;
		}
		function set_data($data){
			$this->data = $data;
		}


	}
?>