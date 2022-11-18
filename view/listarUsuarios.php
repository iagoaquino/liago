<?php
	session_start();
	$existe = isset($_GET['existe'])?$_GET['existe']:"";
	$cadastrado = isset($_GET['cadastrado'])?$_GET['cadastrado']:"";
	$apagado = isset($_GET['apagado'])?$_GET['apagado']:"";
	$editado = isset($_GET['editado'])?$_GET['editado']:"";
	include_once('usuarioFuncoes.php');
	if (isset($_SESSION['cod_administrador'])) {
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Pet-shop</title>


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/especificacoes.css" type="text/css" rel="stylesheet"/>
	<title>lista de usuarios</title>
</head>
<body>
<nav class="white"  role="navigation">
	<ul class="hide-on-med-and-down">
       	
    </ul>
    <div class="nav-wrapper container">	
      	<ul class="right hide-on-med-and-down black-text">
        	<li><a href="listarAnimais.php">Animal</a></li>
        	<li><a href="listarClientes.php">Clientes</a></li>
        	<li><a href="listarProdutos.php">Produtos</a></li>
        	<li><a href="listarServicos.php">Serviços</a></li>
        	<li><a href="listarConfig.php">Config</a></li>
        	<li><a href="index.php">Pagina inicial</a></li>


     	</ul>

      	<ul id="nav-mobile" class="sidenav">
        	<li><a href="listarAnimais.php">Animais</a></li>
        	<li><a href="listarClientes.php">Clientes</a></li>
        	<li><a href="listarProdutos.php">Produtos</a></li>
        	<li><a href="listarServicos.php">Serviços</a></li>
        	<li><a href="listarConfig.php">Config</a></li>
        	<li><a href="index.php">Pagina inicial</a></li>
      	</ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
    </div>
  </nav>
    <div class="section container">
        <form method="post" class="row">
            <input type="text" class="col s9" placeholder="pesquisa" name="pesquisa">
            <button type="submit" class="btn-floating" name="pesquisar"><i class="material-icons">search</i></button>
        </form>
    </div>
	<div class="container">
		<table class="black-text">
			<tr class="grey lighten-3">
				<td class="center">Cod</td>
				<td class="center">Login</td>
				<td class="center">Tipo</td>
				<td class="center">Nome</td>
				<td class="center">Senha</td>
				<td class="center" colspan="2">Ações</td>

			</tr>
			<?php
					foreach ($usuarios as $usuario) {
				?>
			<tr>
				<td class="center"><?=$usuario['cod']?></td>
				<td class="center"><?=$usuario['login']?></td>
				<td class="center"><?=$usuario['tipo']?></td>
				<td class="center"><?=$usuario['nome']?></td>
				<td class="center"><?=$usuario['senha']?></td>
				<td class="right">
					<a class="btn red" onclick="mover_apagar('<?=$usuario['cod']?>')"><i class="material-icons">delete</i></a>
				</td>
				<td class="left"><a href="#" onclick="editar('<?=$usuario['cod']?>','<?=$usuario['login']?>','<?=$usuario['tipo']?>','<?=$usuario['nome']?>','<?=$usuario['senha']?>',)" type="button" name="editar" class="btn" value="editar"><i class="material-icons">create</i></a></td>
			</tr>
				<?php
					}
				?>
		</table>
	</div>
	<div class="container">
		<a href="#modal_cadastrar" class="modal-trigger btn">cadastrar</a>
		<form method="POST" class="right">
			<input type="hidden" name="login" value="admin">
			<input type="hidden" name="senha" value="admin">
			<input type="hidden" name="tipo" value="administrador">
			<input type="hidden" name="nome" value="admin">
			<input type="submit" class="btn blue" name="cadastrar" value="admin padrão">
		</form>
	</div>
	<div class="modal" id="modal_cadastrar">
		<form method="post">
			<div class="modal-content">
				<h6 style="font-weight: bold;text-transform: uppercase;">Digite os dados do novo funcionario</h6>
				<input type="text" name="login" placeholder="login" required="">
				<input type="text" name="nome"placeholder="nome" required="">
				<input type="password" name="senha"placeholder="senha" required="">
				<p>
					<label>
			        	<input name="tipo" value="administrador" type="radio" required="">
			        	<span>Administrador</span>
		      		</label>
		      		<label>
			        	<input name="tipo" required="" value="funcionario" type="radio">
			        	<span>Funcionário</span>
		      		</label>
	      		</p>
			</div>
			<div class="modal-footer">
				<input type="submit" value="cadastrar" class="btn left" name="cadastrar">
			</div>
		</form>
	</div>
	<div class="modal" id="modal_editar">
		<form method="post">
			<div class="modal-content">
				<h6 style="font-weight: bold;text-transform: uppercase;">Digite os valores que será alterados</h6>
				<input type="hidden" name="cod" id ="cod" required="">
				<input type="text" name="login" id="login" placeholder="Login" required="">
				<input type="text" name="nome" id="nome" placeholder="Nome" required="">
				<p>
					<label>
			        	<input required="" name="tipo" value="administrador" id="administrador" type="radio">
			        	<span>Administrador</span>
		      		</label>
		      		<label>
			        	<input name="tipo" id="funcionario" value="funcionario" type="radio">
			        	<span>Funcionário</span>
		      		</label>
	      		</p>
			</div>
			<div class="modal-footer">
				<input type="submit" name="salvar" value="salvar" class="btn green">
			</div>
		</form>
	</div>
	<div class="modal" id="login_existente">
		<div class="modal-content">
			O login ja existe tente outro
		</div>
		<div class="modal-footer">
			<a href="listarUsuarios.php" class="modal-close btn red">ok</a>
		</div>
	</div>
	<div class="modal" id="cadastrado_sucesso">
		<div class="modal-content">
			Usuario foi cadastrado com sucesso
		</div>
		<div class="modal-footer">
			<a href="listarUsuarios.php" class="btn green modal-close">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_apagado">
		<div class="modal-content">
			Usuario apagado com sucesso
		</div>
		<div class="modal-footer">
			<a href="../view/listarUsuarios.php" class="btn modal-close">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_apagado_error">
		<div class="modal-content">
			Não foi possivel apagar o usuario estamos tentando corrigir esse error
		</div>
		<div class="modal-footer">
			<a href="../view/listarUsuarios.php" class="btn modal-close">ok</a>
		</div>
	</div>
	<div class="modal" id="modal_editado">
		<div class="modal-content">
			Usuario editado com sucesso!
		</div>
		<div class="modal-footer">
			<a href="../view/listarUsuarios.php" class="btn modal-close">ok</a>
		</div>
	</div>
	<div class="modal" id="confirmar_apagar">
		<form method="post">
			<div class="modal-content">
				<h6>Deseja realmente completar essa ação?</h6>
				<input type="hidden" id="cod_apagar" name="cod_apagar">
			</div>
			<div class="modal-footer">
				<input type="submit" name="apagar" value="apagar" class="btn red">
				<a class="modal-close btn">cancelar</a>
			</div>
		</form>
	</div>
</body>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  	<script src="../js/materialize.js"></script>
  	<script src="../js/init.js"></script>
  	<script type="text/javascript">
    $(document).ready(function(){
        $('.modal').modal();
        <?php
			if (!empty($existe) && $existe =='certo') {
		?>
			$('#login_existente').modal('open');
		<?php 
		}
		?>
		<?php
			if (!empty($cadastrado) && $cadastrado  ==	'certo') {
		?>
			$('#cadastrado_sucesso').modal('open');
		<?php
		} 
	 	?>
	 	<?php
			if (!empty($editado) && $editado == 'certo') {
		?>
			$('#modal_editado').modal('open');
		<?php
		} 
	 	?>
	 	<?php
	 		if (!empty($apagado) && $apagado == 'certo'){
	 	?>
	 		$('#modal_apagado').modal('open');
	 	<?php
	 		}
	 	?>
	 		 	<?php
	 		if (!empty($apagado) && $apagado == 'errado'){
	 	?>
	 		$('#modal_apagado_error').modal('open');
	 	<?php
	 		}
	 	?>
    })
  </script>
	<script type="text/javascript">
		function editar($cod,$login,$tipo,$nome){
			$('#login').val($login);
			if ($tipo == 'administrador'){
				$('#administrador').attr('checked',true);

			}else if ($tipo =='funcionario'){
				$('#funcionario').attr('checked',true);
			}
			$('#nome').val($nome);
			$('#cod').val($cod);
			$('#modal_editar').modal('open');

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