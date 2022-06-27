<!DOCTYPE html>
<html>
<?php include_once '../head.php'?>
<body style="background-color:white">
	<?php include_once '../topMenu.php'?>
	<?php include_once '../menu.php'?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Certiticado Tutore</h1>
			<form action="../Controller/Controller.php" method="post">
				<input type="hidden" name="metodo" value="certificadoTutore">
				<?php
					include_once("../Controller/TutoreController.php");
					$TutoreController = new TutoreController();
					$tutores = $TutoreController->getTutores();
				?>
				<div class="form-group">
					<label>Tutores</label>
					<?php $cod_tutore = (isset($_GET['cod_tutore']) ? $_GET['cod_tutore'] : 1) ?>
					<select name="cod_tutore" class="form-control">
						<?php foreach($tutores as $tutore){ ?>
							<option value="<?= $tutore['id'] ?>" <?= $tutore['id'] == $cod_tutore ? "selected" : ""?> > <?= $tutore['nome'] ?></option>
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
				<?php
					include_once("../Controller/RepresentanteController.php");
					$RepresentanteController = new RepresentanteController();
					$representantes = $RepresentanteController->getRepresentantes();
				?>
				<div class="form-group">
					<label>Coordenador Docente do Projeto</label>
					<?php $cod_docente = (isset($_GET['cod_docente']) ? $_GET['cod_docente'] : 1) ?>
					<select name="cod_docente" class="form-control">
						<?php foreach($representantes as $representante){ ?>
							<option value="<?= $representante['id'] ?>" <?= $representante['id'] == $cod_docente ? "selected" : ""?> > <?= $representante['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Coordenador Discente do Projeto</label>
					<?php $cod_discente = (isset($_GET['cod_discente']) ? $_GET['cod_discente'] : 1) ?>
					<select name="cod_discente" class="form-control">
						<?php foreach($representantes as $representante){ ?>
							<option value="<?= $representante['id'] ?>" <?= $representante['id'] == $cod_discente ? "selected" : ""?> > <?= $representante['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Gerar</button>
			</form>
		</center>
	</div>
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>