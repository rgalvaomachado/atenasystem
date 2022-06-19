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
			<h1>Certiticado Tutore</h1>
			<form action="../Controller/Controller.php" method="post">
				<input type="hidden" name="metodo" value="certificadoTutore">
				<?php
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/TutoreController.php");
					$TutoreController = new TutoreController();
					$salas = $TutoreController->getTutores();
				?>
				<div class="form-group">
					<label>Tutores</label>
					<?php $id = (isset($_GET['cod_sala']) ? $_GET['cod_sala'] : 1) ?>
					<select name="cod_sala" class="form-control">
						<?php foreach($salas as $sala){ ?>
							<option value="<?= $sala['id'] ?>" <?= $sala['id'] == $id ? "selected" : ""?> > <?= $sala['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
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
            <?php if(isset($_GET['cod_sala'])){ ?>
				<?php
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/AluneController.php");
					$AluneController = new AluneController();
					$alunes = $AluneController->getAlunesSala($_GET['cod_sala']);
				?>
				<table style="width:70%; text-align: center;">
					<tr>
						<td><b>Nome</b></td>
						<td><b>Presença</b></td>
						<td><b>Ausencia</b></td>
						<td><b>Justificado</b></td>
						<td><b>Frequência</b></td>
					</tr>
					<?php
					foreach($alunes as $alune){
						require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/PresencaController.php");
						$PresencaController = new PresencaController();
						$presencas = $PresencaController->getPresencaPeriodo(
							$_GET['cod_sala'],
							$alune['id'],
							0,
							0,
							$_GET['data_inicial'],
							$_GET['data_final']
						);
						$ausencias = $PresencaController->getAusenciaPeriodo(
							$_GET['cod_sala'],
							$alune['id'],
							0,
							0,
							$_GET['data_inicial'],
							$_GET['data_final']
						);
						$justificado = $PresencaController->getJustificadoPeriodo(
							$_GET['cod_sala'],
							$alune['id'],
							0,
							0,
							$_GET['data_inicial'],
							$_GET['data_final']
						);

						$presencas = count($presencas);
						$justificado = count($justificado);
						$ausencias = count($ausencias);
						$total = $presencas + $justificado + $ausencias ;
						$total = $total > 0 ? $total : 1;
						$porcentagem = ( ($presencas + $justificado) / $total ) * 100;
						
						$color = $porcentagem >= 70 ? "green" : "red";
						?>		
						<tr style= "color: <?= $color?>; border-bottom: 1px solid #555;">
							<td><?= $alune['nome']?></td>
							<td><?= $presencas?></td>
							<td><?= $ausencias?></td>
							<td><?= $justificado?></td>
							<td><?= number_format($porcentagem, 2, '.', ',')?>%</td>
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