<?php 
  include_once('clienteLogadoFuncoes.php');
	$editado = isset($_GET['editado'])?$_GET['editado']:"";
	$deslogar = isset($_POST['deslogar'])?$_POST['deslogar']:"";
	if (!empty($deslogar)){
		unset($_SESSION['cod']);
	}
	if (!empty($_SESSION['cod'])) {
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/especificacoes.css" type="text/css" rel="stylesheet"/>
	<title></title>
</head>
<body>
	<nav class="white"  role="navigation">
    	<div class="nav-wrapper container">
      		<a id="logo-container"  style="font-weight: bold;text-transform: uppercase;" href="#dados_cliente" class="brand-logo modal-trigger"><?=$nome?></a>
      		<ul class="right hide-on-med-and-down">
            <li><a href="view/animalCliente.php"  style="font-weight: bold;text-transform: uppercase;" >Meu pet</a></li>
            <li><a href="clienteServico.php"  style="font-weight: bold;text-transform: uppercase;" >Serviços</a></li>
            <li class="left">
              <a href="#confirmar_deslogar" class="btn modal-trigger">sair</a>
            </li> 
      		</ul>
      		<ul id="nav-mobile" class="sidenav">
        		<li class="center">
              <form method="POST">
                <input type="submit" name="deslogar" value="deslogar" class="btn red">
              </form>
            </li>
            <li><a href="view/animalCliente.php">Meu pet</a></li>
            <li><a href="clienteServico.php">Serviços para o meu pet</a></li>
      		</ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <h4 class="center grey-text" style="font-weight: bold;text-transform: uppercase;">produtos</h4>
  <div class="container section">
    <form method="post" class="row">
      <input type="text" class="col s9 validate" name="pesquisa">
      <button type="submit" class="btn-floating" name="pesquisar"><i class="material-icons">search</i></button>
    </form>
  </div>
  <div class="row container">
  <?php
    if (!empty($produtos)) {
      foreach ($produtos as $produto) {
        if ($produto['estoque']!=0) {
          ?>
          <div class="col s8 m6 l4">
            <div class="card">
                <div class="card-image">
                    <img height="300px" src="img/<?=$produto['imagem']?>">
                    <a onclick="mandar_compra('<?=$produto['nome']?>','<?=$nome?>','<?=$login?>','<?=$produto['imagem']?>','<?=$produto['preco']?>','<?=$produto['estoque']?>')" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons">local_grocery_store</i></a>
                </div>
                <div class="card-content">
                    <h6><?=$produto['nome']?></h6>
                     <ul class="collapsible">
                      <li>
                       <div class="collapsible-header"><i class="material-icons">add</i>informações</div>
                        <div class="collapsible-body"><span><?=$produto['especificacoes']?></span></div>
                      </li>
                     </ul>
                    
                    <?php
                    if (!empty($produto['promocao'])) {
                      
                    ?>
                    <p style="font-weight: bold;text-transform: uppercase;"><s class="red-text">R$<?=$produto['preco']?></s>
                    <?php
                    $produto['preco'] = str_replace(',' , '.', $produto['preco']) - (str_replace(',','.', $produto['preco']) * $produto['promocao'] / 100 );
                    echo 'R$'.$produto['preco'];
                    ?>
                    </p>
                    <?php
                    }else{
                      ?>
                    <p style="font-weight: bold;text-transform: uppercase;">R$<?=str_replace(',','.',$produto['preco'])?></p>
                    <?php
                  }?>
                </div>
            </div>    
          </div>
    <?php
        }
      }
    }else{
      ?>
      <h6 class="center">Nenhum produto encontrado</h6>
    <?php
    }
  ?>
  </div>
    <div class="modal" id="modal_comprar">
      <form method="post" class="row">
        <img  id="imagem_produto" class="col s4">
      <div class="modal-content col s8" >
        <h6 style="font-weight: bold;text-transform: uppercase;">defina a quantidade do produto</h6>
        <input type="hidden" name="nome_produto" id="nome_produto">
        <input type="hidden" name="login" id="login">
        <input type="hidden" name="nome_cliente" id="nome_cliente">
        <input type="number" name="quantidade" id="quantidade">
        <input type="hidden" name="preco_produto" id="preco_produto">
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn" name="comprar" value="comprar">
      </div>
      </form>
    </div>
    <div class="modal" id="dados_cliente">
      <form method="post">
        <div class="modal-content">
          <h6 style="font-weight: bold;text-transform: uppercase;">Edite seus dados aqui</h6>
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
        <a class="modal-close btn" href="clienteLogado.php">ok</a>
      </div>
    </div>
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


</body>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('.collapsible').collapsible();
        $('.telefone').mask('(00)00000-0000');
        $('.data').mask('00/00/0000');

        $('.modal').modal();
        <?php
          if (!empty($editado) && $editado=='certo'){
        ?>
          $('#modal_editado').modal('open');
        <?php
        }
        ?>
    })
  </script>
  <script type="text/javascript">
    function mandar_compra($nome_produto,$nome_cliente,$login,$imagem,$preco,$estoque){
      $('#nome_cliente').val($nome_cliente);
      $('#nome_produto').val($nome_produto);
      $('#login').val($login);
      $('#preco_produto').val($preco);
      if ($imagem != ""){
      $('#imagem_produto').attr('src','img/' + $imagem);
      }
      $('#quantidade').attr('max',$estoque);
      $('#modal_comprar').modal('open');
    }
  </script>
</html>
<?php }else{
	header('location:index.php');
}  ?>