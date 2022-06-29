<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AtenaSystem</title>
	<link type="text/css" href="../css/certificado_frente.css" rel="stylesheet"/>
	<link rel="icon" href="../img/hubis-icon.png">
</head>
<body>
    <?php
        include_once('../Controller/TutoreController.php');
        include_once('../Controller/RepresentanteController.php');
        include_once('../Controller/DisciplinaController.php');
        include_once('../Controller/UtilsController.php');
        
        $TutoreController = new TutoreController();
        $tutore = $TutoreController->getTutore($_GET['cod_tutore']);

        $RepresentanteController = new RepresentanteController();
        $docente = $RepresentanteController->getRepresentante($_GET['cod_docente']);
        $discente = $RepresentanteController->getRepresentante($_GET['cod_discente']);

        $DisciplinaController = new DisciplinaController();
        $disciplina = $DisciplinaController->getDisciplina($tutore['cod_disciplina']);

        $UtilsController = new UtilsController();
        $data1 = explode('-',$_GET['data_inicial']);
        $data_inicial = $data1[1];
        $mes_inicial = $UtilsController->getMes($data_inicial);

        $data2 = explode('-',$_GET['data_final']);
        $data_final = $data2[1];
        $mes_final = $UtilsController->getMes($data_final);
        $ano_final = $data2[0];
    ?>
    <div id="cert">
        <div id="conteudo">
            <h1 id="titulo">
                CERTIFICADO
            </h1>
            <div id="corpo">
                Certificamos que <b><?= $tutore["nome"]?></b> participou do Subprograma de Extensão Universitária Cursinho Pré Universitário Atena do Instituto de Biociencias da UNESP de Botucatu na condição de <b>Professor(a) de <?= $disciplina['nome'] ?></b> no periodo de <?= $mes_inicial ?> a <?= $mes_final ?> de <?= $ano_final ?>.
            </div>
            <table id="assinaturas">
                <tr>
                    <td>
                        <div id="assinatura-docente"></div>
                    </td>
                    <td>
                        <div id="assinatura-discente"></div>
                    </td>
                </tr>
                <tr>
                    <td>Prof. <?= $docente["nome"]?></td>
                    <td><?= $discente["nome"]?></td>
                </tr>
                <tr>
                    <td>Coordenador Docente do Projeto</td>
                    <td>Coordenador Discente do Projeto</td>
                </tr>
            </table>
            <img id="ibb" src="/../img/ibb.png" />
            <img id="unesp" src="/../img/unesp.png" />
        </div>
    </div>
</body>
<script src="/../js/html2canvas.js" type="text/javascript"></script>
<script>
    document.getElementById('assinatura-docente').style.backgroundImage = "url('/../assinatura/<?=$_GET['cod_docente']?>.png')";
    document.getElementById('assinatura-discente').style.backgroundImage = "url('/../assinatura/<?=$_GET['cod_discente']?>.png')";
    <?php
        $cod_tutore = $_GET['cod_tutore'];
        $data_inicial = $_GET['data_inicial'];
        $data_final = $_GET['data_final'];
        $cod_docente = $_GET['cod_docente'];
        $cod_discente = $_GET['cod_discente'];
        $url = 'verso.php?cod_tutore='.$cod_tutore.'&data_inicial='.$data_inicial.'&data_final='.$data_final.'&cod_docente='.$cod_docente.'&cod_discente='.$cod_discente;
    ?>
    html2canvas(document.getElementById("cert"),{
        allowTaint: true,
        scale:2,
    }).then(function (canvas) {
        var anchorTag = document.createElement("a");
        document.body.appendChild(anchorTag);
        anchorTag.download = "frente.png";
        anchorTag.href = canvas.toDataURL();
        anchorTag.target = '_blank';
        anchorTag.click();
        window.location.href = '<?=$url?>';
    });
</script>
</html>