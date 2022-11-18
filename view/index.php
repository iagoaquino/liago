<?php
    include_once('indexViewFuncoes.php');
    $existe = isset($_GET['existe'])?$_GET['existe']:"";
    $cadastrado = isset($_GET['feito'])?$_GET['feito']:"";
    if (!empty($_POST['deslogar'])) {
        unset($_SESSION['cod_administrador']);
    }
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
            <div class="nav-wrapper container">
                <?php if ($nome == 'admin') {
                ?>
                    <a id="logo-container" style="font-weight: bold;text-transform: uppercase;" href="#" class="brand-logo">administrador padrão</a>
                <?php
                 }else{  
                 ?>
                        <a id="logo-container" style="font-weight: bold;text-transform: uppercase;"  href="#" class="brand-logo">
                            <?=$nome?>
                        </a>
                <?php
            }
                 ?>
                        <ul class="right hide-on-med-and-down">
                            <li class="right">
                                <a href="#confirmar_deslogar" class="btn modal-trigger">sair</a>
                            </li>
                            <li>
                                <a href="listarConfig.php" title="editar o site"><i class="material-icons">create</i></a>
                            </li>
                            <li>
                                <a href="listarUsuarios.php" title="editar os funcionarios"><i class="material-icons">assignment_ind</i></a>
                            </li>
                            <li>
                                <a href="listarProdutos.php" title="editar os produtos"><i class="material-icons">shopping_cart</i></a>
                            </li>
                            <li>
                                <a href="listarServicos.php" title="editar os serviços"><i class="material-icons">pan_tool</i></a>
                            </li>
                            <li>
                                <a href="listarClientes.php" title="editar os clientes"><i class="material-icons">person</i></a>
                            </li>
                            <li>
                                <a href="listarAnimais.php" title="editar os animais"><i class="material-icons">pets</i></a>
                            </li>
                        </ul>
                        <ul id="nav-mobile" class="sidenav">
                            <li class="center">
                                <form method="POST">
                                    <input type="submit" name="deslogar" value="deslogar" class="btn red">
                                </form>
                            </li>
                            <li>
                                <a href="#cadastrar_funcionario" class=" modal-trigger">+funcionarios</a>
                            </li>
                            <li>
                                <a href="#cadastrar_administrador" class=" modal-trigger">+administrador</a>
                            </li>
                            <li>
                                <a href="listarConfig.php" title="editar o site">editar site</a>
                            </li>
                            <li>
                                <a href="listarUsuarios.php" title="editar os funcionarios">editar funcionario</a>
                            </li>
                            <li>
                                <a href="listarProdutos.php" title="editar os produtos">editar produtos</a>
                            </li>
                            <li>
                                <a href="listarServicos.php" title="editar os serviços">editar serviços</a>
                            </li>
                            <li>
                                <a href="listarClientes.php" title="editar os clientes">editar clientes</a>
                            </li>
                             <li>
                                <a href="listarAnimais.php" title="editar os animais">ver animais</a>
                            </li>
                        </ul>
                        <a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
            </div>
        </nav>
       <div class="carousel carousel-slider" style="cursor: pointer;height: 90vh">
            <div class="carousel-fixed-item center">
              <a class="btn waves-effect white black-text darken-text-2" onclick="$('.carousel').carousel('next')">Proximo</a>
            </div>
            <div class="carousel-item grey white-text">
              <h1 class="center" style="font-weight: bold;text-transform: uppercase;">Editar o site</h1>
              <p class="center"><i class="material-icons medium">edit</i></p>
              <h4 class="center">Modifique o formulario para mudar as configurações do site</h4>
            </div>
            <div class="carousel-item black white-text">
              <h1 class="center" style="font-weight: bold;text-transform: uppercase;">Funcionarios</h1>
              <p class="center"><i class="material-icons medium">assignment_ind</i></p>
              <h4 class="center">Tenha o acesso a todos os funcionarios. Edite, apague ou cadastre um novo como desejar(logins não podem se repetir)</h4>
            </div>
            <div class="carousel-item teal white-text">
              <h1 class="center" style="font-weight: bold;text-transform: uppercase;">Produtos</h1>
              <p class="center"><i class="material-icons medium">shopping_cart</i></p>
              <h4 class="center">Tenha acesso a todos os produtos. Edite, apague ou cadastre como desejar(produtos já comprados não podem ser apagados)</h4>
            </div>
            <div class="carousel-item green white-text">
              <h1 class="center" style="font-weight: bold;text-transform: uppercase;">Serviços</h1>
              <p class="center"><i class="material-icons medium">pan_tool</i></p>
              <h4 class="center">Tenha acesso aos serviços que sua empresa presta. Edite, apague ou cadastre como desejar(serviços já solicitados não podem ser apagados)</h4>
            </div>
            <div class="carousel-item blue white-text">
              <h1 class="center" style="font-weight: bold;text-transform: uppercase;">Clientes</h1>
              <p class="center"><i class="material-icons medium">person</i></p>
              <h4 class="center">Tenhas acesso a todos os clientes. Edite, apague ou cadastre como desejar(clientes com animais ja cadastrados não podem ser apagados)</h4>
            </div>
            <div class="carousel-item amber white-text">
              <h1 class="center" style="font-weight: bold;text-transform: uppercase;">animais</h1>
              <p class="center"><i class="material-icons medium">pets</i></p>
              <h4 class="center">Veja os animais que os clientes possuem.Apenas veja ou apague quem cadastra ou edita é os clientes(caso queira apagar um cliente apague o pet dele antes)</h4>
            </div>
        </div>    
        <div class="modal" id="nome_padrao">
            <div class="modal-content">
                Modifique o login e a senha para que o seu site se torne mais seguro
            </div>
            <div class="modal-footer">
                <a href="#modal_editar" class="modal-close  modal-trigger btn">mudar agora</a>
                <a href="#" class="modal-close btn red"><i class="material-icons">close</i></a>
            </div>
        </div>
        <div class="modal" id="modal_editar" style="width:35%">
            <form method="post">
                <div class="modal-content">
                    <input type="hidden" name="e_cod" value="<?=$_SESSION['cod_usuario']?>" required="">
                    <input type="text" name="e_login" placeholder="login" required="">
                    <input type="text" name="e_nome" placeholder="nome" required="">

                    <input type="password" name="e_senha" placeholder="senha">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn green" name="salvar" value="salvar">
                </div>
            </form>
        </div>
        <div class="modal" id="cadastrar_funcionario" style="width:40%">
            <form method="post">
                <h6 class="center">digite os dados do funcionario</h6>
                <div class="modal-content">
                    <input type="text" name="nome_funcionario" placeholder="nome" required="">
                    <input type="text" name="login_funcionario" placeholder="login" required="">
                    <input type="password" name="senha_funcionario" placeholder="senha" required="">
                </div>
                <div class="modal-footer">
                    <input type="submit" value="cadastrar" class="btn" name="cadastrar_funcionario">
                </div>
            </form>
        </div>
        <div class="modal" id="cadastrar_administrador" style="width:40%">
            <form method="post">
                <h6 class="center">Digite os dados do administrador</h6>
                <div class="modal-content">
                    <input type="text" name="nome_administrador" placeholder="nome" required="">
                    <input type="text" name="login_administrador" placeholder="login" required="">
                    <input type="password" name="senha_administrador" placeholder="senha" required="">
                </div>
                <div class="modal-footer">
                    <input type="submit" value="cadastrar" class="btn" name="cadastrar_administrador">
                </div>
            </form>
        </div>

        <div class="modal" id="login_existente" style="width:40%">
            <div class="modal-content">
                <h6 style="font-weight: bold;text-transform: uppercase;">O login ja existe tente outro</h6>
            </div>
            <div class="modal-footer">
                <a href="../view/" class="btn red modal-close">ok</a>
            </div>
        </div>
        <div class="modal" id="cadastrado" style="width:40%">
            <div class="modal-content">
                <h6 style="font-weight: bold;text-transform: uppercase;">cadastro realizado com sucesso</h6>
            </div>
            <div class="modal-footer">
                <a href="../view/" class="btn green modal-close">ok</a>
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
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="../js/materialize.js"></script>
        <script src="../js/init.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.modal').modal();
                $('.carousel').carousel();
                $('.carousel.carousel-slider').carousel({
                    fullWidth: true,
                    indicators: true,
                    duration:100,
                });
                <?php
            if($login == 'admin'){
        ?>
                $('#nome_padrao').modal('open');
                <?php
            }
        ?>
                <?php
        if ($existe == 'certo'){
        ?>
                $('#login_existente').modal('open');
        <?php
        }
        ?>
                <?php 
        if ($cadastrado == 'certo'){
            ?>
                $('#cadastrado').modal('open');
                <?php
            } 
            ?>
            })
        </script>
    </body>

    </html>
    <?php
    }else{header('location:loginAdm.php');
}
?>