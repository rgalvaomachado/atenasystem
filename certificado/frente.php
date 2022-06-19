<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="frente.css"/>
    <title>Certificado</title>
</head>
<body>
    <div id="cert">
        <div id="conteudo">
            <h1 id="titulo">
                CERTIFICADO
            </h1>
            <div id="corpo">
                Certificamos que <b>Victória Mokarzel de Barros Camargo</b> participou do Subprograma de Extensão Universitária Cursinho Pré Universitário Atena do Instituto de Biociencias da UNESP de Botucatu na condição de <b>Professor(a) de História</b> no periodo de Fevereiro a Agosto de 2021.
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
                    <td>Prof. Ariane Leite Rozza</td>
                    <td>Matheus Souza Zebeu</td>
                </tr>
                <tr>
                    <td>Coordenador Docente do Projeto</td>
                    <td>Coordenador Discente do Projeto</td>
                </tr>
            </table>
            <img id="ibb" src="ibb.png" />
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
        anchorTag.download = "frente.png";
        anchorTag.href = canvas.toDataURL();
        anchorTag.target = '_blank';
        anchorTag.click();
        window.location.href = 'verso.php';
    });
</script>
</html>