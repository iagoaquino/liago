<?php
    session_start();
    include_once('produtoFuncoes.php');
    $cadastrado = isset($_GET['cadastrado'])?$_GET['cadastrado']:"";
    $apagado = isset($_GET['apagado'])?$_GET['apagado']:"";
    $editado = isset($_GET['editado'])?$_GET['editado']:"";

    if (isset($_SESSION['cod_administrador'])) {
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
                    <li><a href="listarAnimais.php">Animais</a></li>
                    <li><a href="listarUsuarios.php">Usuários</a></li>
                    <li><a href="listarClientes.php">Clientes</a></li>
                    <li><a href="listarServicos.php">Serviços</a></li>
                    <li><a href="listarConfig.php">Config</a></li>
                    <li><a href="index.php">Página inicial</a></li>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li><a href="listarAnimais.php">Animais</a></li>
                    <li><a href="listarUsuarios.php">Usuários</a></li>
                    <li><a href="listarClientes.php">Clientes</a></li>
                    <li><a href="listarServicos.php">Serviços</a></li>
                    <li><a href="listarConfig.php">Config</a></li>
                    <li><a href="index.php">Página inicial</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <div class="section container">
            <form method="post" class="row">
                <input type="text" class="col s9" placeholder="Pesquisa" name="pesquisa"> 
                <button type="submit" class="btn-floating" name="pesquisar"><i class="material-icons">search</i></button>
            </form>
        </div>
        <div class="container">
            <table class="black-text">
                <tr class="grey lighten-3">
                    <td class="center">Cod</td>
                    <td class="center">Nome</td>
                    <td class="center">Especificações</td>
                    <td class="center">Preço</td>
                    <td class="center">Promoção</td>
                    <td class="center">Estoque</td>
                    <td class="center">Imagem</td>
                    <td class="center" colspan="2">Funções</td>
                </tr>
                <?php
                    foreach ($produtos as $produto) {

                ?>
                    <tr>
                        <td class="center">
                            <?=$produto['cod']?>
                        </td>
                        <td class="center">
                            <?=$produto['nome']?>
                        </td>
                        <td class="center">
                            <?=$produto['especificacoes']?>
                        </td>
                        <td class="center">
                            <?=$produto['preco']?>
                        </td>
                        <td class="center">
                            <?=$produto['promocao']?>
                        </td>
                        <td class="center">
                            <?=$produto['estoque']?>
                        </td>
                        <?php
                            if (!empty($produto['imagem'])) {
                        ?>
                            <td class="center"><img width="50%" src="../img/<?=$produto['imagem']?>"></td>
                            <?php }else{ 
                         ?>
                                <td class="center">Não tem imagem do produto</td>
                                <?php }
                             ?>
                        <td>
                            <a onclick="mover_apagar('<?=$produto['cod']?>')" class="btn red"><i class="material-icons">delete</i></a>
                        </td>
                        <td>
                            <a href="#" type="button" onclick="editar('<?=$produto['cod']?>','<?=$produto['nome']?>','<?=$produto['preco']?>','<?=$produto['especificacoes']?>','<?=$produto['promocao']?>','<?=$produto['estoque']?>','<?=$produto['imagem']?>')" class="btn" value="editar"><i class="material-icons">create</i></a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
            </table>
        </div>
        <div class="container">
            <a href="#modal-cadastrar" class="btn blue modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="modal" id="modal-cadastrar">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <input type="text" name="nome" placeholder="Nome" required="">
                    <input type="text" name="preco"placeholder="Preco" required="">
                    <input type="text" name="especificacoes" placeholder="Informações do produto" required="">
                    <input type="text" name="estoque" placeholder="Estoque" required="">
                    <input type="text" class="promocao" name="promocao"placeholder="Promocao">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>foto</span>
                            <input type="file" name="arquivo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn blue" name="salvar" value="cadastrar">
                </div>
            </form>
        </div>
        <div class="modal" id="modal_editar">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-content row">
                    <img id="foto_produto" class="col s6">
                    <div class="col s6">
                        <input type="hidden" id="cod" name="cod">
                        <input type="text" id="nome" name="nome">
                        <input type="text" name="especificacoes" id="especificacoes">
                        <input type="text" id="preco" name="preco">
                        <input type="text" id="estoque" name="estoque">
                        <input type="text" class="promocao" id="promocao" name="promocao">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>foto</span>
                                <input type="file" name="e_arquivo">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" id="nome_foto" name="nome_foto" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn" value="salvar" name="salvar">
                    </div>
            </form>
            </div>
        </div>

        <div class="modal" id="modal_cadastrado">
            <div class="modal-content">
                Produto cadastrado com sucesso
            </div>
            <div class="modal-footer">
                <a href="../view/listarProdutos.php" class="btn modal-close">ok</a>
            </div>
        </div>

        <div class="modal" id="modal_apagado">
            <div class="modal-content">
                Produto apagado com sucesso
            </div>
            <div class="modal-footer">
                <a href="../view/listarProdutos.php" class="btn modal-close">ok</a>
            </div>
        </div>

        <div class="modal" id="modal_apagado_error">
            <div class="modal-content">
                Não foi possivel apagar o produto vejá se alguem comprou esse produto e apague a compra depois tente novamente
            </div>
            <div class="modal-footer">
                <a href="../view/listarProdutos.php" class="btn modal-close">ok</a>
            </div>
        </div>
        <div class="modal" id="modal_editado">
            <div class="modal-content">
                Produto editado com sucesso
            </div>
            <div class="modal-footer">
                <a href="../view/listarProdutos.php" class="btn modal-close">ok</a>
            </div>
        </div>
        <div class="modal" id="confirmar_apagar">
            <form method="post">
                <div class="modal-content">
                    <h6>Deseja realmente completar essa ação?</h6>
                    <input type="hidden" id="cod_apagar" name="cod_apagar">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="apagar" class="btn red" value="apagar">
                    <a class="modal-close btn">cancelar</a>
                </div>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.modal').modal();
            $('.promocao').mask('000',{reverse:false});
            <?php
                if (!empty($cadastrado)) {
            ?>
            $('#modal_cadastrado').modal('open');
            <?php
                }
            ?>
            <?php
                if (!empty($apagado) && $apagado=='certo') {
            ?>
            $('#modal_apagado').modal('open');
            <?php
                }else if (!empty($apagado) && $apagado=='errado'){
                    ?>
            $('#modal_apagado_error').modal('open');
            <?php
                }
            ?>
            <?php
                if (!empty($editado)) {
            ?>
            $('#modal_editado').modal('open');
            <?php
                }
            ?>
        })
    </script>
    <script type="text/javascript">
        function editar($cod, $nome, $preco, $especificacoes, $promocao, $estoque, $imagem) {
            $('#cod').val($cod);
            $('#nome').val($nome);
            $('#preco').val($preco);
            $('#especificacoes').val($especificacoes);
            $('#promocao').val($promocao);
            $('#estoque').val($estoque);
            $('#nome_foto').val($imagem)
            $('#modal_editar').modal('open'); 
            if ($imagem != "") {
                $('#foto_produto').attr('src', '../img/' + $imagem);
            } else {
                $('#foto_produto').removeAttr('src');
            }
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