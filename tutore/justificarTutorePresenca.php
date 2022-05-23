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
			<h1>Justificar Presença Tutore</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<form action="../Controller/Controller.php" method="post">
				<div class="form-group">
					<input type="hidden" name="metodo" value="buscarPresencaTutore">
					<input type="hidden" name="sala" value="<?= $idSala ?>">
					<?php
						require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/TutoreController.php");
						$TutoreController = new TutoreController();
						$tutores = $TutoreController->getTutores();
					?>
					<div class="form-group">
						</br>
						<label>Tutores</label>
						<?php $id = (isset($_GET['tutore']) ? $_GET['tutore'] : 1) ?>
						<select name="tutore" class="form-control">
							<?php foreach($tutores as $tutore){ ?>
								<option value="<?= $tutore['id'] ?>" <?= $tutore['id'] == $id ? "selected" : ""?> > <?= $tutore['nome'] ?></option>
							<?php } ?>
						</select>
					</div>
					<label>Data</label>
					<?php $data = isset($_GET['data']) ? $_GET['data'] : ""?>
					<input name="data" class="form-control" type="date" value="<?= $data ?>" required>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<?php if(isset($_GET['tutore'])) { ?>
				<form action="../Controller/Controller.php" method="post">
					<input type="hidden" name="metodo" value="justificarPresencaTutore">
					<input type="hidden" name="tutore" value="<?= $_GET['tutore'] ?>">
					<input type="hidden" name="data" value="<?= $_GET['data'] ?>">
					<input type="hidden" name="presente" value="<?= $_GET['presente'] ?>">
					<?php if($_GET['presente'] != "") { ?>
						<div class="row" >
							<div class="form-group">
								<br>
								<select name="presente" class="form-control">
									<option <?= $_GET['presente'] == "J" ? "selected" : ""?> value="J">Falta Justificada</option>
									<option <?= $_GET['presente'] == "N" ? "selected" : ""?> value="N">Falta</option>
									<option <?= $_GET['presente'] == "S" ? "selected" : ""?> value="S">Presença</option>
								</select>
							</div>
							<button type="submit" class="btn btn-md btn-warning">Justificar</button>
						</div>
					<?php } else { 
						echo "<br>";
						echo "Presença não encontrada";
					}?>
				</form>
			<?php } ?>
		</center>
	</div>
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>