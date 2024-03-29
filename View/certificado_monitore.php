<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AtenaSystem</title>
	<link href="public/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/css/font-awesome.min.css" rel="stylesheet">
	<link href="public/css/datepicker3.css" rel="stylesheet">
	<link href="public/css/styles.css" rel="stylesheet">
    <link href="public/css/certificado_monitore.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="icon" href="	public/img/hubis-icon.png">
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
                <a class="navbar-brand" href="home.php"><span style="color:orange">Atena</span>System</a>
                <a href="http://hubis.com.br/" target="_blank">
                    <img src="public/img/hubis.png" id="logo-hubis">
                </a>
            </div>
        </div>
    </nav>
	<?php include_once 'menu.php'?>
	<center>
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
			<div class="form">	
				<h1>Certificado Monitore</h1>
				<label class="message_alert" id="messageAlert"></label>
				<div class="form-group">
					<label>Monitore</label>
					<select class="form-control" id="monitore" name="monitore" onchange="buscarMonitore()">
						<option>Selecione o monitore</option>
					</select>
				</div>
				<div class="form-group">
					<label>Data Inicial</label>
					<input id="dataInicial" name="dataInicial" type="date" class="form-control">
				</div>
				<div class="form-group">
					<label>Data Final</label>
					<input id="dataFinal" name="dataFinal" type="date" class="form-control">
				</div>
				<div class="form-group">
					<label>Coordenador Docente do Projeto</label>
					<select class="form-control" id="docente" name="docente" onchange="buscarDocente()">
						<option>Selecione o docente</option>
					</select>
				</div>
				<div class="form-group">
					<label>Coordenador Discente do Projeto</label>
					<select class="form-control" id="discente" name="discente"  onchange="buscarDiscente()">
						<option>Selecione o discente</option>
					</select>
				</div>
				<input class="btn btn-md btn-warning" type="button" onclick="gerarCertificadoMonitore()" value="Gerar">
			</div>
			<br>
			<br>
			<div id="detalhes">
				<div class="form-group">
					<div id="frente">
						<div id="conteudo">
							<h1 id="titulo" class="tituloCertificado">
								CERTIFICADO
							</h1>
							<div id="corpo">
								Certificamos que <b class="nomeMonitore"></b> participou do Subprograma de Extensão Universitária Cursinho Pré Universitário Atena do Instituto de Biociencias da UNESP de Botucatu na condição de <b class="nomeMateria">Monitor(a)</b> no periodo de <label class="mesInicial"></label> a <label class="mesFinal"></label> de <label class="anoFinal"></label>.
							</div>
							<table id="assinaturas">
								<tr>
									<td class="assinaturas docente">
										<div id="assinaturaDocente"></div>
										<label class="assinaturas" id="nomeDocente"></label>
										<br>
										<label class="assinaturas">Coordenador Docente do Projeto</label>
									</td>
									<td class="assinaturas discente">
										<div id="assinaturaDiscente"></div>
										<label class="assinaturas" id="nomeDiscente"></label>
										<br>
										<label class="assinaturas">Coordenador Discente do Projeto</label>
									</td>
							</table>
							<div>
								<img id="ibbFrente" src="public/img/ibb.png" />
								<img id="unespFrente" src="public/img/unesp.png" />
							</div>
						</div>
					</div>
					<br>
					<!-- <input class="btn btn-md btn-warning" type="button" onclick="downloadFrenteTutore()" value="Download Frente"> -->
				</div>
				<div class="form-group">
					<div id="verso">
						<div id="conteudo">
							<table id="carga-horaria">
								<tr>
								<th colspan="2" id="AtividadesDesenvolvidas">Atividades Desenvolvidas</th>
								</tr>
								<tr>
									<td><div class="horas"></div>Monitorias</td>
									<td><div class="presencaMonitorias horas"></div></td>
								</tr>
							</table>
							<div>
								<img id="ibbVerso" src="public/img/ibb.png" />
								<img id="assinatura-cursinho" src="public/img/assinatura-cursinho.png" />
								<img id="unespVerso" src="public/img/unesp.png" />
							</div>
						</div>
					</div>
					<br>
					<input class="btn btn-md btn-warning" type="button" onclick="downloadVersoMonitore();downloadFrenteMonitore();" value="Download">
				</div>
			</div>
            <script src="public\js\certificado.js"></script>
            <script src="public\js\jquery-1.11.1.min.js"></script>
            <script src="public\js\bootstrap.min.js"></script>
            <script src="public\js\html2canvas.js"></script>
            <script src="public\js\login.js"></script></script>
			<script>
				buscarMonitores();
				buscarRepresentantes();
			</script>
		</div>
	</center>
</body>
</html>