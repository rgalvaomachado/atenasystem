<label class="title">Editar tutore</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<select class='input' id="tutore" name="tutore" onchange="buscar()"></select>
</br>
<div id="detalhes">
	<label>Nome</label>
	<br>
	<input class="input" name="nome" id="nome">
	<br>
	<label>Disciplina</label>
	<br>
	<select class='input' id="disciplina" name="disciplina"></select>
	<br>
	<input class='button' type="button" onclick="editar()" value="Editar">
	<input class='button' type="button" onclick="excluir()" value="Excluir">
</div>
<script src="views/tutore/index.js"></script>
<script>
	buscarTutores();
	buscarDisciplinas();
</script>