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
			<h1>Presença Alune</h1>
			<form action="../Controller/PresencaController.php" method="post">
				<input type="hidden" name="metodo" value="buscar">	

				<?php
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/SalaController.php");
					$SalaController = new SalaController();
					$salas = $SalaController->getSalas();
				?>
				<div class="form-group">
					<label>Salas</label>
					<?php $id = (isset($_GET['sala']) ? $_GET['sala'] : 1) ?>
					<select name="sala" class="form-control">
						<?php foreach($salas as $sala){ ?>
							<option value="<?= $sala['id'] ?>" <?= $sala['id'] == $id ? "selected" : ""?> > <?= $sala['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<?php if(isset($_GET['sala'])){ ?>
				<form action="../Controller/PresencaController.php" method="post">
					<input type="hidden" name="metodo" value="criarPresencaAlune">	
					<input type="hidden" name="sala" value="<?= $_GET['sala'] ?>">	
					<div class="row" >
						<div class="form-group">
							<label>Data</label>
							<input name="data" class="form-control" type="date" required>
							<label>Aula</label>
							<select name="aula" class="form-control">
								<option value="1">Primeira Aula</option>
								<option value="2">Segunda Aula</option>
							</select>
							</br>
							<?php
								require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/AluneController.php");
								$AluneController = new AluneController();
								$alunes = $AluneController->getAlunesSala($_GET['sala']);
							?>
							<label>Alunes</label>
							<table class="table" style="text-align:center">
							<thead>
								<tr>
									<td scope="col"><strong>Nome</strong></td>
									<td scope="col"><strong>Presente</strong></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($alunes as $alune){ ?>
									<tr>
										<td><?= $alune['nome'] ?></td>
										<td><input name="presente[]" type="checkbox" value='<?= $alune['id'] ?>'></td>
									</tr>
								<?php } ?>
							</tbody>
							</table>
						</div>
						<button type="submit" class="btn btn-md btn-warning">OK</button>
					</div>
				</form>
			<?php } ?>
		</center>
		
	</div>	<!--/.main-->
	
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>		
</body>
</html>