<label class="title">Justificar Presença Reunião</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<label>Tutore</label>
<br>
<select class='input' id="tutore" name="tutore"></select>
<br>
<label>Data</label>
<br>
<input class='input' id="data" name="data" type="date">
<br>
<input class='button' type="button" onclick="buscarPresencaReuniao()" value="Buscar">
<br>
<div id="detalhes">
	<select class='input' name="presente" id="presente">
		<option value="N">Ausencia</option>
		<option value="S">Presença</option>
		<option value="J">Falta Justificada</option>
	</select>
	<br>
	<input class='button' type="button" onclick="justificarPresencaReuniao()" value="Justificar">
</div>
<script src="views/tutore/index.js"></script>
<script>
	buscarTutores();
</script>