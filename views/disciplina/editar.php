<label class="title">Editar Disciplina</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<select class='input' id="disciplina" name="disciplina" onchange="buscar()"></select>
</br>
<div id="detalhes">
	<label>Nome</label>
	</br>
	<input class='input' name="nome" id="nome">
	</br>
	<input class='button' type="button" onclick="editar()" value="Editar">
	<input class='button' type="button" onclick="excluir()" value="Excluir">
</div>
<script src="views/disciplina/index.js"></script>
<script>buscarDisciplinas()</script>