<!DOCTYPE html>
<html>
<?php include_once '../head.php'?>
<body style="background-color:white">
	<?php include_once '../topMenu.php'?>
	<?php include_once '../menu.php'?>	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Relatório Reunião</h1>
			<form action="../Controller/Controller.php" method="post">
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
						<tr style= "color: <?= $color?>; border-bottom: 1px solid #555;">
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