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
			<h1>Relatório Reunião</h1>
			<form action="../Controller/PresencaController.php" method="post">
				<input type="hidden" name="metodo" value="relatorioPresencaReuniao">
				<label>Data Inicial</label>
				<?php $data_inicial = isset($_GET['data_inicial']) ? $_GET['data_inicial'] : ""?>
				<input name="data_inicial" class="form-control" type="date" value="<?= $data_inicial ?>" required>
				<br>
				<label>Data Final</label>
				<?php $data_final = isset($_GET['data_final']) ? $_GET['data_final'] : ""?>
				<input name="data_final" class="form-control" type="date" value="<?= $data_final ?>" required>
				<br>
				<button type="submit" class="btn btn-md btn-warning">Gerar</button>
			</form>
            <?php if(isset($_GET['data_inicial'])){ ?>
				<?php
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/TutoreController.php");
					$TutoreController = new TutoreController();
					$tutores = $TutoreController->getTutores();
				?>
				<table style="width:70%; text-align: center;">
					<tr>
						<td><b>Nome</b></td>
						<td><b>Presença</b></td>
						<td><b>Ausencia</b></td>
						<td><b>Justificada</b></td>
					</tr>
					<?php
					foreach($tutores as $tutore){
						require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/PresencaController.php");
						$PresencaController = new PresencaController();
						$presencas = $PresencaController->getPresencaPeriodo(
							0,
							0,
							0,
                            $tutore['id'],
							$_GET['data_inicial'],
							$_GET['data_final']
						);
						$ausencias = $PresencaController->getAusenciaPeriodo(
							0,
							0,
							0,
                            $tutore['id'],
							$_GET['data_inicial'],
							$_GET['data_final']
						);
						$justificadas = $PresencaController->getJustificadoPeriodo(
							0,
							0,
							0,
                            $tutore['id'],
							$_GET['data_inicial'],
							$_GET['data_final']
						);

						$presencas = count($presencas);
						$ausencias = count($ausencias);
						$justificadas = count($justificadas);
						
						$color = $ausencias < 4 ? "green" : "red";
						?>		
						<tr style= "color: <?= $color?>">
							<td><?= $tutore['nome']?></td>
							<td><?= $presencas?></td>
							<td><?= $ausencias?></td>
							<td><?= $justificadas?></td>
						</tr>
					<?php } ?>
           		</table>
				<br>
			<?php } ?>
		</center>
	</div>
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>