<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AtenaSystem</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body style="background-color:white">
	<?php include_once '../topMenu.php'?>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<?php include_once '../navMenu.php'?>
	</div><!--/.sidebar-->
	<form action="../Controller/MonitoreController.php" method="post">
		<input type="hidden" name="metodo" value="criar">
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
			<center>
				<h1>Cadastro de Monitore</h1>
				<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == true ? "Salvo !" : "") ?></h4>
				<div class="row" style="width:700px">
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
					<button type="submit" class="btn btn-md btn-warning">Cadastrar</button>
				</div><!--/.row-->
			</center>
		</div>	<!--/.main-->
	</fom>
	
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>		
</body>
</html>