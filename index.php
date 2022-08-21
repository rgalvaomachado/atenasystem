<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body>
	<center>
		<div class="panel-login">
			<h3>Login</h3>
			<input type="hidden" id="metodo" name="metodo" value="login">
			<div class="form-group">
				<input class="form-control" placeholder="Usuario" id="usuario" name="usuario" type="text" autofocus="">
			</div>
			<div class="form-group">
				<input class="form-control" placeholder="Senha" id="senha" name="senha" type="password" value="">
			</div>
			<div class="form-group">
				<button type="button" class="btn btn-md btn-warning" onclick="login()">Entrar</button>
			</div>
			<?php if (isset($_GET['error'])) {?>
				<h5>Login ou senha incorreto</h5>
			<?php } ?>
		</div>
	</center>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/md5.js"></script>
	<script src="js/login.js"></script>
</body>
</html>
