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
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../home.php"><span style="color:orange">Atena</span>System</a>
            <a href="http://hubis.com.br/" target="_blank">
                <img src="/img/hubis.png" id="logo-hubis">
            </a>
        </div>
    </div>
</nav>
	<?php include_once '../menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Justificar Presença Alune</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<form action="../Controller/Controller.php" method="post">
				<input type="hidden" name="metodo" value="buscarSalaAluneJustifica">
				<?php
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/SalaController.php");
					$SalaController = new SalaController();
					$salas = $SalaController->getSalas();
				?>
				<div class="form-group">
					<label>Salas</label>
					<?php $idSala = (isset($_GET['sala']) ? $_GET['sala'] : 1) ?>
					<select name="sala" class="form-control">
						<?php foreach($salas as $sala){ ?>
							<option value="<?= $sala['id'] ?>" <?= $sala['id'] == $idSala ? "selected" : ""?> > <?= $sala['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<?php if(isset($_GET['sala'])) { ?>
				<form action="../Controller/Controller.php" method="post">
					<div class="form-group">
						<input type="hidden" name="metodo" value="buscarPresencaAlune">
						<input type="hidden" name="sala" value="<?= $idSala ?>">
						<?php
							require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/AluneController.php");
							$AluneController = new AluneController();
							$alunes = $AluneController->getAlunesSala($_GET['sala']);
						?>
						<div class="form-group">
							</br>
							<label>Alunes</label>
							<?php $id = (isset($_GET['alune']) ? $_GET['alune'] : 1) ?>
							<select name="alune" class="form-control">
								<?php foreach($alunes as $alune){ ?>
									<option value="<?= $alune['id'] ?>" <?= $alune['id'] == $id ? "selected" : ""?> > <?= $alune['nome'] ?></option>
								<?php } ?>
							</select>
						</div>
						<label>Data</label>
						<?php $data = isset($_GET['data']) ? $_GET['data'] : ""?>
						<input name="data" class="form-control" type="date" value="<?= $data ?>" required>
						<label>Aula</label>
						<?php $aula = isset($_GET['aula']) ? $_GET['aula'] : '1'?>
						<select name="aula" class="form-control">
							<option <?= $aula == "1" ? "selected" : ""?> value="1">Primeira Aula</option>
							<option <?= $aula == "2" ? "selected" : ""?> value="2">Segunda Aula</option>
						</select>

					</div>
					<button type="submit" class="btn btn-md btn-warning">Buscar</button>
				</form>
			<?php } ?>
			<?php if(isset($_GET['alune'])) { ?>
				<form action="../Controller/Controller.php" method="post">
					<input type="hidden" name="metodo" value="justificarPresencaAlune">
					<input type="hidden" name="alune" value="<?= $_GET['alune'] ?>">
					<input type="hidden" name="sala" value="<?= $_GET['sala'] ?>">
					<input type="hidden" name="data" value="<?= $_GET['data'] ?>">
					<input type="hidden" name="aula" value="<?= $_GET['aula'] ?>">
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