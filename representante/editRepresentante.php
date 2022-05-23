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
			<h1>Editar Representantes</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == 'true' ? "Salvo !" : "") ?></h4>
			<h4><?= (isset($_GET['delete']) && $_GET['delete'] == true ? "Excluido !" : "") ?></h4>
			<form action="../Controller/RepresentanteController.php" method="post">
				<input type="hidden" name="metodo" value="buscar">
				<?php
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/RepresentanteController.php");
					$RepresentanteController = new RepresentanteController();
					$representantes = $RepresentanteController->getRepresentantes();
				?>
				<div class="form-group">
					<label>Representantes</label>
					<?php $idRepresentante = (isset($_GET['representante']) ? $_GET['representante'] : 1) ?>
					<select name="representante" class="form-control">
						<?php foreach($representantes as $representante){ ?>
							<option value="<?= $representante['id'] ?>" <?= $representante['id'] == $idRepresentante ? "selected" : ""?> > <?= $representante['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<?php
				if(isset($_GET['representante'])){
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/RepresentanteController.php");
					$getRepresentante = new RepresentanteController();
					$representante = $getRepresentante->getRepresentante($_GET['representante']);
				?>
				<form action="../Controller/RepresentanteController.php" method="post" style="padding-bottom: 1%;">
					<input type="hidden" name="metodo" value="salvar">
					<input type="hidden" name="id" value="<?= $_GET['representante'] ?>">
					<div class="row" >
						<div class="form-group">
							<label>Nome</label>
							<input class="form-control" name="nome" value="<?= $representante['nome']?>" required>
						</div>
						<div class="form-group">
							<label>Usuario</label>
							<input class="form-control" name="usuario" value=<?= $representante['usuario']?> required>
						</div>
						<div class="form-group">
							<label>Senha</label>
							<input type="password" class="form-control" name="senha" required>
						</div>
						<button type="submit" class="btn btn-md btn-warning">Editar</button>
					</div>
				</form>
				<form action="../Controller/RepresentanteController.php" method="post" onSubmit="if(!confirm('Tem certeza que deseja excluir?')){return false;}">
					<input type="hidden" name="metodo" value="excluir">
					<input type="hidden" name="id" value="<?= $_GET['representante'] ?>">
					<button type="submit" class="btn btn-md btn-danger">Excluir</button>
				</form>
			<?php } ?>
		</center>
	</div>
	
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>		
</body>
</html>