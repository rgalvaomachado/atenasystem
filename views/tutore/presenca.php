<label class="title">Editar Presença</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<label>Tutores</label>
<br>
<select class='input' id="tutore" name="tutore"></select>
<br>
<label>Salas</label>
<br>
<select class='input' id="sala" name="sala"></select>
<br>
<label>Aula</label>
<br>
<select class='input' id="aula" name="aula">
	<option value="1">Primeira Aula</option>
	<option value="2">Segunda Aula</option>
</select>
<br>
<label>Data</label>
<br>
<input class='input' id="data" name="data" type="date">
<br>
<input class='button' type="button" onclick="buscarPresencaTutore()" value="Buscar">
<br>
<div id="detalhes">
	<select class='input' name="presente" id="presente">
		<option value="N">Ausencia</option>
		<option value="S">Presença</option>
	</select>
	<br>
	<input class='button' type="button" onclick="editarPresencaTutore()" value="Editar">
</div>
<script src="views/tutore/index.js"></script>
<script>
	buscarTutores();
	buscarSalas();
</script>