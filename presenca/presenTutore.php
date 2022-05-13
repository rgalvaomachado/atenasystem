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
	<link rel="icon" href="../img/hubis-icon.png">
</head>
<body style="background-color:white">
	<?php include_once '../topMenu.php'?>
	<?php include_once '../menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Presença Tutore</h1>
			<form action="../Controller/PresencaController.php" method="post">
				<input type="hidden" name="metodo" value="criarPresencaTutore">	
				<div class="form-group">
					<?php
						require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/SalaController.php");
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
					<label>Aula</label>
					<select name="aula" class="form-control">
						<option value="1">Primeira Aula</option>
						<option value="2">Segunda Aula</option>
					</select>
					<br>
					<label>Tutore</label>
					<?php
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/TutoreController.php");
					$TutoreController = new TutoreController();
					$tutores = $TutoreController->getTutores();
					?>
					<?php $id = (isset($_GET['tutore']) ? $_GET['tutore'] : 1) ?>
					<select name="tutore" class="form-control">
						<?php foreach($tutores as $tutore){ ?>
							<option value="<?= $tutore['id'] ?>" <?= $tutore['id'] == $id ? "selected" : ""?> > <?= $tutore['nome'] ?></option>
						<?php } ?>
					</select>
					<br>
					<button type="submit" class="btn btn-md btn-warning">OK</button>
					<br>
					<br>
					<?= isset($_GET['presente']) ? "Presença Registrada" : ""?>
				</div>
			</form>
		</center>
		
	</div>	<!--/.main-->
	
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>		
</body>
</html>