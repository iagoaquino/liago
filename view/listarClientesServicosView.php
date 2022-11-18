<?php
	include_once('clienteServicoFuncoesView.php');
	session_start();
	$cod_servico_error = isset($_GET['cod_servico_error'])?$_GET['cod_servico_error']:"";
	$cod_cliente_error = isset($_GET['cod_cliente_error'])?$_GET['cod_cliente_error']:"";
	$apagado = isset($_GET['apagado'])?$_GET['apagado']:"";
	$cadastro = isset($_GET['cadastro'])?$_GET['cadastro']:"";
	$editado = isset($_GET['editado'])?$_GET['editado']:"";
	if (isset($_SESSION['cod_funcionario'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
 	<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../css/especificacoes.css" type="text/css" rel="stylesheet"/>
<body>
	<nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <ul class="right hide-on-med-and-down">
                    <li><a href="../view/listarClientesProdutos.php">Compras feitas</a></li>
                    <li><a href="../view/funcionarioLogado.php">Página inicial</a></li>
                </ul>
                <ul id="nav-mobile" class="sidenav">
                    <li><a href="../view/listarClientesProdutos.php">Compras feitas</a></li>
                    <li><a href="../view/funcionarioLogado.php">Página inicial</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
            </div>
        </nav>
	<div class="container section">
		<table class="black-text">
			<tr class="black white-text">
				<td class="center">Codigo</td>
				<td class="center">Data</td>
				<td class="center">Codigo do cliente</td>
				<td class="center">Codigo do servico</td>
			</tr>
			<?php
				foreach ($clientes_servicos as $cliente_servico) {
				$login = pesquisar_login($cliente_servico['cod_cliente']);
				$nome_servico = pesquisar_servico($cliente_servico['cod_servico']);	
			?>
			<tr>
				<td class="center"><?=$cliente_servico['cod']?></td>
				<td class="center"><?=$cliente_servico['data']?></td>
				<td class="center"><?=$login['0']['login']?></td>
				<td class="center"><?=$nome_servico['0']['nome']?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</div>
	<div class="container">
		<a href="#modal_cadastrar" class="modal-trigger btn"><i class="material-icons">add</i></a>
	</div>
	<div class="modal" id="modal_cadastrar">
		<form method="post">
			<div class="modal-content">
				<input type="text" name="data" class="data validate" placeholder="dd/mm/aaaa" required="">
				<div class="input-field col s12">
	    			<select name="cod_cliente">
	    				<option value="" disabled selected>Login do cliente</option>
	   					<?php
	   						$clientes = listar_clientes();	
	   						foreach ($clientes as $cliente) {
	   					?>
	   						<option value="<?=$cliente['cod']?>"><?=$cliente['login']?></option>
	   					<?php
	   					}
	   					?>
	    			</select>
  				</div>
  				<div class="input-field col s12">
	    			<select name="cod_servico">
	    				<option value="" disabled selected>Nome do servico</option>
	   					<?php
	   						$servicos = listar_servicos();	
	   						foreach ($servicos as $servico) {
	   					?>
	   						<option value="<?=$servico['cod']?>"><?=$servico['nome']?></option>
	   					<?php
	   					}
	   					?>
	    			</select>
  				</div>
			</div>
			<div class="modal-footer">
				<input type="submit" name="cadastrar" class="btn" value="cadastrar">
			</div>
		</form>
	</div>
	<div class="modal" id="modal_cod_servico_error">
		<div class="modal-content">
			Não foi possivel completar a ação codigo do serviço inexistente
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesServicosView.php" class="btn modal-close">ok</a>
		</div>
	</div>
		<div class="modal" id="modal_cod_cliente_error">
		<div class="modal-content">
			Não foi possivel completar a ação codigo do cliente inexistente
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesServicosView.php" class="btn modal-close">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_cadastro">
		<div class="modal-content">
			cadastrado realizado com sucesso
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesServicosView.php" class="btn modal-close">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_apagado">
		<div class="modal-content">
			Serviço solicitado apagado com sucesso
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesServicosView.php" class="btn modal-close">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_apagado_error">
		<div class="modal-content">
			Não foi possivel apagar já estamos trabalhando para resolver isso
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesServicosView.php" class="btn modal-close">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_editado">
		<div class="modal-content">
			Linha na tabela modificada com sucesso
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesServicosView.php" class="btn">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_editado_error">
		<div class="modal-content">
			Linha na tabela modificada com sucesso
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesServicosView.php" class="btn">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_editar">
		<form method="post">
			<div class="modal-content">
				<input type="text" name="cod" id="cod">
				<input type="text" class="data" name="data" id="data">
				<input type="text" class="numero" name="cod_servico" id="cod_servico">
				<input type="text" class="numero"name="cod_cliente" id="cod_cliente">
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn" name="editar" value="salvar">
			</div>
		</form>
	</div>
</body>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="../js/materialize.js"></script>
	<script src="../js/init.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.modal').modal();
			$('select').formSelect();

			$('.data').mask('00/00/0000',{reverse:false});
			$('.numero').mask('00000000000',{reverse:false});
			<?php
				if (!empty($cod_servico_error) && $cod_servico_error =='certo'){
			?>
				$('#modal_cod_servico_error').modal('open');
			<?php
			}
			?>
			<?php
				if (!empty($cadastro) && $cadastro =='certo'){
			?>
				$('#modal_cadastro').modal('open');
			<?php
			}
			?>
			<?php
				if (!empty($cod_cliente_error) && $cod_cliente_error == 'certo'){
			?>
				$('#modal_cod_cliente_error').modal('open');
			<?php
			}
			?>
			<?php
				if (!empty($apagado) && $apagado == 'certo'){
			?>
				$('#modal_apagado').modal('open');
			<?php
				}else if(!empty($apagado) && $apagado == 'errado'){
			?>
				$('#modal_apagado_error').modal('open');
			<?php
			}
			?>
			<?php
				if (!empty($editado) && $editado == 'certo'){
			?>
				$('#modal_editado').modal('open');
			<?php
				}
			?>
		})
	</script>
	<script type="text/javascript">
		function editar($cod,$data,$cod_cliente,$cod_servico){
			$('#cod').val($cod);
			$('#data').val($data);
			$('#cod_cliente').val($cod_cliente);
			$('#cod_servico').val($cod_servico);
			$('#modal_editar').modal('open');
		}
	</script>
</html>
<?php
}else{
	header('location:../view/index.php');
}  ?>