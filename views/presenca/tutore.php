<label class="title">Presença Tutore</label>
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
<label>Aula</label>
<br>
<select id="aula" name="aula" class="input">
	<option value="1">Primeira Aula</option>
	<option value="2">Segunda Aula</option>
</select>
<br>
<label>Tutore</label>
<br>
<select class='input' id="tutore" name="tutore"></select>
<br>
<input class='button' type="button" onclick="criarPresencaTutore()" value="Ok">
<script src="views/presenca/index.js"></script>
<script>
	buscarSalas();
	buscarTutoresSelect();
</script>