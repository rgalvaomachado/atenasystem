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
			<h1>Editar Disciplinas</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<h4><?= (isset($_GET['delete']) && $_GET['delete'] == true ? "Excluido !" : "") ?></h4>
			<form action="../Controller/Controller.php" method="post">
				<input type="hidden" name="metodo" value="buscarDisciplina">
				<?php
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/DisciplinaController.php");
					$DisciplinaController = new DisciplinaController();
					$disciplinas = $DisciplinaController->getDisciplinas();
				?>
				<div class="form-group">
					<label>Disciplinas</label>
					<?php $id = (isset($_GET['disciplina']) ? $_GET['disciplina'] : 1) ?>
					<select name="disciplina" class="form-control">
						<?php foreach($disciplinas as $disciplina){ ?>
							<option value="<?= $disciplina['id'] ?>" <?= $disciplina['id'] == $id ? "selected" : ""?> > <?= $disciplina['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<?php
				if(isset($_GET['disciplina'])){
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/DisciplinaController.php");
					$getDisciplina = new DisciplinaController();
					$disciplina = $getDisciplina->getDisciplina($_GET['disciplina']);
			?>
				<form action="../Controller/Controller.php" method="post" style="padding-bottom: 1%;">
					<input type="hidden" name="metodo" value="salvarDisciplina">
					<input type="hidden" name="id" value="<?= $_GET['disciplina'] ?>">
					<div class="row" >
						<div class="form-group">
							<label>Nome</label>
							<input name="nome" value="<?= $disciplina['nome'] ?>" class="form-control">
						</div>
						<button type="submit" class="btn btn-md btn-warning">Editar</button>
					</div>
				</form>
				<form action="../Controller/Controller.php" method="post" onSubmit="if(!confirm('Tem certeza que deseja excluir?')){return false;}">
					<input type="hidden" name="metodo" value="excluirDisciplina">
					<input type="hidden" name="id" value="<?= $_GET['disciplina'] ?>">
					<button type="submit" class="btn btn-md btn-danger">Excluir</button>
				</form>
			<?php } ?>
		</center>
	</div>
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>