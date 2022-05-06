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

</head>
<body style="background-color:white">
	<?php include_once '../topMenu.php'?>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<?php include_once '../navMenu.php'?>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Editar Tutore</h1> 	
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == true ? "Salvo !" : "") ?></h4>
			<form action="../Controller/tutoreController.php" method="post">
				<input type="hidden" name="metodo" value="buscar">
				<?php
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/TutoreController.php");
					$TutoreController = new TutoreController();
					$tutores = $TutoreController->getTutores();
				?>
				<div class="form-group">
					<label>Tutores</label>
					<?php $id = (isset($_GET['tutore']) ? $_GET['tutore'] : 1) ?>
					<select name="tutore" class="form-control">
						<?php foreach($tutores as $tutore){ ?>
							<option value="<?= $tutore['id'] ?>" <?= $tutore['id'] == $id ? "selected" : ""?> > <?= $tutore['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<form action="../Controller/TutoreController.php" method="post">
				<input type="hidden" name="metodo" value="salvar">
				<?php
					if(isset($_GET['tutore'])){
						require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/TutoreController.php");
						$getTutore = new TutoreController();
						$tutore = $getTutore->getTutore($_GET['tutore']);
				?>
					<input type="hidden" name="id" value="<?= $_GET['tutore'] ?>">
					<div class="row" style="width:700px">
						<div class="form-group">
							<label>Nome</label>
							<input name="nome" value="<?= $tutore['nome'] ?>" class="form-control">
						</div>
						<?php
							require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/DisciplinaController.php");
							$DisciplinaController = new DisciplinaController();
							$disciplinas = $DisciplinaController->getDisciplinas();
						?>
						<div class="form-group">
							<label>Disciplina</label>
							<select name="disciplina" class="form-control">
								<?php foreach($disciplinas as $disciplina){ ?>
									<option value="<?= $disciplina['id'] ?>" <?= $tutore['disciplina'] == $disciplina['id'] ? "selected" : "" ?> > <?= $disciplina['nome'] ?></option>
								<?php } ?>
							</select>
						</div>
						<button type="submit" class="btn btn-md btn-warning">Editar</button>
					</div>
				<?php } ?>
			</form>
		</center>
		
	</div>	<!--/.main-->
	
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>		
</body>
</html>