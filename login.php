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
<body>
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
</body>
<script src="index.js"></script>
</html>