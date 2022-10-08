<h1>Editar Presença Monitore</h1>
<input type="hidden" name="metodo" value="buscarPresencaMonitore">
	<label>Monitores</label>
	<select name="monitore" class="form-control">
			<option value="<?= $monitore['id'] ?>" <?= $monitore['id'] == $id ? "selected" : ""?> > <?= $monitore['nome'] ?></option>
	</select>
</div>
<div class="form-group">
	<label>Salas</label>
	<?php $id = (isset($_GET['sala']) ? $_GET['sala'] : 1) ?>
	<select name="sala" class="form-control">
	</select>
</div>
<label>Data</label>
<?php $data = isset($_GET['data']) ? $_GET['data'] : ""?>
<input name="data" class="form-control" type="date" value="<?= $data ?>" required>
</div>
<button type="submit" class="btn btn-md btn-warning">Buscar</button>
<input type="hidden" name="metodo" value="editarPresencaMonitore">
<input type="hidden" name="monitore" value="<?= $_GET['monitore'] ?>">
<input type="hidden" name="sala" value="<?= $_GET['sala'] ?>">
<input type="hidden" name="data" value="<?= $_GET['data'] ?>">
<div class="row" >
	<div class="form-group">
		<br>
		<select name="presente" class="form-control">
			<option <?= $_GET['presente'] == "N" ? "selected" : ""?> value="N">Ausencia</option>
			<option <?= $_GET['presente'] == "S" ? "selected" : ""?> value="S">Presença</option>
		</select>
	</div>
	<button type="submit" class="btn btn-md btn-warning">Editar</button>
</div>
<label> "Presença não encontrada" </label>