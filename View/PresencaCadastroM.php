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
			<h1>Presença Monitore</h1>
			<form action="Controller/Controller.php" method="post">
				<input type="hidden" name="metodo" value="criarPresencaMonitore">	
				<div class="row" >
					<?php
						include_once("../Controller/SalaController.php");
						$SalaController = new SalaController();
						$salas = $SalaController->getSalas();
					?>
					<label>Salas</label>
					<?php $id = (isset($_GET['sala']) ? $_GET['sala'] : 1) ?>
					<select name="sala" class="form-control">
						<?php foreach($salas as $sala){ ?>
							<option value="<?= $sala['id'] ?>" <?= $sala['id'] == $id ? "selected" : ""?> > <?= $sala['nome'] ?></option>
						<?php } ?>
					</select>
					<br>
					<label>Data</label>
					<input name="data" class="form-control" type="date" required>
					<br>
					<div class="form-group">
					<label>Monitores</label>
					<?php
						include_once("../Controller/MonitoreController.php");
						$MonitoreController = new MonitoreController();
						$monitores = $MonitoreController->getMonitores();
					?>
					<?php $idMonitore = (isset($_GET['monitore']) ? $_GET['monitore'] : 1) ?>
					<select name="monitore" class="form-control">
						<?php foreach($monitores as $monitore){ ?>
							<option value="<?= $monitore['id'] ?>" <?= $monitore['id'] == $idMonitore ? "selected" : ""?> > <?= $monitore['nome'] ?></option>
						<?php } ?>
					</select>
					<br>
					<button type="submit" class="btn btn-md btn-warning">OK</button>
					<br>
					<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
					<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'false' ? "Presença já registrada !" : "") ?></h4>
					<br>
				</div>
			</form>
		</center>
	</div>
	<script src="Public\js\jquery-1.11.1.min.js"></script>
	<script src="Public\js\bootstrap.min.js"></script>
	<script src="Public\js\login.js"></script></script>
</body>
</html>