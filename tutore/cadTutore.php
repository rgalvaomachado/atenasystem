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
			<h1>Cadastro de Tutore</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
		<form action="../Controller/Controller.php" method="post">	
			<input type="hidden" name="metodo" value="criarTutore">
				<div class="row" >
					<div class="form-group">
						<label>Nome</label>
						<input name="nome" class="form-control" required>
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
								<option value="<?= $disciplina['id'] ?>"><?= $disciplina['nome'] ?></option>
							<?php } ?>
						</select>
					</div>
					<button type="submit" class="btn btn-md btn-warning">Cadastrar</button>
				</div>
			</form>
		</center>
	</div>
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>