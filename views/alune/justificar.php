<label class="title">Justificar Presença Alune</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<label>Salas</label>
<br>
<select class='input' id="sala" name="sala" onchange="buscarAlunesSala()"></select>
<br>
<div id="detalhes0">
	<label>Alune</label>
	<br>
	<select class='input' id="alune" name="alune"></select>
	<br>
	<label>Data</label>
	<br>
	<input class='input' id="data" name="data" type="date">
	<br>
	<label>Aula</label>
	<br>
	<select class='input' id="aula" name="aula">
		<option value="1">Primeira Aula</option>
		<option value="2">Segunda Aula</option>
	</select>
	<br>
	<input class='button' type="button" onclick="buscarPresencaAlune()" value="Buscar">
	<br>
</div>
<div id="detalhes">
	<select class='input' name="presente" id="presente">
		<option value="N">Ausencia</option>
		<option value="S">Presença</option>
		<option value="J">Falta Justificada</option>
	</select>
	<br>
	<input class='button' type="button" onclick="justificarPresencaAlune()" value="Justificar">
</div>
<script src="views/alune/index.js"></script>
<script>
	buscarAlunesSala();
	buscarSalas();
</script>