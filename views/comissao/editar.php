<label class="title">Editar Comissão</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<select class='input' id="comissao" name="comissao" onchange="buscar()"></select>
</br>
<div id="detalhes">
	<label>Nome</label>
	</br>
	<input class='input' name="nome" id="nome">
	</br>
	<label>Usuario</label>
	</br>
	<input class='input' name="usuario" id="usuario">
	</br>
	<label>Senha</label>
	</br>
	<input class='input' type="password" id="senha" name="senha">
	</br>
	<input class='button' type="button" onclick="editar()" value="Editar">
	<input class='button' type="button" onclick="excluir()" value="Excluir">
</div>
<script src="views/comissao/index.js"></script>
<script>buscarComissoes();</script>