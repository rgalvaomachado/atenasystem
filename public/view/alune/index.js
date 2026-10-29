$(document).ready(function() {
    loadMenu('alune');

    var params = getUrlParameters();
    if (params.sucess) {
        $('#msg-sucesso').show().fadeOut(3000);
    }
    if (params.delete) {
        $('#msg-delete').show().fadeOut(3000);
    }

    // 1. Tela de Cadastro de Alune
    if ($('#formCriarAlune').length) {
        carregarSalasSelect('#selectSalaCadastro');

        $('#formCriarAlune').submit(function(e) {
            e.preventDefault();
            var formData = getFormData(this);
            var resp = apiPost('/alune', formData);
            if (resp && resp.access !== false) {
                alert("Alune cadastrade com sucesso!");
                window.location.assign('/alune/editar');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao cadastrar alune.");
            }
        });
    }

    // 2. Tela de Edição de Alune
    if ($('#selectAlune').length) {
        carregarSalasSelect('#selectSalaEdicao');
        loadAlunes(params.alune);

        $('#btnBuscarAlune').click(function() {
            var selectedId = $('#selectAlune').val();
            if (selectedId) {
                carregarDetalhesAlune(selectedId);
            }
        });

        $('#formSalvarAlune').submit(function(e) {
            e.preventDefault();
            var formData = getFormData(this);
            var resp = apiPost('/alune/salvar', formData);
            if (resp && resp.access !== false) {
                alert("Alune atualizade com sucesso!");
                window.location.assign('/alune/editar?sucess=true&alune=' + formData.id);
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao atualizar alune.");
            }
        });

        $('#formExcluirAlune').submit(function(e) {
            e.preventDefault();
            if (!confirm('Tem certeza que deseja excluir?')) {
                return false;
            }
            var formData = getFormData(this);
            var resp = apiPost('/alune/excluir', formData);
            if (resp && resp.access !== false) {
                alert("Alune excluíde com sucesso!");
                window.location.assign('/alune/editar?delete=true');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao excluir alune.");
            }
        });
    }

    // 3. Tela de Justificar Presença
    if ($('#selectSalaJustifica').length) {
        carregarSalasSelect('#selectSalaJustifica', params.sala);

        if (params.sala) {
            carregarAlunesPorSala(params.sala, params.alune);
            $('#blocoAluneFiltro').show();
        }

        $('#selectSalaJustifica').change(function() {
            var salaId = $(this).val();
            if (salaId) {
                carregarAlunesPorSala(salaId);
                $('#blocoAluneFiltro').show();
                $('#blocoResultadoPresenca').hide();
            } else {
                $('#blocoAluneFiltro').hide();
                $('#blocoResultadoPresenca').hide();
            }
        });

        $('#btnBuscarPresenca').click(function() {
            var sala = $('#selectSalaJustifica').val();
            var alune = $('#selectAluneJustifica').val();
            var data = $('#dataJustifica').val();
            var aula = $('#aulaJustifica').val();

            if (!sala || !alune || !data) {
                alert("Preencha todos os campos para buscar a presença.");
                return;
            }

            var resp = apiPost('/presenca/alune/buscar', {
                sala: sala,
                alune: alune,
                data: data,
                aula: aula
            });

            $('#blocoResultadoPresenca').show();
            if (resp && resp.presente) {
                $('#statusPresente').val(resp.presente);
                $('#msgNaoEncontrada').hide();
                $('#formSalvarJustificativa').show();
            } else {
                $('#msgNaoEncontrada').show();
                $('#formSalvarJustificativa').hide();
            }
        });

        $('#formSalvarJustificativa').submit(function(e) {
            e.preventDefault();
            var sala = $('#selectSalaJustifica').val();
            var alune = $('#selectAluneJustifica').val();
            var data = $('#dataJustifica').val();
            var aula = $('#aulaJustifica').val();
            var presente = $('#statusPresente').val();

            var resp = apiPost('/presenca/alune/justificar', {
                sala: sala,
                alune: alune,
                data: data,
                aula: aula,
                presente: presente
            });

            if (resp && resp.access !== false) {
                alert("Presença justificada com sucesso!");
                $('#msg-sucesso').show().fadeOut(3000);
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao justificar presença.");
            }
        });
    }
});

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

function loadAlunes(selectedId) {
    var alunes = apiGet('/alunes');
    if (alunes && Array.isArray(alunes)) {
        var options = '<option value="">Selecione um alune</option>';
        alunes.forEach(function(a) {
            var isSel = (selectedId && String(a.id) === String(selectedId)) ? 'selected' : '';
            options += `<option value="${a.id}" ${isSel}>${a.nome}</option>`;
        });
        $('#selectAlune').html(options);

        if (selectedId) {
            carregarDetalhesAlune(selectedId);
        }
    }
}

function carregarDetalhesAlune(id) {
    var alune = apiGet('/alune?id=' + id);
    if (alune) {
        $('#aluneId').val(alune.id || id);
        $('#excluirId').val(alune.id || id);
        $('#aluneNome').val(alune.nome || '');
        if (alune.cod_sala) {
            $('#selectSalaEdicao').val(alune.cod_sala);
        }
        $('#blocoEditar').show();
    }
}

function carregarAlunesPorSala(salaId, selectedAluneId) {
    var alunes = apiGet('/alune/sala?sala=' + salaId);
    if (alunes && Array.isArray(alunes)) {
        var options = '<option value="">Selecione um alune</option>';
        alunes.forEach(function(a) {
            var isSel = (selectedAluneId && String(a.id) === String(selectedAluneId)) ? 'selected' : '';
            options += `<option value="${a.id}" ${isSel}>${a.nome}</option>`;
        });
        $('#selectAluneJustifica').html(options);
    }
}
