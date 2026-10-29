$(document).ready(function() {
    loadMenu('disciplina');

    var params = getUrlParameters();
    if (params.sucess) {
        $('#msg-sucesso').show().fadeOut(3000);
    }
    if (params.delete) {
        $('#msg-delete').show().fadeOut(3000);
    }

    // Cadastro
    $('#formCriarDisciplina').submit(function(e) {
        e.preventDefault();
        var formData = getFormData(this);
        var resp = apiPost('/disciplina', formData);
        if (resp && resp.access !== false) {
            alert("Disciplina cadastrada com sucesso!");
            window.location.assign('/disciplina/editar');
        } else {
            alert(resp && resp.message ? resp.message : "Erro ao cadastrar disciplina.");
        }
    });

    // Se estiver na tela de edição, carrega a lista de disciplinas
    if ($('#selectDisciplina').length) {
        loadDisciplinas(params.disciplina);

        $('#btnBuscar').click(function() {
            var selectedId = $('#selectDisciplina').val();
            if (selectedId) {
                carregarDetalhesDisciplina(selectedId);
            }
        });

        $('#formSalvarDisciplina').submit(function(e) {
            e.preventDefault();
            var formData = getFormData(this);
            var resp = apiPost('/disciplina/salvar', formData);
            if (resp && resp.access !== false) {
                alert("Disciplina atualizada com sucesso!");
                window.location.assign('/disciplina/editar?sucess=true&disciplina=' + formData.id);
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao atualizar disciplina.");
            }
        });

        $('#formExcluirDisciplina').submit(function(e) {
            e.preventDefault();
            if (!confirm('Tem certeza que deseja excluir?')) {
                return false;
            }
            var formData = getFormData(this);
            var resp = apiPost('/disciplina/excluir', formData);
            if (resp && resp.access !== false) {
                alert("Disciplina excluída com sucesso!");
                window.location.assign('/disciplina/editar?delete=true');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao excluir disciplina.");
            }
        });
    }
});

function loadDisciplinas(selectedId) {
    var disciplinas = apiGet('/disciplinas');
    if (disciplinas && Array.isArray(disciplinas)) {
        var options = '<option value="">Selecione uma disciplina</option>';
        disciplinas.forEach(function(d) {
            var isSel = (selectedId && String(d.id) === String(selectedId)) ? 'selected' : '';
            options += `<option value="${d.id}" ${isSel}>${d.nome}</option>`;
        });
        $('#selectDisciplina').html(options);

        if (selectedId) {
            carregarDetalhesDisciplina(selectedId);
        }
    }
}

function carregarDetalhesDisciplina(id) {
    var disciplina = apiGet('/disciplina?id=' + id);
    if (disciplina) {
        $('#disciplinaId').val(disciplina.id || id);
        $('#excluirId').val(disciplina.id || id);
        $('#disciplinaNome').val(disciplina.nome || '');
        $('#blocoEditar').show();
    }
}
