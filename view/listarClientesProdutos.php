	<?php

		include_once('clientesProdutosFuncoes.php');

		$cod_cliente_error = isset($_GET['cod_cliente_error'])?$_GET['cod_cliente_error']:"";
		$cod_produto_error = isset($_GET['cod_produto_error'])?$_GET['cod_produto_error']:"";
		$estoque_error = isset($_GET['estoque_error'])?$_GET['estoque_error']:"";
		$apagado = isset($_GET['apagado'])?$_GET['apagado']:"";
		$cadastrado= isset($_GET['cadastrado'])?$_GET['cadastrado']:"";
		$editado = isset($_GET['editado'])?$_GET['editado']:"";
		$compra_fechada = isset($_GET['compra_fechada'])?$_GET['compra_fechada']:"";
		if (isset($_SESSION['cod_funcionario'])) {
	?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/especificacoes.css" type="text/css" rel="stylesheet" />
	<title></title>
</head>
<body>
	<nav class="white" role="navigation">
			<ul class="hide-on-med-and-down">
    		</ul>
   			<div class="nav-wrapper container">	
      			<ul class="right hide-on-med-and-down black-text">
      				<li><a href="listarClientesServicosView.php">Solicitação de serviços</a></li>
      				<li><a href="index.php">Página inicial</a></li>
       				
     			</ul>
      		<ul id="nav-mobile" class="sidenav">
      			<li><a href="listarClientesServicosView.php">Solicitação de serviços</a></li>
      			<li><a href="index.php">Página inicial</a></li>
      		</ul>
        	<a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
    	</div>
  </nav>
	<div class="container section">
		<table class="black-text">
			<tr class="black white-text">
				<td class="center">Código</td>
				<td class="center">Data de compra</td>
				<td class="center">Quantidade</td>
				<td class="center">Nome do produto</td>
				<td class="center">Nome do cliente</td>
			</tr>
			<?php
				foreach ($clientes_produtos as $cliente_produto){
					$login = pesquisar_login($cliente_produto['cod_cliente']);
					$nome_produto = pesquisar_produto($cliente_produto['cod_produto']);

			?>
			<tr>
				<td class="center"><?=$cliente_produto['cod']?></td>
				<td class="center"><?=$cliente_produto['data']?></td>
				<td class="center"><?=$cliente_produto['quant']?></td>
				<td class="center"><?=$nome_produto['0']['nome']?></td>
				<td class="center"><?=$login['0']['login']?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</div>
	<div class="container">
		<a href="#modal_cadastro" class="modal-trigger btn "><i class="material-icons">add</i></a>
	</div>
	<div class="modal" id="modal_cadastro">
		<form method="post">
			<div class="modal-content">
				<input type="text" class="data" name="data" placeholder="Data">
				<div class="input-field col s12">
	    			<select name="cod_produto">
	    				<option value="" disabled selected>Nome do produto</option>
	   					<?php
	   						$produtos = listar_produtos();	
	   						foreach ($produtos as $produto) {
	   					?>
	   						<option value="<?=$produto['cod']?>"><?=$produto['nome']?></option>
	   					<?php
	   					}
	   					?>
	    			</select>
  				</div>
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
				<input type="text" name="quant" class="numero " placeholder="Quantidade">

			</div>
			<div class="modal-footer">
				<input type="submit" name="cadastrar" value="cadastrar" class="btn">
			</div>
		</form>
	</div>
	<div class="modal" id="cod_produto_error">
		<div class="modal-content">
			O codigo do produto não existe não foi completar essa ação
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesProdutos.php" class="btn modal-close ">ok</a>
		</div>
	</div>
	<div class="modal" id="cod_cliente_error">
		<div class="modal-content">
			O codigo do cliente não existe não foi possivel completar essa ação
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesProdutos.php" class="btn modal-close ">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_apagado">
		<div class="modal-content">
			Compra apagada com sucesso
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesProdutos.php" class="btn modal-close ">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_apagado_error">
		<div class="modal-content">
			Não foi possivel apagar a conta ja estamos resolvendo o problema
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesProdutos.php" class="btn modal-close ">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_cadastrado">
		<div class="modal-content">
			Cadastro realizado com sucesso
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesProdutos.php" class="btn modal-close ">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_editado">
		<div class="modal-content">
			Compra editada com sucesso
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesProdutos.php" class="btn modal-close">ok</a>
		</div>
	</div>
	<div class="modal" id="compra_fechada">
		<div class="modal-content">
			compra fechada e retirado do estoque a quantidade
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesProdutos.php" class="btn modal-close">ok</a>
		</div>
	</div>
	<div class="modal" id="estoque_error">
		<div class="modal-content">
			não tem estoque suficiente para o produto
		</div>
		<div class="modal-footer">
			<a href="../view/listarClientesProdutos.php" class="btn modal-close">ok</a>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../js/materialize.js"></script>
<script src="../js/init.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script>
    $(document).ready(function () {
    	$('.modal').modal();
    	$('select').formSelect();
    	$('.data').mask('00/00/0000',{reverse:false});
    	$('.numero').mask('00000000000',{reverse:false});

    	<?php
    		if (!empty($cod_produto_error) && $cod_produto_error =='certo'){
    	?>
    		$('#cod_produto_error').modal('open');
    	<?php
    		}
    	?>
    	<?php
    		if (!empty($cod_cliente_error) && $cod_cliente_error =='certo'){
    	?>
    		$('#cod_cliente_error').modal('open');
    	<?php
    		}
    	?>
    	<?php
    		if (!empty($apagado) && $apagado =='certo'){
    	?>
    		$('#modal_apagado').modal('open');
    	<?php
    		}
    	?>
    	<?php
    		if (!empty($apagado) && $apagado =='errado'){
    	?>
    		$('#modal_apagado_error').modal('open');
    	<?php
    		}
    	?>
    	<?php
    		if (!empty($cadastrado) && $cadastrado =='certo'){
    	?>
    		$('#modal_cadastrado').modal('open');
    	<?php
    		}
    	?>
    	<?php
    		if (!empty($editado) && $editado =='certo'){
    	?>
    		$('#modal_editado').modal('open');
    	<?php
    		}
    	?>
    	<?php
    		if (!empty($compra_fechada) && $compra_fechada == 'certo'){
    	?>
    		$('#compra_fechada').modal('open');
    	<?php
    		}
    	?>
    	<?php
    		if (!empty($estoque_error) && $estoque_error =='certo'){
    	?>
    		$('#estoque_error').modal('open');
    	<?php
    	}
    	?>
    });
</script>
<script type="text/javascript">
	function editar($cod,$cod_cliente,$cod_produto,$quant,$data){
		$('#cod').val($cod);
		$('#cod_produto').val($cod_produto);
		$('#cod_cliente').val($cod_cliente);
		$('#data').val($data);
		$('#quant').val($quant);
		$('#modal_editar').modal('open');
	}
</script>
</html>
<?php
	}else{
		header('location:../view/loginAdm.php');
	}
?>