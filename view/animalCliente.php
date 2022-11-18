<?php
	include_once('animalClienteFuncoes.php');
    $apagado = isset($_GET['apagado'])?$_GET['apagado']:"";
    $editado = isset($_GET['editado'])?$_GET['editado']:"";
    if (isset($_SESSION['cod'])) {
        
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="../css/especificacoes.css" type="text/css" rel="stylesheet" />
    </head>

    <body class="grey lighten-3">
        <nav class="grey lighten-3" role="navigation">
            <div class="nav-wrapper container">

                <ul class="right hide-on-med-and-down">
                    <li><a style="font-weight: bold;text-transform: uppercase;" href="../clienteLogado.php">Loja</a></li>
                    <li><a  style="font-weight: bold;text-transform: uppercase;"  href="../clienteServico.php">Serviços</a></li>

                </ul>
                <ul id="nav-mobile" class="sidenav">
                    <li><a href="../clienteLogado.php">Loja</a></li>
                    <li><a href="../clienteServico.php">Serviços</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <div>
            <h6 class="center light" style="font-weight: bold;text-transform: uppercase;">Altere os dados do animal</h6>
        </div>
        <div class="container">
            <?php
			foreach ($animais as $animal) {
				?>
                <div class="row">
                   <div class="row">
                        <div class="col s12 m6">
                            <div class="card">
                                <div class="card-image">
                                    <img src="../img/<?=$animal['imagem']?>">
                                    <a onclick="mandar_apagar('<?=$animal['cod']?>')" class="btn-floating halfway-fab waves-effect waves-light left red"><i class="material-icons">delete</i></a>
                                    <a onclick="editar('<?=$animal['cod']?>','<?=$animal['nome']?>','<?=$animal['tipo']?>','<?=$animal['raca']?>','<?=$animal['imagem']?>','<?=$animal['idade']?>')" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">create</i></a>
                                </div>
                                <div class="card-content">
                                    <h6>Meu nome é <?=$animal['nome']?> e tenho <?=$animal['idade']?> anos e sou um <?=$animal['raca']?> por isso sou um <?=$animal['tipo']?></h6>
                                </div>
                            </div>    
                        </div>
                    </div>
                    
                </div>
                <?php 
			}
		?>
        </div>
        <div class="container">
            <a href="#modal_cadastrar" class="modal-trigger btn"><i class="material-icons">add</i></a>
        </div>
        <div class="modal" id="modal_cadastrar">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <h6>Insira os dados do seu novo animal</h6>
                    <input type="text" name="nome" placeholder="nome" required="">
                    <input type="text" name="raca" placeholder="raca" required="">
                    <input type="text" class="numero" name="idade" placeholder="idade" required="">
                    <input type="text" name="tipo" placeholder=" cachorro,gato,rato ou etc" required="">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>foto</span>
                            <input type="file" name="arquivo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" placeholder="escolha a foto dele" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="salvar" class="btn right" value="cadastrar">
                </div>
            </form>
        </div>
        <div class="modal" id="confirmar_apagar">
            <form method="post">
                <div class="modal-content">
                    <h6>Deseja realmente completar essa ação?</h6>
                    <input type="hidden" name="cod_apagar" id="cod_apagar">
                 </div>  
                <div class="modal-footer">
                    <input type="submit" name="apagar" class="btn red" value="apagar">
                    <a class="btn modal-close">cancelar</a>                    
                </div>
            </form>
        </div>
        <div class="modal" id="modal_apagado">
            <div class="modal-content">
                <h6>Animal apagado com sucesso</h6>
            </div>
            <div class="modal-footer">
                <a href="../view/animalCliente.php" class="btn modal-close">ok</a>
            </div>
        </div>
        <div class="modal" id="modal_editar">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-content row">
                    <img id="foto_animal_mostrar"  class="col s6">
                    <div class="col s6">
                        <input type="hidden" name="e_cod" id="cod">
                        <input type="text" name="e_nome" id="nome" placeholder="Nome">
                        <input type="text" name="e_raca" id="raca" placeholder="Raça">
                        <input type="text" class="numero" name="e_idade" id="idade" placeholder="Idade">
                        <input type="text" name="e_tipo" id="tipo" placeholder="Gato,cachorro e etc">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>foto</span>
                                <input type="file" name="e_arquivo">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="texto_foto" id="texto_foto" placeholder="Escolha a foto dele" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="salvar" class="btn right" value="salvar">
                </div>
            </form>
        </div>
        <div class="modal" id="sem_animal">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <h6>Você não possui um animal ainda insira os dados aqui para mudar isso</h6>
                    <input type="text" name="nome" placeholder="nome" required="">
                    <input type="text" name="raca" placeholder="raca" required="">
                    <input type="text" class="numero" name="idade" placeholder="idade" required="">
                    <input type="text" name="tipo" placeholder=" cachorro,gato,rato ou etc" required="">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>foto</span>
                            <input type="file" name="arquivo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" placeholder="escolha a foto dele" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="salvar" class="btn right" value="cadastrar">
                </div>
            </form>
        </div>
        <div class="modal" id="modal_editado">
            <div class="modal-content">
                Animal alterado com sucesso
            </div>
            <div class="modal-footer">
                <a href="../view/animalCliente.php" class="modal-close btn">ok</a>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script type="text/javascript">
        function editar($cod, $nome, $tipo, $raca, $imagem, $idade) {
            $('#cod').val($cod);
            $('#nome').val($nome);
            $('#raca').val($raca);
            $('#idade').val($idade);
            $('#texto_foto').val($imagem);
            $('#foto_animal_mostrar').attr('src', '../img/' + $imagem);
            $('#tipo').val($tipo);
            $('#modal_editar').modal('open');
        }
        function mandar_apagar($cod){
            $('#cod_apagar').val($cod);
            $('#confirmar_apagar').modal('open');
        }
    </script>
   
    <script type="text/javascript">
        $(document).ready(function() {
            $('.modal').modal();
            $('.numero').mask('000000000');
            <?php
                if(!empty($apagado) && $apagado=='certo'){
            ?> 
                $('#modal_apagado').modal('open')
            <?php
                }
            ?>
            <?php 
  				if($sem_animal){
  			?>
                $('#sem_animal').modal('open');
            <?php
  				}
  			?>
            <?php
                if (!empty($editado) && $editado == 'certo'){
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
            header('location:../index.php');
        }
    ?>