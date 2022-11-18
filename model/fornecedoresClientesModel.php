<?php
	class FornecedoresClientes{
		private $data;
		private $cod_produto;
		private $cnpj_empresa;
		private $cod;


		function get_data(){
			return $this->data;
		}
		function set_data($data){
			$this->data = $data;
		}

		function get_cod_produto(){
			return $this->cod_produto;
		}
		function set_cod_produto($produto){
			$this->cod_produto = $cod_produto;
		}
		function get_cnpj_empresa(){
			return $this->cnpj_empresa;
		}
		function set_cnpj_empresa($cnpj_empresa){
			$this->cnpj_empresa = $cnpj_empresa;
		}
		function get_cod(){
			return $this->cod;
		}
		function set_cod($cod){
			$this->cod = $cod;
		}

	}



























?>