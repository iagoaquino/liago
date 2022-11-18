<?php
  include_once('clienteServicoFuncoes.php');
	$deslogar = isset($_POST['deslogar'])?$_POST['deslogar']:"";
  $editado = isset($_GET['editado'])?$_GET['editado']:"";
	if (!empty($deslogar)){
		unset($_SESSION['cod']);
		session_destroy();
	}
	if (!empty($_SESSION['cod'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/especificacoes.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<nav class="white"  role="navigation">
    	<div class="nav-wrapper container">
      		<a id="logo-container"  style="font-weight: bold;text-transform: uppercase;" href="#dados_cliente" class="brand-logo modal-trigger"><?=$nome?></a>
      		<ul class="right hide-on-med-and-down">
            <li><a href="view/animalCliente.php"  style="font-weight: bold;text-transform: uppercase;" >Seu pet</a></li>
            <li><a href="clienteLogado.php"  style="font-weight: bold;text-transform: uppercase;" >Loja</a></li> 
      		</ul>
      		<ul id="nav-mobile" class="sidenav">
        		<li class="center">
              <form method="POST">
                <input type="submit" name="deslogar" value="deslogar" class="btn red">
              </form>
            </li>
      		</ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <h6 class="center grey-text arial" style="font-weight: bold;text-transform: uppercase;">aqui esta o serviço que oferecemos a nossos clientes</h6>
  <div class="container">
    <?php
        foreach ($servicos as $servico) {
          ?>
          <div class="row section">
            <div class="col s6">
              <h5><?=$servico['nome']?></h5>
              <h6><?=$servico['observacoes']?></h6>
            </div>
            <?php
            if (!empty($servico['promocao'])) {
              ?>
              <h6 class="col s1" style="font-family: arial black"><s class="red-text">R$<?=$servico['preco']?></s> <?php
                $servico['preco'] = str_replace(',' , '.', $servico['preco']) - (str_replace(',','.', $servico['preco']) * $servico['promocao'] / 100 );
                echo 'R$'. $servico['preco'];
              ?>
            </h6>
              <a onclick="mandar_solicita('<?=$servico['preco']?>','<?=$servico['nome']?>')" class="btn modal-trigger col s2 right z-depth-5">comprar</a>
            <?php
            }else{
          ?>
          <h4 style="font-family: arial black">R$<?=str_replace(',','.',$servico['preco'])?></h4>
        <?php } ?>
          </div>
    <?php
        }
    ?>
    <div class="modal" id="solicitar_servico">
      <form method="post">
      <div class="modal-content input-field">
        <h6>Selecione o animal que você quer que receba o servico</h6>
        <input type="hidden" name="preco" id="preco">
        <input type="hidden" name="nome_servico" id="nome_servico">
        <select name="animal" class="icons">
          <?php
            foreach ($animais as $animal) {            
            ?>
            <option data-icon="img/<?=$animal['imagem']?>" value="<?=$animal['nome']?>"><?=$animal['nome']?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn" value="solicitar" name="solicitar">
      </div>
      </form>
    </div>
    <div class="modal" id="dados_cliente">
      <form method="post">
        <div class="modal-content">
          <h6  style="font-weight: bold;text-transform: uppercase;">Edite seus dados aqui</h6>
          <input type="hidden" name="cod" value="<?=$_SESSION['cod']?>">
          <input type="text" name="nome" value="<?=$nome?>">
          <input type="text" name="login" value="<?=$login?>">
          <input type="text" class="data" name="data_nasc" value="<?=$data_nascimento?>">
          <input type="text" name="estado" value="<?=$estado?>">
          <input type="text" name="rua" value="<?=$rua?>">
          <input type="text" name="cidade" value="<?=$cidade?>">
          <input type="text" name="bairro" value="<?=$bairro?>">
          <input type="text" name="numero_casa" value="<?=$numero_casa?>">
          <input type="text" class="telefone" name="telefone" value="<?=$telefone_cliente?>">
        </div>
        <div class="modal-footer">
          <input type="submit" name="editar" class="btn" value="salvar">
        </div>
      </form>
    </div>
    <div class="modal" id="modal_editado">
      <div class="modal-content">
        <h6>Seus dados foram editados com sucesso</h6>
      </div>
      <div class="modal-footer">
        <a class="modal-close btn" href="clienteServico.php">ok</a>
      </div>
    </div>
</body>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.modal').modal();
      $('select').formSelect();
      $('.telefone').mask('(00)00000-0000');
      $('.data').mask('00/00/0000');
      <?php
          if (!empty($editado) && $editado=='certo'){
        ?>
          $('#modal_editado').modal('open');
        <?php
        }
        ?>
    });
  </script>
  <script type="text/javascript">
    function mandar_solicita($preco,$nome){
      $('#preco').val($preco);
      $('#nome_servico').val($nome);
      $('#solicitar_servico').modal('open');
    }
  </script>
</html>
<?php }else{
	header('location:index.php');

	}  
?>