<?php
	session_start();
	include_once('configFuncoes.php');
	$editado = isset($_GET['editado'])?$_GET['editado']:"";
	if (isset($_SESSION['cod_administrador'])) {

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
		<nav class="white"  role="navigation">
				<ul class="hide-on-med-and-down">
	       			
	     		</ul>
		   		<div class="nav-wrapper container">	
		    		<ul class="right hide-on-med-and-down black-text">
      					<li><a href="listarAnimais.php">Animais</a></li>
		        		<li><a href="listarUsuarios.php">Usuarios</a></li>
		        		<li><a href="listarProdutos.php">Produtos</a></li>
		        		<li><a href="listarServicos.php">Serviços</a></li>
		        		<li><a href="listarClientes.php">Cliente</a></li>
		        		<li><a href="index.php">Pagina inicial</a></li>
		     		</ul>
		      		<ul id="nav-mobile" class="sidenav">
      					<li><a href="listarAnimais.php">Animais</a></li>
		        		<li><a href="listarUsuarios.php">Usuarios</a></li>
		        		<li><a href="listarProdutos.php">Produtos</a></li>
		        		<li><a href="listarServicos.php">Serviços</a></li>
		        		<li><a href="index.php">Pagina inicial</a></li>
		      		</ul>
		        	<a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
		    	</div>
		  </nav>
	<body>
		<div class="container">
			<form method="post" enctype="multipart/form-data">
				<input type="text" name="nome" value="<?=$nome?>">
				<input type="text" name="texto_rodape" value="<?=$texto_rodape?>" placeholder="Texto de rodape" >
				<input type="text" name="dica" value="<?=$dica?>" placeholder="Dica">
				<input type="text" name="estado" value="<?=$estado?>" placeholder="Estado">
				<input type="text" name="cidade" value="<?=$cidade?>" placeholder="Cidade">
				<input type="text" name="bairro" value="<?=$bairro?>" placeholder="Bairro">
				<input type="text" name="rua" value="<?=$rua?>" placeholder="Rua">
				<input type="text" name="numero_casa" value="<?=$numero_casa?>" placeholder="Numero da casa">

				<input type="text" name="email" value="<?=$email?>" placeholder="Email">
				<input type="text" class="telefone" name="numero" value="<?=$numero?>" placeholder="Numero">
				<input type="text" name="facebook" value="<?=$facebook?>" placeholder="Facebook">
				<input type="text" name="twitter" value="<?=$twitter?>" placeholder="twitter">
				<input type="text" name="instagram" value="<?=$instagram?>" placeholder="instagram">
				<input type="text" name="informacoes_sobre_site" value="<?=$informacoes_sobre_site?>"
				 placeholder="informacoes sobre o site">
				 <input type="text" name="sobre_equipe" value="<?=$sobre_equipe?>"
				 placeholder="sobre a équipe">
				 <input type="text" name="como_nos_sentimos" value="<?=$como_nos_sentimos?>"
				 placeholder="informacoes sobre o site">
				<div class="file-field input-field">
					<div class="btn">
						<span>foto</span>
						<input type="file" name="arquivo">
					</div>
					<div class="file-path-wrapper">
				        <input class="file-path validate" value="<?=$foto?>" type="text">
					</div>
				</div>
				</div>
				<input type="submit" name="salvar" class="btn right teal" value="Salvar">
			</form>
		</div>
	</body>
	<div class="modal" id="modal_editado">
		<div class="modal-content">
			configuração do site alterado com sucesso
		</div>
		<div class="modal-footer">
			<a href="../view/listarConfig.php" class="modal_close btn">ok</a>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  	<script src="../js/materialize.js"></script>
  	<script src="../js/init.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  	<script type="text/javascript">
  		$(document).ready(function(){
  			$('.modal').modal();
  			<?php
  				if (!empty($editado)) {
  			?>
  			$('#modal_editado').modal('open');
  			<?php
  			}  
  			?>
  			$('.telefone').mask('(00)00000-0000',{reverse:false});
  		})
  	</script>
</html>
<?php 
	}else{
		header('location:index.php');
	}
?>