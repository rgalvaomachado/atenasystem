<label class="title">Presença Reunião</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<label>Data</label>
<br>
<input id="data" name="data" type="date" class="input">
<br>
<br>
<label><strong>Tutores</strong></label>
<br>
<table>
	<thead>
		<tr>
			<th><strong>Nome</strong></th>
			<th><strong>Presente</strong></th>
		</tr>
	</thead>
	<tbody id='lista'>
	</tbody>
</table>
<input class='button' type="button" onclick="criarPresencaReuniao()" value="Ok">
<script src="views/presenca/index.js"></script>
<script>buscarTutoresLista()</script>