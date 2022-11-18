<?php
	session_start();
	include_once('servicoFuncoes.php');
	$cadastrado = isset($_GET['cadastrado'])?$_GET['cadastrado']:"";
	$apagado = isset($_GET['apagado'])?$_GET['apagado']:"";
	$editado = isset($_GET['editado'])?$_GET['editado']:"";


	if (isset($_SESSION['cod_administrador'])){
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  	<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	 	<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="../css/especificacoes.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<nav class="white"  role="navigation">
			<ul class="hide-on-med-and-down">
    		</ul>
   			<div class="nav-wrapper container">	
      			<ul class="right hide-on-med-and-down black-text">
        		<li><a href="listarAnimais.php">Animais</a></li>
        		<li><a href="listarUsuarios.php">Usuarios</a></li>
        		<li><a href="listarProdutos.php">Produtos</a></li>
        		<li><a href="listarClientes.php">Clientes</a></li>
        		<li><a href="listarConfig.php">Config</a></li>
        		<li><a href="index.php">Pagina inicial</a></li>

     		</ul>

      		<ul id="nav-mobile" class="sidenav">
        		<li><a href="listarAnimais.php">Animais</a></li>
        		<li><a href="listarUsuarios.php">Usuarios</a></li>
        		<li><a href="listarProdutos.php">Produtos</a></li>
        		<li><a href="listarClientes.php">Clientes</a></li>
        		<li><a href="listarConfig.php">Config</a></li>
        		<li><a href="index.php">Pagina inicial</a></li>
      		</ul>
        	<a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">Menu</i></a>
    	</div>
  </nav>
        <div class="section container">
            <form method="post" class="row">
                <input type="text" class="col s9" placeholder="pesquisa" name="pesquisa">
                <button type="submit" class="btn-floating" name="pesquisar"><i class="material-icons">search</i></button>
            </form>
        </div>
		<div class="container">
		<table class="black-text">
			<tr class="grey lighten-3">
				<td class="center">Cod</td>
				<td class="center">Nome</td>
				<td class="center">Promoção</td>
				<td class="center">Observações</td>
				<td class="center">Preço</td>
				<td colspan="2" class="center">Ações</td>
			</tr>
				<?php
					foreach ($servicos as $servico) {
						?>
						<tr>
							<td class="center"><?=$servico['cod']?></td>
							<td class="center"><?=$servico['nome']?></td>
							<td class="center"><?=$servico['promocao']?></td>
							<td class="center"><?=$servico['observacoes']?></td>
							<td class="center"><?=$servico['preco']?></td>
							<td class="left">
								<a href="#" type="button" onclick="editar('<?=$servico['cod']?>','<?=$servico['nome']?>','<?=$servico['promocao']?>','<?=$servico['observacoes']?>','<?=$servico['preco']?>')" class="btn"><i class="material-icons">create</i></a>
							</td>
							<td class="right">
								<a class="btn red" onclick="mover_apagar('<?=$servico['cod']?>')"><i class="material-icons">delete</i></a>
							</td>
						</tr>
						<?php
					}
				?>
			</table>
		</div>
		<div class="container">
			<a href="#modal_cadastrar" class="modal-trigger btn blue"><i class="material-icons">add</i></a>
		</div>

		<div class="modal" id="modal_cadastrar">
			<form method="post">
				<div class="modal-content">
					<h6 style="font-weight: bold;text-transform: uppercase;">Digite os dados do novo produto</h6>
					<input type="hidden" name="cod">
					<input type="text" name="nome" placeholder="nome">
					<input type="text" class="promocao" name="promocao" placeholder="porcentagem da promoção">
					<input type="text" name="observacoes" placeholder="especificações">
					<input type="text" name="preco" placeholder="preço">
				</div>
				<div class="modal-footer">
					<input type="submit" name="cadastrar" value="cadastrar" class="btn blue">
				</div>
			</form>
		</div>
		<div class="modal" id="modal_editar">
			<form method="post">
				<div class="modal-content">
					<h6 style="font-weight: bold;text-transform: uppercase;">Digite os valores a ser alterado</h6>
					<input type="hidden" id="cod" name="cod">
					<input type="text" id="nome" name="nome" placeholder="nome">
					<input type="text" class="promocao" id="promocao" name="promocao" placeholder="porcentagem da promoção">
					<input type="text" id="observacoes" name="observacoes" placeholder="especificações">
					<input type="text" id="preco" name="preco" placeholder="preço">
				</div>
				<div class="modal-footer">
					<input type="submit" name="salvar" value="salvar" class="btn green">
				</div>
			</form>
		</div>
		<div class="modal" id="modal_cadastrado">
			<div class="modal-content">
				<h6 style="font-weight: bold;text-transform: uppercase;">Novo serviço adcionado com sucesso</h6>
			</div>
			<div class="modal-footer">
				<a href="../view/listarServicos.php" class="btn modal-close">ok</a>
			</div>
		</div>
		<div class="modal" id="modal_apagado">
			<div class="modal-content">
				Serviço apagado com sucesso
			</div>
			<div class="modal-footer">
				<a href="../view/listarServicos.php" class="btn modal-close">ok</a>
			</div>
		</div>
		<div class="modal" id="modal_apagado_error">
			<div class="modal-content">
				<h6>Não foi possivel apagar o serviço</h6>
			</div>
			<div class="modal-footer">
				<a href="../view/listarServicos.php" class="btn modal-close">ok</a>
			</div>
		</div>
		<div class="modal" id="modal_editado">
			<div class="modal-content">
				Linha na tabela alterado com sucesso
			</div>
			<div class="modal-footer">
				<a href="../view/listarServicos.php" class="btn modal-close">ok</a>
			</div>
		</div>
		<div class="modal" id="confirmar_apagar">
			<form method="post">
				<div class="modal-content">
					Deseja realmente concluir essa ação?
					<input type="hidden" name="cod_apagar" id="cod_apagar">
				</div>
				<div class="modal-footer">
					<input type="submit" name="apagar" class="btn red" value="apagar">
					<a class="btn modal-close" >cancelar</a>
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
  			<?php 
  				if (!empty($cadastrado) && $cadastrado=='certo') {
  					?>
  					$('#modal_cadastrado').modal('open');
  			<?php
  				}
  			?>
  			<?php
  				if (!empty($apagado) && $apagado =='certo') {
  			?>
  				$('#modal_apagado').modal('open');
  			<?php
  				}else if(!empty($apagado) && $apagado=='errado'){
  			?>
  				$('#modal_apagado_error').modal('open');
  			<?php
  				}
  			?>
  			<?php
  				if (!empty($editado) && $editado =='certo') {
  			?>
  				$('#modal_editado').modal('open');
  			<?php
  				}
  			?>
  			$('.promocao').mask('000',{reverse:false});
  		})
  	</script>
  	<script type="text/javascript">
  		function editar($cod,$nome,$promocao,$observacoes,$preco){
  			$('#cod').val($cod);
  			$('#nome').val($nome);
  			$('#promocao').val($promocao);
  			$('#observacoes').val($observacoes);
  			$('#preco').val($preco);
  			$('#modal_editar').modal('open');
  		}
  		function mover_apagar($cod){
  			$('#cod_apagar').val($cod);
  			$('#confirmar_apagar').modal('open');
  		}
  	</script>
</html>
<?php
	}else{
		header('location:index.php');
	}
?>