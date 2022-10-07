<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AtenaSystem</title>
	<link type="text/css" href="../css/certificado_verso.css" rel="stylesheet"/>
	<link rel="icon" href="../img/hubis-icon.png">
</head>
<body>
    <?php
        include_once('../Controller/PresencaController.php');
        include_once('../Controller/TutoreController.php');
        include_once('../Controller/DisciplinaController.php');
        include_once('../Controller/SalaController.php');

        $TutoreController = new TutoreController();
        $tutore = $TutoreController->getTutore($_GET['cod_tutore']);

        $DisciplinaController = new DisciplinaController();
        $disciplina = $DisciplinaController->getDisciplina($tutore['cod_disciplina']);

        $SalaController = new SalaController();
        $salas = $SalaController->getSalas();
        $PresencaController = new PresencaController();
        $aulas  = 0;
        foreach($salas as $sala){  
            $presencas_aula = $PresencaController->getPresencaPeriodo(
                $sala['id'],
                0,
                0,
                $_GET['cod_tutore'],
                $_GET['data_inicial'],
                $_GET['data_final']
            );
            $aulas  = count($presencas_aula) + $aulas;
        }
        $presencas_reuniao = $PresencaController->getPresencaPeriodo(
            0,
            0,
            0,
            $_GET['cod_tutore'],
            $_GET['data_inicial'],
            $_GET['data_final']
        );
    ?>
    <div id="cert">
        <div id="conteudo">
            <table id="carga-horaria">
                <tr>
                <th colspan="2">Atividades Desenvolvidas</th>
                </tr>
                <tr>
                    <td>Professor de <?= $disciplina['nome'] ?></td>
                    <td><?= $aulas*2?> aulas (50 min/aula)</td>
                </tr>
                <tr>
                    <td>Reuniões Burocráticas/Pedagógicas</td>
                    <td><?= count($presencas_reuniao)?> horas</td>
                </tr>
            </table>
            <img id="ibb" src="/../img/ibb.png" />
            <img id="assinatura-cursinho" src="/../img/assinatura-cursinho.png" />
            <img id="unesp" src="/../img/unesp.png" />
        </div>
    </div>
</body>
<script src="/../js/html2canvas.js" type="text/javascript"></script>
<script>
    html2canvas(document.getElementById("cert"),{
        allowTaint: true,
        scale:2,
    }).then(function (canvas) {
        var anchorTag = document.createElement("a");
        document.body.appendChild(anchorTag);
        anchorTag.download = "verso.png";
        anchorTag.href = canvas.toDataURL();
        anchorTag.target = '_blank';
        anchorTag.click();
        window.location.href = 'certTutore.php';
    });
</script>
</html>