<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AtenaSystem</title>
	<link href="Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="Public/css/font-awesome.min.css" rel="stylesheet">
	<link href="Public/css/datepicker3.css" rel="stylesheet">
	<link href="Public/css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="icon" href="	Public/img/hubis-icon.png">
</head>
<body style="background-color:white">
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php"><span style="color:orange">Atena</span>System</a>
            <a href="http://hubis.com.br/" target="_blank">
                <img src="Public/img/hubis.png" id="logo-hubis">
            </a>
        </div>
    </div>
</nav>
	<?php include_once 'menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Cadastro de Representantes</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>	
			<form action="Controller/Controller.php" method="post" enctype="multipart/form-data">
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
	<script src="Public\js\jquery-1.11.1.min.js"></script>
	<script src="Public\js\bootstrap.min.js"></script>
</body>
</html>