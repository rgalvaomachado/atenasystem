<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AtenaSystem</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	<link rel="icon" href="../img/hubis-icon.png">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<center>
					<div class="panel-heading">Login</div>
					<div class="panel-body">
						<form action="../Controller/LoginController.php" method="post">
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
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
