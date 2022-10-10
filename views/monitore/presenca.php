<label class="title">Editar Presença Monitore</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<label>Monitores</label>
<br>
<select class='input' id="monitore" name="monitore"></select>
<br>
<label>Salas</label>
<br>
<select class='input' id="sala" name="sala"></select>
<br>
<label>Data</label>
<br>
<input class='input' id="data" name="data" type="date"></select>
<br>
<input class='button' type="button" onclick="buscarPresencaMonitore()" value="Buscar">
<br>
<div id="detalhes">
	<select class='input' name="presente" id="presente">
		<option value="N">Ausencia</option>
		<option value="S">Presença</option>
	</select>
	<br>
	<input class='button' type="button" onclick="editarPresencaMonitore()" value="Editar">
</div>
<script src="views/monitore/index.js"></script>
<script>
	buscarMonitores();
	buscarSalas();
</script>