<label class="title">Presença Monitore</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<label>Salas</label>
<br>
<select class='input' id="sala" name="sala"></select>
<br>
<label>Data</label>
<br>
<input id="data" name="data" type="date" class="input">
<br>
<label>Monitores</label>
<br>
<select class='input' id="monitore" name="monitore"></select>
<br>
<input class='button' type="button" onclick="criarPresencaMonitore()" value="Ok">
<script src="views/presenca/index.js"></script>
<script>
    buscarSalas();
    buscarMonitores();
</script>