<!DOCTYPE html>
<html>
<?php include_once '../head.php'?>
<body style="background-color:white">
	<?php include_once '../topMenu.php'?>
	<?php include_once '../menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Cadastro de Representantes</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>	
			<form action="../Controller/Controller.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="metodo" value="criarRepresentante">
				<div class="row">
					<div class="form-group">
						<label>Nome</label>
						<input name="nome" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Usuario</label>
						<input name="usuario" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Senha</label>
						<input name="senha" type="password" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Assinatura</label>
						<input name="assinatura" type="file" class="form-control">
					</div>
					<button type="submit" class="btn btn-md btn-warning">Cadastrar</button>
				</div>
			</fom>	
		</center>
	<div>
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>