<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body>
	<center>
		<div class="panel-heading">Login</div>
			<form action="../Controller/Controller.php" method="post">
				<input type="hidden" name="metodo" value="login">
				<fieldset>
					<div class="form-group">
						<input class="form-control" placeholder="Usuario" name="usuario" type="text" autofocus="">
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="Senha" name="senha" type="password" value="">
					</div>
					<button type="submit" class="btn btn-md btn-warning">Entrar</button>
					<br>
					<?php if (isset($_GET['error'])) {?>
						<h5>Login ou senha incorreto</h5>
					<?php } ?>
			</form>
		</div>
	</center>
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
