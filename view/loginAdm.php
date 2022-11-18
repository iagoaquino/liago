<?php
  include_once('loginAdmFuncoes.php');
  $logado = isset($_GET['logado'])?$_GET['logado']:"";
  if (isset($_SESSION['cod_administrador'])){
    header('location:index.php');
  }
  else if(isset($_SESSION['cod_funcionario'])) {
    header('location:funcionarioLogado.php');
  }else{
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/especificacoes.css" type="text/css" rel="stylesheet"/>
	<title>administrador</title>
</head>
<body>
	<nav class="white"  role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" style="font-weight: bold;text-transform: uppercase;"  class="brand-logo">Logue-se</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../index.php" class="modal-trigger">Página inicial</a></li>
     		<li><a href="#modal_logar_adm" class="modal-trigger btn">logar administrador</a></li>
        <li><a href="#modal_logar_funcionario" class="modal-trigger btn">logar funcionario</a></li>
      </ul>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="#modal_logar_adm" class="modal-trigger">logar administrador</a></li>
        <li><a href="#modal_logar_funcionario" class="modal-trigger">logar funcionario</a></li>
      </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
    </div>
  </nav>
   <div class="carousel carousel-slider" style="cursor: pointer;height: 90vh">
    <div class="carousel-fixed-item center">
      <a class="btn waves-effect white black-text darken-text-2" onclick="$('.carousel').carousel('next')">Passar</a>
    </div>
    <div class="carousel-item grey white-text">
      <h1 class="center" style="font-weight: bold;text-transform: uppercase;">Administrador</h1>
      <h2 class="center">Logue como administrador para ter acesso aos dados do site(produtos,clientes,servicos,animais,configuração).</h2>
    </div>
    <div class="carousel-item black white-text">
      <h1 class="center" style="font-weight: bold;text-transform: uppercase;">Funcionario</h1>
      <h2 class="center">Logue como funcionario para ter acesso as compras e serviços solicitados.</h2>
    </div>
    <div class="carousel-item teal white-text">
      <h1 class="center" style="font-weight: bold;text-transform: uppercase;">Informação</h1>
      <h2 class="center">Para ser um administrador ou funcionario é necessário que um administrador ja logado tenha cadastrado sua senha e seu login de acesso</h2>
    </div>
  </div>
  <div class="modal" id="modal_logar_adm" style="width: 30%">
    <form method="post">
        <div class="modal-content">
          <h6 style="font-weight: bold;text-transform: uppercase;">digite os dados do administrador</h6>
          <input type="text" name="login" placeholder="Login">
          <input type="password" name="senha" placeholder="Senha">
        </div>
        <div class="modal-footer">
          <a href="#" class="modal-close btn red">Cancelar</a>
          <input type="submit" class="btn" value="logar" name="logar_adm">
        </div>
    </form>
  </div>
<div class="modal" id="modal_logar_funcionario" style="width: 30%">
  <form method="post">
      <div class="modal-content">
        <h6 class="justify" style="font-weight: bold;text-transform: uppercase;">digite os dados do funcionario</h6>
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="senha" placeholder="Senha">
      </div>
      <div class="modal-footer"> 
        <a href="#" class="modal-close btn red">cancelar</a>
        <input type="submit" class="btn" value="logar" name="logar_funcionario">
      </div>
    </form>
</div>
<div class="modal" id="modal_logado_error">
  <div class="modal-content">
      <h6>Você não tem permissão para entrar!(ps:login e senha incorretos)</h6>
  </div>
  <div class="modal-footer">
    <a href="../view/loginAdm.php" class="btn modal-close">entendi</a>
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
            indicators: true
          });

          
          <?php 
            if (!empty($logado) && $logado == 'errado'){
          ?>
            $('#modal_logado_error').modal('open');
          <?php
            }
          ?>
    	})
 	</script>
</html>
<?php
  }
  ?>