<label class="title">Editar Alune</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<select class='input' id="alune" name="alune" onchange="buscar()"></select>
</br>
<div id="detalhes">
	<label>Nome</label>
	<br>
	<input class="input" name="nome" id="nome">
	<br>
	<label>Sala</label>
	<br>
	<select class='input' id="sala" name="sala"></select>
	<br>
	<input class='button' type="button" onclick="editar()" value="Editar">
	<input class='button' type="button" onclick="excluir()" value="Excluir">
</div>
<script src="views/alune/index.js"></script>
<script>
	buscarAlunes();
	buscarSalas();
</script>