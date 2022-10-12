<label class="title">Editar Sala</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<select class='input' id="sala" name="sala" onchange="buscar()"></select>
</br>
<div id="detalhes">
	<label>Nome</label>
	</br>
	<input class='input' name="nome" id="nome">
	</br>
	<input class='button' type="button" onclick="editar()" value="Editar">
	<input class='button' type="button" onclick="excluir()" value="Excluir">
</div>
<script src="views/sala/index.js"></script>
<script>buscarSalas()</script>