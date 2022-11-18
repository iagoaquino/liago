<?php
	include_once('clienteFuncoes.php');
	$cadastrado = isset($_GET['cadastrado'])?$_GET['cadastrado']:"";
	$editado = isset($_GET['editado'])?$_GET['editado']:"";
	$apagado = isset($_GET['apagado'])?$_GET['apagado']:"";


	if (isset($_SESSION['cod_administrador'])){
 ?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  		<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
 		<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="../css/especificacoes.css" type="text/css" rel="stylesheet"/>
		<title>clientes</title>
	</head>
	<body>
		<nav class="white" role="navigation">
			
   			<div class="nav-wrapper container">
      			<ul class="right hide-on-med-and-down black-text">
      				<li><a href="listarAnimais.php">Animais</a></li>
        			<li><a href="listarUsuarios.php">Usuarios</a></li>
        			<li><a href="listarProdutos.php">Produtos</a></li>
        			<li><a href="listarServicos.php">Serviços</a></li>
        			<li><a href="listarConfig.php">Config</a></li>
        			<li><a href="index.php">Página inicial</a></li>

     		</ul>

      		<ul id="nav-mobile" class="sidenav">
      			<li><a href="listarAnimais.php">Animais</a></li>
        		<li><a href="listarUsuarios.php">Usuarios</a></li>
        		<li><a href="listarProdutos.php">Produtos</a></li>
        		<li><a href="listarServicos.php">Serviços</a></li>
        		<li><a href="index.php">Página inicial</a></li>

      		</ul>
        	<a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
    	</div>
  </nav>
  		<div class="section container">
			<form method="post" class="row">
				<input type="text" class="col s9" placeholder="pesquisa" name="pesquisa">
				<button type="submit" class="btn-floating teal" name="pesquisar"><i class="material-icons ">search</i></button>
			</form>
		</div>
			<table class="black-text">
				<tr class="grey lighten-3">
				<td class="center">Cod</td>
				<td class="center">Data de nascimento</td>
				<td class="center">Nome</td>				
				<td class="center">Login</td>
				<td class="center">Senha</td>
				<td class="center">Estado</td>
				<td class="center">Cidade</td>
				<td class="center">Bairro</td>
				<td class="center">Rua</td>
				<td class="center">N° da casa</td>
				<td class="center">Telefone</td>
				<td colspan="2" class="center">Ações</td>
				</tr>
				<?php
					foreach ($clientes as $cliente) {
						?>
						<tr>
							<td class="center"><?=$cliente['cod']?></td>
							<td class="center"><?=$cliente['data_nasc']?></td>
							<td class="center"><?=$cliente['nome']?></td>
							<td class="center"><?=$cliente['login']?></td>
							<td class="center"><?=$cliente['senha']?></td>
							<td class="center"><?=$cliente['estado']?></td>
							<td class="center"><?=$cliente['cidade']?></td>
							<td class="center"><?=$cliente['bairro']?></td>
							<td class="center"><?=$cliente['rua']?></td>
							<td class="center"><?=$cliente['numero_casa']?></td>
							<td class="center"><?=$cliente['telefone']?></td>
							<td>
								<a href="#" type="button" class="btn" onclick="editar('<?=$cliente['cod']?>','<?=$cliente['data_nasc']?>','<?=$cliente['nome']?>','<?=$cliente['login']?>','<?=$cliente['estado']?>','<?=$cliente['cidade']?>','<?=$cliente['bairro']?>','<?=$cliente['rua']?>','<?=$cliente['numero_casa']?>','<?=$cliente['telefone']?>',)"><i class="material-icons">create</i></a>
							</td>
							<td>
								<a onclick="mandar_apagar('<?=$cliente['cod']?>')" class="btn red"><i class="material-icons">delete</i></a>
							</td>
						</tr>
						<?php
					}

				?>
			</table>

		<div class="container">
			<a href="#modal_cadastrar" class="modal-trigger btn teal"><i class="material-icons">add</i></a>
		</div>
		<div class="modal" id="modal_cadastrar">
			<form method="post">
				<div class="modal-content">
					<h6>digite os novos valores a serem inseridos</h6>
					<input type="hidden" name="cod">
					<input type="text" class="data" name="data_nasc" placeholder="data de nascimento" required="">
					<input type="text" name="nome" placeholder="nome" required="">
					<input type="text" name="estado" placeholder="estado" required="">
					<input type="text" name="cidade" placeholder="cidade" required="">
					<input type="text" name="rua" placeholder="rua" required="">
					<input type="text" name="bairro" placeholder="bairro" required="">
					<input type="text" name="numero_casa"  placeholder="numero da casa" required="">
					<input type="text" name="telefone" class="telefone" placeholder="telefone">
					<input type="email" name="email" placeholder="email" required="">
					<input type="text" name="login" placeholder="nick" required="">
					<input type="password" name="senha" placeholder="senha" required="">
				</div>
				<div class="modal-footer">
					<input type="submit" name="cadastrar" value="cadastrar" class="btn teal">
				</div>
			</form>
		</div>
		<div class="modal" id="modal_editar">
			<form method="post">
				<div class="modal-content">
					<h6>digite os novos valores a serem inseridos</h6>
					<input type="hidden" name="cod" id="cod">
					<input type="text" class="data" id="data_nasc" name="data_nasc" placeholder="data de nascimento">
					<input type="text" id="nome" name="nome" placeholder="nome">
					<input type="text" name="login" id="login" placeholder="login">		
					<input type="text" id="estado" name="estado" placeholder="estado">
					<input type="text" id="cidade" name="cidade" placeholder="cidade">
					<input type="text" id="rua" name="rua" placeholder="rua">
					<input type="text" id="bairro" name="bairro" placeholder="bairro">
					<input type="text" id="numero_casa" name="numero_casa" placeholder="numero da casa">
					<input type="text" class="telefone" id="telefone" name="telefone" placeholder="telefone">
				</div>
				<div class="modal-footer">
					<input type="submit" name="salvar" value="salvar" class="btn teal">
				</div>
		</div>
		<div class="modal" id="modal_cadastrado">
			<div class="modal-content">
				Cliente cadastrado cadastrado com sucesso 
			</div>
			<div class="modal-footer">
				<a href="../view/listarClientes.php" class="btn modal-close">ok</a>
			</div>
		</div>
		<div class="modal" id="modal_editado">
			<div class="modal-content">
				Cliente editado com sucesso 
			</div>
			<div class="modal-footer">
				<a href="../view/listarClientes.php" class="btn modal-close">ok</a>
			</div>
		</div>
		<div class="modal" id="modal_apagado">
			<div class="modal-content">
				Cliente apagado com sucesso 
			</div>
			<div class="modal-footer">
				<a href="../view/listarClientes.php" class="btn modal-close">ok</a>
			</div>
		</div>
		<div class="modal" id="modal_apagado_error">
			<div class="modal-content">
				O cliente ja possui um animal e não pode ser apagado, apague todos os animais do cliente para poder apaga-lo
			</div>
			<div class="modal-footer">
				<a href="../view/listarClientes.php" class="btn modal-close">ok</a>
			</div>
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
	</body>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  	<script src="../js/materialize.js"></script>
  	<script src="../js/init.js"></script>
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  	<script type="text/javascript">
    $(document).ready(function(){
        $('.modal').modal();
            <?php
        	if(!empty($cadastrado)){
        		?>
   			$('#modal_cadastrado').modal('open');
        <?php
            }
        ?>    
        <?php
        	if(!empty($editado)){
        		?>
   			$('#modal_editado').modal('open');
        <?php
            }
        ?>
       <?php
        	if(!empty($apagado) && $apagado =='certo'){
        		?>
   			$('#modal_apagado').modal('open');
        <?php
            }
        ?>
        <?php
        	if(!empty($apagado) && $apagado =='errado'){
        		?>
   			$('#modal_apagado_error').modal('open');
        <?php
            }
        ?>
        $('.data').mask('00/00/0000',{reverse:false});
        $('.telefone').mask('(00)00000-0000',{reverse:false});
    })
  </script>
	<script type="text/javascript">
		function editar($cod,$data_nasc,$nome,$login,$estado,$cidade,$bairro,$rua,$numero_casa,$telefone){
			$('#cod').val($cod);
			$('#data_nasc').val($data_nasc);
			$('#nome').val($nome);
			$('#login').val($login);
			$('#estado').val($estado);
			$('#cidade').val($cidade);
			$('#bairro').val($bairro);
			$('#rua').val($rua);
			$('#numero_casa').val($numero_casa);
			$('#telefone').val($telefone);
			$('#modal_editar').modal('open')
		}
		function mandar_apagar($cod){
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