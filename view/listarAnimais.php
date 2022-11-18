<?php
	session_start();
	include_once('animalFuncoes.php');
	$cadastrado = isset($_GET['cadastrado'])?$_GET['cadastrado']:"";
	$apagado = isset($_GET['apagado'])?$_GET['apagado']:"";
	$editado = isset($_GET['editado'])?$_GET['editado']:"";
	if (isset($_SESSION['cod_administrador'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  	<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	 	<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="../css/especificacoes.css" type="text/css" rel="stylesheet"/>
		<title>animais</title>
	</head>
	<body>
		<nav class="white"  role="navigation">
				<ul class="hide-on-med-and-down">
	       			
	     		</ul>
		   		<div class="nav-wrapper container">	
		    		<ul class="right hide-on-med-and-down black-text">
		        		<li><a href="listarUsuarios.php">Usuários</a></li>
		        		<li><a href="listarProdutos.php">Produtos</a></li>
		        		<li><a href="listarServicos.php">Serviços</a></li>
		        		<li><a href="listarClientes.php">Cliente</a></li>
		        		<li><a href="listarConfig.php">Config</a></li>
		        		<li><a href="index.php">Página inicial</a></li>
		 

		     		</ul>
		      		<ul id="nav-mobile" class="sidenav">
		        		<li><a href="listarUsuarios.php">Usuários</a></li>
		        		<li><a href="listarProdutos.php">Produtos</a></li>
		        		<li><a href="listarServicos.php">Serviços</a></li>
		        		<li><a href="listarConfig.php">Config</a></li>
		        		<li><a href="index.php">Página inicial</a></li>    		
		      		</ul>
		        	<a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
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
				<tr  class="grey lighten-3">
					<td class="center">Código</td>
					<td class="center">Nome</td>
					<td class="center">Raça</td>
					<td class="center">Idade</td>
					<td class="center">Tipo</td>
					<td class="center">Imagem</td>
					<td class="center">Código do cliente</td>
					<td class="center">Apagar</td>
				</tr>
				<?php foreach ($animais as $animal) {
					?>
					<tr>
						<td class="center"><?=$animal['cod']?></td>
						<td class="center"><?=$animal['nome']?></td>
						<td class="center"><?=$animal['raca']?></td>
						<td class="center"><?=$animal['idade']?></td>
						<td class="center"><?=$animal['tipo']?></td>
						<?php
							if (empty($animal['imagem'])) {
								?>
								<td class="center">ainda não possui foto</td>
								<?php
							}else{
						?>  
						<td class="center"><img width="100px" height="100px" src="../img/<?=$animal['imagem']?>"></td>
						<?php 
							}
						?>
						<td class="center"><?=$animal['cod_cliente']?></td>
						<td class="center">
							<a onclick="mandar_apagar('<?=$animal['cod']?>')" class="btn red"><i class="material-icons">delete</i></a>
						</td>
					</tr>
					<?php
						} 
					?>
			</table>
		</div>
		<div class="modal" id="modal_apagado">
			<div class="modal-content">
				O animal foi apagado com sucesso
			</div>
			<div class="modal-footer">
				<a href="listarAnimais.php" class="btn modal-close">ok</a>
			</div>
		</div>
		<div class="modal" id="modal_apagado_error">
			<div class="modal-content">
				Não foi possível apagar o animal estamos trabalhando para resolver o problema
			</div>
			<div class="modal-footer">
				<a href="listarAnimais.php" class="btn modal-close">ok</a>
			</div>
		</div>
		<div class="modal" id="confirma_apagar">
			<form method="post">
				<div class="modal-content">
					<h6>Deseja realmente concluir essa ação</h6>
					<input type="hidden" name="cod_apagar" id="cod_apagar">
				</div>
				<div class="modal-footer">
					<input type="submit" value="apagar" name="apagar" class="btn red">
					<a class="btn modal-close">cancelar</a>
				</div>
			</form>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  	<script src="../js/materialize.js"></script>
  	<script src="../js/init.js"></script>
  	<script type="text/javascript">
    	$(document).ready(function(){
       		$('.modal').modal();
       		<?php
       			if (!empty($apagado) && $apagado = 'certo') {
       		?>
       			$('#modal_apagado').modal('open');		
       		<?php
       			}
       		?>
   	 	})
  </script>
  <script type="text/javascript">
  	function mandar_apagar($cod){
  		$('#cod_apagar').val($cod);
  		$('#confirma_apagar').modal('open');
  	}
  </script>
</html>
<?php
	}else{
		header('location:index.php');
	}
  ?>