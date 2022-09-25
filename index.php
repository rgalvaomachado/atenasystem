<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atenasystem</title>
        <link href="index.css" rel="stylesheet">
        <link href="frontend/representante/styles.css" rel="stylesheet">
        <script src="frontend/js/jquery-1.11.1.min.js"></script>
        <script src="frontend/js/md5.js"></script>
        <link rel="icon" href="frontend/img/hubis-icon.png">
    </head>
    <body onload="start()">
        <div id="login">
            <div class='form' class="labelLogin">
                <label class='input'id="labelLogin">Login</label>
            </div>
            <div class='form'>
                <input class='input'placeholder="Usuario" id="usuarioLogin" name="usuarioLogin" type="text">
            </div>
            <div class='form'>
                <input class='input'placeholder="Senha" id="senhaLogin" name="senhaLogin" type="password">
            </div>
            <div class='form'>
                <input class='button' type="button" onclick="login()" value="Entrar">
            </div>
            <div class='form'>
                <label class="message_alert" id="messageAlertLogin"></label>
            </div>
        </div>
        <div id="menu" class='container'>
            <div class="menu-content">
                <label class="open-menu-all" for="open-menu-all">
                    <input class="input-menu-all" id="open-menu-all" type="checkbox" name="menu-open" />
                    <div class="navegacao-mobile">
                        <span class="linha-menu"></span>
                        <span class="linha-menu"></span>
                        <span class="linha-menu"></span>
                    </div>
                    <ul class="list-menu">
                        <li class="item-menu">
                            <a onclick="representante()" class="link-menu">Representante</a>
                        </li>
                        <li class="item-menu">
                            <a onclick="comissao()" class="link-menu">Comissão de Faltas</a>
                        </li>
                        <li class="item-menu">
                            <a onclick="cadAlune()" class="link-menu">Monitore</a>
                        </li>
                        <li class="item-menu">
                            <a onclick="cadAlune()" class="link-menu">Tutore</a>
                        </li>
                        <li class="item-menu">
                            <a onclick="cadAlune()" class="link-menu">Alune</a>
                        </li>
                        <li class="item-menu">
                            <a onclick="cadAlune()" class="link-menu">Disciplina</a>
                        </li>
                        <li class="item-menu">
                            <a onclick="cadAlune()" class="link-menu">Sala</a>
                        </li>
                        <li class="item-menu">
                            <a onclick="cadAlune()" class="link-menu">Presença</a>
                        </li>
                        <li class="item-menu">
                            <a onclick="cadAlune()" class="link-menu">Certificado</a>
                        </li>
                        <li class="item-menu">
                            <a onclick="cadAlune()" class="link-menu">Relatório</a>
                        </li>
                        <li class="item-menu">
                            <a onclick="logout()" class="link-menu">Logout</a>
                        </li>
                    </ul>
                </label>
            </div>
        </div>
        <div id="content">
            <img id="logo-atena" src='frontend/img/atena.jpeg'>
        </div>
        <script src="index.js"></script>
    </body>
</html>