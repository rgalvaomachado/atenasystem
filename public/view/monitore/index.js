$(document).ready(function() {
    loadMenu('monitore');

    var params = getUrlParameters();
    if (params.sucess) {
        $('#msg-sucesso').show().fadeOut(3000);
    }
    if (params.delete) {
        $('#msg-delete').show().fadeOut(3000);
    }

    // 1. Tela de Cadastro de Monitore
    if ($('#formCriarMonitore').length) {
        $('#formCriarMonitore').submit(function(e) {
            e.preventDefault();
            var formData = getFormData(this);
            var resp = apiPost('/monitore', formData);
            if (resp && resp.access !== false) {
                alert("Monitore cadastrade com sucesso!");
                window.location.assign('/monitore/editar');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao cadastrar monitore.");
            }
        });
    }

    // 2. Tela de Edição de Monitore
    if ($('#selectMonitore').length) {
        loadMonitores('#selectMonitore', params.monitore);

        $('#btnBuscarMonitore').click(function() {
            var selectedId = $('#selectMonitore').val();
            if (selectedId) {
                carregarDetalhesMonitore(selectedId);
            }
        });

        $('#formSalvarMonitore').submit(function(e) {
            e.preventDefault();
            var formData = getFormData(this);
            var resp = apiPost('/monitore/salvar', formData);
            if (resp && resp.access !== false) {
                alert("Monitore atualizade com sucesso!");
                window.location.assign('/monitore/editar?sucess=true&monitore=' + formData.id);
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao atualizar monitore.");
            }
        });

        $('#formExcluirMonitore').submit(function(e) {
            e.preventDefault();
            if (!confirm('Tem certeza que deseja excluir?')) {
                return false;
            }
            var formData = getFormData(this);
            var resp = apiPost('/monitore/excluir', formData);
            if (resp && resp.access !== false) {
                alert("Monitore excluíde com sucesso!");
                window.location.assign('/monitore/editar?delete=true');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao excluir monitore.");
            }
        });
    }

    // 3. Tela de Editar Presença Monitore
    if ($('#selectMonitorePresenca').length) {
        loadMonitores('#selectMonitorePresenca', params.monitore);
        carregarSalasSelect('#selectSalaPresenca', params.sala);
        if (params.data) {
            $('#dataPresencaMonitore').val(params.data);
        }

        $('#btnBuscarPresencaMonitore').click(function() {
            var monitore = $('#selectMonitorePresenca').val();
            var sala = $('#selectSalaPresenca').val();
            var data = $('#dataPresencaMonitore').val();

            if (!monitore || !sala || !data) {
                alert("Preencha todos os campos para buscar a presença.");
                return;
            }

            var resp = apiPost('/presenca/monitore/buscar', {
                monitore: monitore,
                sala: sala,
                data: data
            });

            $('#blocoResultadoMonitore').show();
            if (resp && resp.presente) {
                $('#statusPresencaMonitore').val(resp.presente);
                $('#msgPresencaMonitoreNaoEncontrada').hide();
                $('#formSalvarPresencaMonitore').show();
            } else {
                $('#msgPresencaMonitoreNaoEncontrada').show();
                $('#formSalvarPresencaMonitore').hide();
            }
        });

        $('#formSalvarPresencaMonitore').submit(function(e) {
            e.preventDefault();
            var monitore = $('#selectMonitorePresenca').val();
            var sala = $('#selectSalaPresenca').val();
            var data = $('#dataPresencaMonitore').val();
            var presente = $('#statusPresencaMonitore').val();

            var resp = apiPost('/presenca/monitore/editar', {
                monitore: monitore,
                sala: sala,
                data: data,
                presente: presente
            });

            if (resp && resp.access !== false) {
                alert("Presença de monitore atualizada com sucesso!");
                $('#msg-sucesso').show().fadeOut(3000);
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao atualizar presença.");
            }
        });
    }
});

function loadMonitores(selector, selectedId) {
    var monitores = apiGet('/monitores');
    if (monitores && Array.isArray(monitores)) {
        var options = '<option value="">Selecione um monitore</option>';
        monitores.forEach(function(m) {
            var isSel = (selectedId && String(m.id) === String(selectedId)) ? 'selected' : '';
            options += `<option value="${m.id}" ${isSel}>${m.nome}</option>`;
        });
        $(selector).html(options);

        if (selectedId && selector === '#selectMonitore') {
            carregarDetalhesMonitore(selectedId);
        }
    }
}

function carregarSalasSelect(selector, selectedId) {
    var salas = apiGet('/salas');
    if (salas && Array.isArray(salas)) {
        var options = '<option value="">Selecione uma sala</option>';
        salas.forEach(function(s) {
            var isSel = (selectedId && String(s.id) === String(selectedId)) ? 'selected' : '';
            options += `<option value="${s.id}" ${isSel}>${s.nome}</option>`;
        });
        $(selector).html(options);
    }
}

function carregarDetalhesMonitore(id) {
    var monitore = apiGet('/monitore?id=' + id);
    if (monitore) {
        $('#monitoreId').val(monitore.id || id);
        $('#excluirId').val(monitore.id || id);
        $('#monitoreNome').val(monitore.nome || '');
        $('#monitoreUsuario').val(monitore.usuario || '');
        $('#monitoreSenha').val('');
        $('#blocoEditar').show();
    }
}
