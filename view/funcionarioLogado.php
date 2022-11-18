<?php 
	include_once('funcionarioLogadoFuncoes.php');
	$deslogar = isset($_POST['deslogar'])?$_POST['deslogar']:"";
	$editado = isset($_GET['editado'])?$_GET['editado']:"";
	if (!empty($deslogar)){
		unset($_SESSION['cod_funcionario']);
	}
	if (isset($_SESSION['cod_funcionario'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  	<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  	<link href="../css/especificacoes.css" type="text/css" rel="stylesheet"/>
	<title></title>
</head>
<body>
	<nav class="white"  role="navigation">
	    <div class="nav-wrapper container">
	      <a id="logo-container" href="#editar_nome" class="brand-logo modal-trigger" style="font-weight: bold;text-transform: uppercase;"><?=$nome?></a>
	      	<ul class="right hide-on-med-and-down">
	      		<li class="right">
		      		<a href="#confirmar_deslogar" class="btn modal-trigger">sair</a>
	      		</li>
	      		<li><a href="listarClientesProdutos.php">Compras feitas</a></li>
	      		<li><a href="listarClientesServicosView.php">Serviços solicitados</a></li>

	      	</ul>
	      <ul id="nav-mobile" class="sidenav">
	      	<form method="post" class="center">
	      		<input type="submit" class="btn red" name="deslogar" value="deslogar">
	      		<li><a href="listarClientesProdutos.php">compras feitas</a></li>
	      		<li><a href="listarClientesServicosView.php">serviços solicitados</a></li>
	      	</form>
	      </ul>
	        <a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
	    </div>
  	</nav>
  	<div class="modal" id="confirmar_deslogar">
    	<div class="modal-content">
            <h6 style="font-weight: bold;text-transform: uppercase;">Deseja realmente sair?</h6>
        </div>
        <div class="modal-footer">
            <form method="post">
      	        <input type="submit" class="btn" name="deslogar" value="confirmar">
                <a class="btn red modal-close">cancelar</a>
            </form>
        </div>
    </div>
    <div class="carousel carousel-slider" style="cursor: pointer;height: 90vh">
      <div class="carousel-fixed-item center">
        <a class="btn waves-effect white black-text darken-text-2" onclick="$('.carousel').carousel('next')">Passar</a>
      </div>
      <div class="carousel-item grey white-text">
        <h1 class="center" style="font-weight: bold;text-transform: uppercase;">compras feitas</h1>
        <h2 class="center">Você pode cadastrar uma nova compra(o produto cadastrado na compra depois não poderá ser apagado)</h2>
      </div>
      <div class="carousel-item black white-text">
        <h1 class="center" style="font-weight: bold;text-transform: uppercase;">serviços solicitados</h1>
        <h2 class="center">Você pode cadastrar um novo serviço(o serviço cadastrado na solicitção depois não poderá ser apagado )</h2>
      </div>
    </div>
    <div class="modal" id="editar_nome">
    	<form method="post">
	    	<div class="modal-content">
	    		<h6 style="font-weight: bold;text-transform: uppercase;">mude seu nome</h6>
	    		<input type="text" name="nome" class="validate" value="<?=$nome?>" required="">
	    	</div>
	    	<div class="modal-footer">
	    		<input type="submit" name="salvar" value="salvar" class="btn">
	    		<a href="#" class="modal-close btn red">cancelar</a>
	    	</div>
    	</form>
    </div>
    <div class="modal" id="modal_editado">
    	<div class="modal-content">
            <h6 style="font-weight: bold;text-transform: uppercase;">dados mudados com sucesso</h6>
        </div>
        <div class="modal-footer">
        	<a href="../view/funcionarioLogado.php" class="modal-close btn">ok</a>
        </div>
    </div>
</body>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  	<script src="../js/materialize.js"></script>
  	<script src="../js/init.js"></script>
  	<script type="text/javascript">
  		$(document).ready(function(){
  			$('.modal').modal();
        $('.carousel').carousel();
        $('.carousel.carousel-slider').carousel({
          fullWidth: true,
          indicators: true,
          duration:100,
        });
  			<?php
  				if (!empty($editado) && $editado=='certo'){
  			?>
  				$('#modal_editado').modal('open');
  			<?php
  			}
  			?>
  		})
  	</script>
</html>
<?php
	}else{
		header('location:../view/loginAdm.php');
	}
?>