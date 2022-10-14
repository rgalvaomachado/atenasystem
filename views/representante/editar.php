<label class="title">Editar Representantes</label>
<br>
<label class="message_alert" id="messageAlert"></label>
<br>
<select class='input' id="representante" name="representante" onchange="buscar()">
	<option value="">Selecione o representante</option>
</select>
</br>
<div id="detalhes">
	<label>Nome</label>
	</br>
	<input class='input' id="nome" name="nome">
	</br>
	<label>Usuario</label>
	</br>
	<input class='input' id="usuario" name="usuario">
	</br>
	<label>Senha</label>
	</br>
	<input class='input' id="senha" type="password" name="senha">
	</br>
	<label>Assinatura</label>
	</br>
	<input class='input' id="assinatura" name="assinatura" type="file">
	</br>
	<label>Assinatura Atual</label>
	</br>
	<!-- <img id="logo-atena" style="width:150px" src="<?="../assinatura/".$_GET['representante'].".png"?>"> -->

	<input class='button' type="button" onclick="editar()" value="Editar">
	<input class='button' type="button" onclick="excluir()" value="Excluir">
</div>
<script src="views/representante/index.js"></script>
<script>buscarRepresentantes()</script>