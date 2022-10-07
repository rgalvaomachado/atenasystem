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
<script src="views/login/index.js"></script>