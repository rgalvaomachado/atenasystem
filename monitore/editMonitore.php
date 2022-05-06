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
			<h1>Editar Monitore</h1>
			<h4><?= (isset($_GET['sucess']) && $_GET['sucess'] == true ? "Salvo !" : "") ?></h4>
			<form action="../Controller/MonitoreController.php" method="post">
				<input type="hidden" name="metodo" value="buscar">
				<?php
					require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/MonitoreController.php");
					$MonitoreController = new MonitoreController();
					$monitores = $MonitoreController->getMonitores();
				?>
				<div class="form-group">
					<label>Monitores</label>
					<?php $idMonitore = (isset($_GET['monitore']) ? $_GET['monitore'] : 1) ?>
					<select name="monitore" class="form-control">
						<?php foreach($monitores as $monitore){ ?>
							<option value="<?= $monitore['id'] ?>" <?= $monitore['id'] == $idMonitore ? "selected" : ""?> > <?= $monitore['nome'] ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-md btn-warning">Buscar</button>
			</form>
			<form action="../Controller/MonitoreController.php" method="post">
				<input type="hidden" name="metodo" value="salvar">
				<?php
					if(isset($_GET['monitore'])){
						require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/MonitoreController.php");
						$getMonitore = new MonitoreController();
						$monitore = $getMonitore->getMonitore($_GET['monitore']);
					?>
					<input type="hidden" name="id" value="<?= $_GET['monitore'] ?>">
					<div class="row" style="width:700px">
						<div class="form-group">
							<label>Nome</label>
							<input class="form-control" name="nome" value="<?= $monitore['nome']?>" required>
						</div>
						<div class="form-group">
							<label>Usuario</label>
							<input class="form-control" name="usuario" value=<?= $monitore['usuario']?> required>
						</div>
						<div class="form-group">
							<label>Senha</label>
							<input type="password" class="form-control" name="senha" required>
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