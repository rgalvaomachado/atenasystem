<label class="title">Certificado Monitore</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<label>Monitores</label>
<br>
<select class='input' id="monitore" name="monitore"></select>
<br>
<label>Data Inicial</label>
<br>
<input id="dataInicial" name="dataInicial" type="date" class="input">
<br>
<label>Data Final</label>
<br>
<input id="dataFinal" name="dataFinal" type="date" class="input">
<br>
<label>Coordenador Docente do Projeto</label>
<br>
<select class='input' id="docente" name="docente"></select>
<br>
<label>Coordenador Discente do Projeto</label>
<br>
<select class='input' id="discente" name="discente"></select>
<br>
<input class='button' type="button" onclick="certificadoMonitore()" value="Gerar">
<script src="views/certificado/index.js"></script>
<script>
	buscarMonitores();
	buscarRepresentantes();
</script>