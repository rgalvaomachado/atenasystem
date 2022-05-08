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
	<ul class="nav menu">
			<?php session_start()?>
		<?php if($_SESSION['modo'] == "admin") { ?>
			<li class="parent"><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-user-circle-o" aria-hidden="true"></em> Monitore <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a href="\monitore\cadMonitore.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Cadastro
					</a></li>
					<li><a class="" href="\monitore\editMonitore.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Editar
					</a></li>
				</ul>
			</li>
		<?php } ?>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-user-o" aria-hidden="true">&nbsp;</em> Tutore <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="\tutore\cadTutore.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Cadastro
					</a></li>
					<li><a class="" href="\tutore\editTutore.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Editar
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-graduation-cap" aria-hidden="true">&nbsp;</em> Alune <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="\alune\cadAlune.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Cadastro
					</a></li>
					<li><a class="" href="\alune\editAlune.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Editar
					</a></li>
					<li><a class="" href="\alune\justificarAlunePresenca.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Justificar Presença
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
				<em class="fa fa-newspaper-o" aria-hidden="true">&nbsp;</em> Disciplina <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li><a class="" href="\disciplina\cadDisciplina.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Cadastro
					</a></li>
					<li><a class="" href="\disciplina\editDisciplina.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Editar
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-5">
				<em class="fa fa-university" aria-hidden="true">&nbsp;</em> Sala <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-5">
					<li><a class="" href="\sala\cadSala.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Cadastro
					</a></li>
					<li><a class="" href="\sala\editSala.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Editar
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-6">
				<em class="fa fa-calendar">&nbsp;</em> Presença <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse in" id="sub-item-6">
					<li><a class="" href="\presenca\presenAlune.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Aula Alune
					</a></li>
					<li><a style="background-color:orange"href="\presenca\presenTutore.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Aula Tutore
					</a></li>
					<?php if($_SESSION['modo'] == "admin") { ?>
						<li><a href="\presenca\presenMonitore.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Monitoria
						</a></li>
					<?php } ?>
					<li><a href="\presenca\presenReuniao.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Reunião
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-7">
				<em class="fa fa-file-pdf-o">&nbsp;</em> Certificado <span data-toggle="collapse" href="#sub-item-7" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-7">
					<li><a class="" href="\certificado\certTutore.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Tutore
					</a></li>
					<li><a class="" href="\certificado\certMonitore.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Monitore
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-8">
				<em class="fa fa-bar-chart">&nbsp;</em> Relatorio <span data-toggle="collapse" href="#sub-item-8" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-8">
					<li><a class="" href="\relatorio\relAlune.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Presença Alune
					</a></li>
					<li><a class="" href="\relatorio\relReuniao.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Precença Reunião
					</a></li>
				</ul>
			</li>
			<li><a href="../index.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
		<center>
			<h1>Presença Tutore</h1>
			<form action="../Controller/PresencaController.php" method="post">
				<input type="hidden" name="metodo" value="criarPresencaTutore">	
				<div class="form-group">
					<?php
						require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/SalaController.php");
						$SalaController = new SalaController();
						$salas = $SalaController->getSalas();
					?>
					<label>Salas</label>
					<?php $id = (isset($_GET['sala']) ? $_GET['sala'] : 1) ?>
					<select name="sala" class="form-control">
						<?php foreach($salas as $sala){ ?>
							<option value="<?= $sala['id'] ?>" <?= $sala['id'] == $id ? "selected" : ""?> > <?= $sala['nome'] ?></option>
						<?php } ?>
					</select>
					<br>
					<label>Data</label>
					<input name="data" class="form-control" type="date" required>
					<br>
					<label>Aula</label>
					<select name="aula" class="form-control">
						<option value="1">Primeira Aula</option>
						<option value="2">Segunda Aula</option>
					</select>
					<br>
					<label>Tutore</label>
					<?php
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/TutoreController.php");
					$TutoreController = new TutoreController();
					$tutores = $TutoreController->getTutores();
					?>
					<?php $id = (isset($_GET['tutore']) ? $_GET['tutore'] : 1) ?>
					<select name="tutore" class="form-control">
						<?php foreach($tutores as $tutore){ ?>
							<option value="<?= $tutore['id'] ?>" <?= $tutore['id'] == $id ? "selected" : ""?> > <?= $tutore['nome'] ?></option>
						<?php } ?>
					</select>
					<br>
					<button type="submit" class="btn btn-md btn-warning">OK</button>
					<br>
					<br>
					<?= isset($_GET['presente']) ? "Presença Registrada" : ""?>
				</div>
			</form>
		</center>
		
	</div>	<!--/.main-->
	
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>		
</body>
</html>