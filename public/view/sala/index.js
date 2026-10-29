$(document).ready(function() {
    loadMenu('sala');

    var params = getUrlParameters();
    if (params.sucess) {
        $('#msg-sucesso').show().fadeOut(3000);
    }
    if (params.delete) {
        $('#msg-delete').show().fadeOut(3000);
    }

    // Cadastro
    $('#formCriarSala').submit(function(e) {
        e.preventDefault();
        var formData = getFormData(this);
        var resp = apiPost('/sala', formData);
        if (resp && resp.access !== false) {
            alert("Sala cadastrada com sucesso!");
            window.location.assign('/sala/editar');
        } else {
            alert(resp && resp.message ? resp.message : "Erro ao cadastrar sala.");
        }
    });

    // Se estiver na tela de edição, carrega a lista de salas
    if ($('#selectSala').length) {
        loadSalas(params.sala);

        $('#btnBuscar').click(function() {
            var selectedId = $('#selectSala').val();
            if (selectedId) {
                carregarDetalhesSala(selectedId);
            }
        });

        $('#formSalvarSala').submit(function(e) {
            e.preventDefault();
            var formData = getFormData(this);
            var resp = apiPost('/sala/salvar', formData);
            if (resp && resp.access !== false) {
                alert("Sala atualizada com sucesso!");
                window.location.assign('/sala/editar?sucess=true&sala=' + formData.id);
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao atualizar sala.");
            }
        });

        $('#formExcluirSala').submit(function(e) {
            e.preventDefault();
            if (!confirm('Tem certeza que deseja excluir?')) {
                return false;
            }
            var formData = getFormData(this);
            var resp = apiPost('/sala/excluir', formData);
            if (resp && resp.access !== false) {
                alert("Sala excluída com sucesso!");
                window.location.assign('/sala/editar?delete=true');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao excluir sala.");
            }
        });
    }
});

function loadSalas(selectedId) {
    var salas = apiGet('/salas');
    if (salas && Array.isArray(salas)) {
        var options = '<option value="">Selecione uma sala</option>';
        salas.forEach(function(s) {
            var isSel = (selectedId && String(s.id) === String(selectedId)) ? 'selected' : '';
            options += `<option value="${s.id}" ${isSel}>${s.nome}</option>`;
        });
        $('#selectSala').html(options);

        if (selectedId) {
            carregarDetalhesSala(selectedId);
        }
    }
}

function carregarDetalhesSala(id) {
    var sala = apiGet('/sala?id=' + id);
    if (sala) {
        $('#salaId').val(sala.id || id);
        $('#excluirId').val(sala.id || id);
        $('#salaNome').val(sala.nome || '');
        $('#blocoEditar').show();
    }
}
