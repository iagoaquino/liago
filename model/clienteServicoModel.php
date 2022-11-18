<?php

	class ClienteServico{
		private $cod;
		private $cod_cliente;
		private $data;
		private $cod_servico;


		function get_data(){
			return $this->data;
		}
		function set_data($data){
			$this->data = $data;
		}
		function get_cod(){
			return $this->cod;
		}
		function set_cod($cod){
			$this->cod= $cod;
		}
		function get_cod_cliente(){
			return $this->cod_cliente;
		}
		function set_cod_cliente($cod_cliente){
			$this->cod_cliente = $cod_cliente;
		}
		function get_cod_servico(){
			return $this->cod_servico;
		}
		function set_cod_servico($cod_servico){
			$this->cod_servico = $cod_servico;
		}
	}
	
  ?>