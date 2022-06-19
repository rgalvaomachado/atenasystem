<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="verso.css"/>
    <title>Certificado</title>
</head>
<body>
    <div id="cert">
        <div id="conteudo">
            <table id="carga-horaria">
                <tr>
                <th colspan="2">Atividades Desenvolvidas</th>
                </tr>
                <tr>
                    <td>Professor de Historia</td>
                    <td>15 aulas (50 min/aula)</td>
                </tr>
                <tr>
                    <td>Reuniões Burocráticas/Pedagógicas</td>
                    <td>13 horas</td>
                </tr>
            </table>
            <img id="ibb" src="ibb.png" />
            <img id="assinatura-cursinho" src="assinatura-cursinho.png" />
            <img id="unesp" src="unesp.png" />
        </div>
    </div>
</body>
<script src="html2canvas.js" type="text/javascript"></script>
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