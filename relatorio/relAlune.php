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
			<h1>Relatório Alune</h1>
            <div class="form-group">
				<label>Sala</label>
				<select class="form-control">
					<option>Manha</option>
					<option>Noite</option>
				</select>
			</div>
            <button type="button" class="btn btn-md btn-warning">Gerar</button>
            <table style="width:100%">
                <tr>
                    <th>Nome</th>
                    <th>Presença</th>
                    <th>Ausencia</th>
                    <th>Frequência</th>
                </tr>
                <tr style="color:green">
                    <td>Romulo</td>
                    <td>10</td>
                    <td>5</td>
                    <td>50%</td>
                </tr>
                <tr style="color:red">
                    <td>Victoria</td>
                    <td>10</td>
                    <td>9</td>
                    <td>10%</td>
                </tr>
            </table>
		</center>
		
	</div>	<!--/.main-->
	
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>		
</body>
</html>