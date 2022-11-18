<?php

  include_once('indexFuncoes.php');
  $logado = isset($_GET['logar'])?$_GET['logar']:"";
  $cadastrado = isset($_GET['cadastrado'])?$_GET['cadastrado']:"";
  $validacao = isset($_GET['validacao'])?$_GET['validacao']:"";
    if (!empty($_SESSION['cod'])) {
        header('location:clienteLogado.php');
    }else{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Pet-shop</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="css/especificacoes.css" type="text/css" rel="stylesheet" />
    </head>

    <body>
        <nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="#" class="brand-logo">
                    <b><?=$nome?></b>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#logue" class="modal-trigger" title="Loja">Acessar loja</a></li>
                    <li><a href="#modal_mais_informacoes" class="modal-trigger" title="Sobre">Dica do dia</a></li>
                    <a href="#cadastrar_modal" class="btn modal-trigger">Cadastrar-se</a>
                </ul>
                <ul id="nav-mobile" class="sidenav">
                    <li><a href="#logue" class="modal-trigger" title="Loja">Acessar loja</a></li>
                    <li><a href="#modal_mais_informacoes" class="modal-trigger" title="Sobre">Dica do dia</a></li>
                    <a href="#cadastrar_modal" class="btn modal-trigger">Cadastrar-se</a>
                </ul>

                <a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <div id="index-banner" class="parallax-container">
            <div class="section no-pad-bot">
                <div class="container">
                    
                </div>
            </div>
            <div class="parallax"><img src="img/foto_parallax1.jpeg" alt="Unsplashed background img 1"></div>
        </div>

        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 m4 justify">
                        <div class="icon-block">
                            <h2 class="center teal-text"><i class="material-icons">info</i></h2>
                            <h5 class="center">Informações do Site</h5>

                            <p class="light">
                                <?=$informacoes_sobre_site?>
                            </p>
                        </div>
                    </div>

                    <div class="col s12 m4 justify">
                        <div class="icon-block">
                            <h2 class="center teal-text"><i class="material-icons">group</i></h2>
                            <h5 class="center">Sobre</h5>
                            <p class="light"><?=$sobre_equipe?></p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center teal-text"><i class="material-icons">sentiment_very_satisfied</i></h2>
                            <h5 class="center">Como nos sentimos</h5>
                            <p class="light justify">
                                <?=$como_nos_sentimos?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <footer class="page-footer teal">
            <div class="container">
                <div>
                    <div class="col l6 s12">
                        <h5 class="white-text center" style="font-weight: bold;text-transform: uppercase;"><?=$texto_rodape?></h5>
                        <p class="grey-text text-lighten-4"></p>

                    </div>
                    <div class="col l3 s12 center">
                        <ul>
                            <li>
                                <h6>Instagram</h6>
                                <a class="white-text" href="#!">
                                    <?=$instagram?>
                                </a>
                            </li>
                            <li>
                                <h6>Email</h6>
                                <a class="white-text" href="#!">
                                    <?=$email?>
                                </a>
                            </li>
                            <li>
                                <h6>Telefone</h6>
                                <a class="white-text" href="#!">
                                    <?=$numero?>
                                </a>
                            </li>
                            <li>
                                <h6>Twitter</h6>
                                <a class="white-text" href="#!">
                                    <?=$twitter?>
                                </a>
                            </li>
                            <li>
                                <h6>Facebook</h6>
                                <a class="white-text" href="#!">
                                    <?=$facebook?>
                                </a>
                            </li>
                            <li>
                                <h6>endereço</h6>
                                <a href="" class="white-text">
                                    <?=$estado?>,<?=$cidade?>,<?=$bairro?>,<?=$rua?> <?=$numero_casa?>

                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-copyright">
                        <div class="container">
                            Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
                        </div>
                    </div>
        </footer>
        <div class="modal" style="width: 40%" id="logue">
            <div class="modal-content">
                <h6 style="font-weight: bold;text-transform: uppercase;">Digite os seus dados para logar</h6>
                <form method="POST">
                    <input type="text" name="login" id="login" placeholder="Login">
                    <input type="password" name="senha" id="senha" placeholder="Senha">
                    <div class="center">
                        <input type="submit" value="logar" class="btn" name="logar">
                        <a href="" class="modal-close btn red">cancelar</a>
                    </div>
                </form>
            </div>
        </div>
        <div id="modal_mais_informacoes" class="modal modal justify">
            <div class="modal-content">
                <?php
                    if (empty($dica)) {
                        ?>
                            Nenhuma dica foi colocada no banco!
                        <?php
                    }else{
                ?>
                <h5 style="font-weight: bold;text-transform: uppercase;">Dica do dia:</h5>
                <?=$dica?>
                 <?php } ?>
            </div>
            <div class="modal-footer">
                <div class="btn modal-close">Entendi</div>
            </div>
        </div>
        <div class="modal" id="cadastrar_modal" style="width:30%">
            <h6 class="center" style="font-weight: bold;text-transform: uppercase;">Digite seus dados</h6>
            <form method="POST" class="container">
                <input type="text" name="nome" placeholder="Nome verdadeiro" required="true">
                <input type="text" name="data_nasc" id="data_nasc" placeholder="Data de nascimento" required="true">
                <input type="text" name="estado" placeholder="Estado" required="true">
                <input type="text" name="cidade" placeholder="Cidade" required="true">
                <input type="text" name="bairro" placeholder="Bairro" required="true">
                <input type="text" name="rua" placeholder="Rua" required="true">
                <input type="text" name="numero_casa" placeholder="Numero da casa" required="true">
                <input type="text" name="telefone" id="telefone" placeholder="Telefone">
                <input type="text" name="nick" placeholder="Login" required="true">
                <input type="password" name="senha" placeholder="Senha" required="true">
                <div class="modal-footer">
                    <input type="submit" name="cadastrar" class="btn" value="cadastrar">
                </div>
            </form>
        </div>
        <div class="modal modal_fechavel" id="error">
            <div class="modal-content">
                Não foi possivel fazer o cadastro já existe alguem usando esse nick
            </div>
            <div class="modal-footer">
                <a href="index.php" class="modal-close btn green">entendi</a>
            </div>
        </div>

        <div class="modal modal_fechavel" id="acerto">
            <div class="modal-content">
                cadastro realizado com sucesso já pode utilizar de nossa loja
            </div>
            <div class="modal-footer">
                <a href="index.php" class="modal-close btn green">entendi</a>
            </div>
        </div>
        <div class="modal" style="width:30%" id="modal_logado_errado">
            <div class="modal-content">
                senha ou login incorretos
            </div>
            <div class="modal-footer">
                <a href="index.php" class="modal-close btn red">ok</a>
            </div>
        </div>
    </body>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.modal').modal();
                <?php
                  if ($validacao == 'errado'){
                    ?>
                $('#error').modal('open');
                <?php
                  }
                  if($validacao == 'certo'){
                    ?>
                $('#acerto').modal('open');
                <?php
                  }
                ?>
                <?php
                    if ($logado =='error'){
                        ?>
                $('#modal_logado_errado').modal('open');
                <?php
                    }
                ?>
                $('#data_nasc').mask('00/00/0000', {reverse: false});
                $('#telefone').mask('(00)00000-0000', {reverse: false});
            })
        </script>

    </html>
    <?php

} ?>