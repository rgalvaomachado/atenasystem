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
			<h1>Presença Reunião</h1>
				<form action="../Controller/PresencaController.php" method="post">
					<input type="hidden" name="metodo" value="criarPresencaReuniao">	
					<div class="row" style="width:700px">
						<div class="form-group">
							<label>Data</label>
							<input name="data" class="form-control" type="date" required>
							</br>
							<?php
								require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/TutoreController.php");
								$TutoreController = new TutoreController();
								$tutores = $TutoreController->getTutores();
							?>
							<label>Tutores</label>
							<table class="table" style="text-align:center">
							<thead>
								<tr>
									<td scope="col"><strong>Nome</strong></td>
									<td scope="col"><strong>Presente</strong></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($tutores as $tutore){ ?>
									<tr>
										<td><?= $tutore['nome'] ?></td>
										<td><input name="presente[]" type="checkbox" value='<?= $tutore['id'] ?>'></td>
									</tr>
								<?php } ?>
							</tbody>
							</table>
						</div>
						<button type="submit" class="btn btn-md btn-warning">OK</button>
						<br>
						<br>
						<?= isset($_GET['presente']) ? "Presença Registrada" : ""?>
					</div>
				</form>
			</div>
		</center>
		
	</div>	<!--/.main-->
	
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>		
</body>
</html>