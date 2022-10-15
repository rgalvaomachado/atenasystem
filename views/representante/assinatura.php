<label class="title">Editar Assinatura</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<select class='input' id="representante" name="representante" onchange="buscarAssinatura()">
	<option value="">Selecione o representante</option>
</select>
</br>
<div id="detalhes">
	<label>Assinatura Atual</label>
	</br>
	<div id="assinaturaRepresentante" style="width: 300px;height: 150px;margin: auto;"></div>
	</br>
	<label>Nova Assinatura</label>
	</br>
	<input class='input' id="assinatura" name="assinatura" type="file">
	</br>
	<input class='button' type="button" onclick="salvarAssinatura()" value="Salvar Assinatura">
</div>
<script src="views/representante/index.js"></script>
<script>buscarRepresentantes()</script>