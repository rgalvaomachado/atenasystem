<label class="title">Relatório Reuniao</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<label>Data Inicial</label>
<br>
<input id="dataInicial" name="dataInicial" type="date" class="input">
<br>
<label>Data Final</label>
<br>
<input id="dataFinal" name="dataFinal" type="date" class="input">
<br>
<input class='button' type="button" onclick="relatorioPresencaReuniao()" value="Gerar">
<br>
<div id="detalhes">
	<table>
		<thead>
			<tr>
				<th><strong>Nome</strong></th>
				<th><strong>Presença</strong></th>
				<th><strong>Ausencia</strong></th>
				<th><strong>Justificado</strong></th>
			</tr>
		</thead>
		<tbody id='lista'>
		</tbody>
	</table>
</div>
<script src="views/relatorio/index.js"></script>