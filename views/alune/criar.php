<label class="title">Cadastro de Alune</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<label>Nome</label>
<br>
<input class="input" name="nome" id="nome">
<br>
<label>Sala</label>
<br>
<select class='input' id="sala" name="sala"></select>
<br>
<input class='button' type="button" onclick="criar()" value="Cadastrar">
<script src="views/alune/index.js"></script>
<script>buscarSalas()</script>