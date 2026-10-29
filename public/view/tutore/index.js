$(document).ready(function() {
    loadMenu('tutore');

    var params = getUrlParameters();
    if (params.sucess) {
        $('#msg-sucesso').show().fadeOut(3000);
    }
    if (params.delete) {
        $('#msg-delete').show().fadeOut(3000);
    }

    // 1. Tela de Cadastro de Tutore
    if ($('#formCriarTutore').length) {
        carregarDisciplinasSelect('#selectDisciplinaCadastro');

        $('#formCriarTutore').submit(function(e) {
            e.preventDefault();
            var formData = getFormData(this);
            var resp = apiPost('/tutore', formData);
            if (resp && resp.access !== false) {
                alert("Tutore cadastrade com sucesso!");
                window.location.assign('/tutore/editar');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao cadastrar tutore.");
            }
        });
    }

    // 2. Tela de Edição de Tutore
    if ($('#selectTutore').length) {
        carregarDisciplinasSelect('#selectDisciplinaEdicao');
        loadTutores('#selectTutore', params.tutore);

        $('#btnBuscarTutore').click(function() {
            var selectedId = $('#selectTutore').val();
            if (selectedId) {
                carregarDetalhesTutore(selectedId);
            }
        });

        $('#formSalvarTutore').submit(function(e) {
            e.preventDefault();
            var formData = getFormData(this);
            var resp = apiPost('/tutore/salvar', formData);
            if (resp && resp.access !== false) {
                alert("Tutore atualizade com sucesso!");
                window.location.assign('/tutore/editar?sucess=true&tutore=' + formData.id);
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao atualizar tutore.");
            }
        });

        $('#formExcluirTutore').submit(function(e) {
            e.preventDefault();
            if (!confirm('Tem certeza que deseja excluir?')) {
                return false;
            }
            var formData = getFormData(this);
            var resp = apiPost('/tutore/excluir', formData);
            if (resp && resp.access !== false) {
                alert("Tutore excluíde com sucesso!");
                window.location.assign('/tutore/editar?delete=true');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao excluir tutore.");
            }
        });
    }

    // 3. Justificar Presença em Reunião
    if ($('#selectTutoreJustifica').length) {
        loadTutores('#selectTutoreJustifica', params.tutore);
        if (params.data) {
            $('#dataJustificaReuniao').val(params.data);
        }

        $('#btnBuscarPresencaReuniao').click(function() {
            var tutore = $('#selectTutoreJustifica').val();
            var data = $('#dataJustificaReuniao').val();

            if (!tutore || !data) {
                alert("Preencha todos os campos para buscar a presença.");
                return;
            }

            var resp = apiPost('/presenca/reuniao/buscar', {
                tutore: tutore,
                data: data
            });

            $('#blocoResultadoReuniao').show();
            if (resp && resp.presente) {
                $('#statusPresenteReuniao').val(resp.presente);
                $('#msgReuniaoNaoEncontrada').hide();
                $('#formSalvarJustificativaReuniao').show();
            } else {
                $('#msgReuniaoNaoEncontrada').show();
                $('#formSalvarJustificativaReuniao').hide();
            }
        });

        $('#formSalvarJustificativaReuniao').submit(function(e) {
            e.preventDefault();
            var tutore = $('#selectTutoreJustifica').val();
            var data = $('#dataJustificaReuniao').val();
            var presente = $('#statusPresenteReuniao').val();

            var resp = apiPost('/presenca/reuniao/justificar', {
                tutore: tutore,
                data: data,
                presente: presente
            });

            if (resp && resp.access !== false) {
                alert("Presença em reunião justificada com sucesso!");
                $('#msg-sucesso').show().fadeOut(3000);
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao justificar presença.");
            }
        });
    }

    // 4. Editar Presença Tutore de Aula
    if ($('#selectTutorePresenca').length) {
        loadTutores('#selectTutorePresenca', params.tutore);
        carregarSalasSelect('#selectSalaPresenca', params.sala);
        if (params.data) {
            $('#dataPresencaTutore').val(params.data);
        }
        if (params.aula) {
            $('#selectAulaPresenca').val(params.aula);
        }

        $('#btnBuscarPresencaTutore').click(function() {
            var tutore = $('#selectTutorePresenca').val();
            var sala = $('#selectSalaPresenca').val();
            var aula = $('#selectAulaPresenca').val();
            var data = $('#dataPresencaTutore').val();

            if (!tutore || !sala || !aula || !data) {
                alert("Preencha todos os campos para buscar a presença.");
                return;
            }

            var resp = apiPost('/presenca/tutore/buscar', {
                tutore: tutore,
                sala: sala,
                aula: aula,
                data: data
            });

            $('#blocoResultadoTutore').show();
            if (resp && resp.presente) {
                $('#statusPresencaTutore').val(resp.presente);
                $('#msgPresencaTutoreNaoEncontrada').hide();
                $('#formSalvarPresencaTutore').show();
            } else {
                $('#msgPresencaTutoreNaoEncontrada').show();
                $('#formSalvarPresencaTutore').hide();
            }
        });

        $('#formSalvarPresencaTutore').submit(function(e) {
            e.preventDefault();
            var tutore = $('#selectTutorePresenca').val();
            var sala = $('#selectSalaPresenca').val();
            var aula = $('#selectAulaPresenca').val();
            var data = $('#dataPresencaTutore').val();
            var presente = $('#statusPresencaTutore').val();

            var resp = apiPost('/presenca/tutore/editar', {
                tutore: tutore,
                sala: sala,
                aula: aula,
                data: data,
                presente: presente
            });

            if (resp && resp.access !== false) {
                alert("Presença de tutore atualizada com sucesso!");
                $('#msg-sucesso').show().fadeOut(3000);
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao atualizar presença.");
            }
        });
    }
});

function carregarDisciplinasSelect(selector, selectedId) {
    var disciplinas = apiGet('/disciplinas');
    if (disciplinas && Array.isArray(disciplinas)) {
        var options = '<option value="">Selecione uma disciplina</option>';
        disciplinas.forEach(function(d) {
            var isSel = (selectedId && String(d.id) === String(selectedId)) ? 'selected' : '';
            options += `<option value="${d.id}" ${isSel}>${d.nome}</option>`;
        });
        $(selector).html(options);
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

function loadTutores(selector, selectedId) {
    var tutores = apiGet('/tutores');
    if (tutores && Array.isArray(tutores)) {
        var options = '<option value="">Selecione um tutore</option>';
        tutores.forEach(function(t) {
            var isSel = (selectedId && String(t.id) === String(selectedId)) ? 'selected' : '';
            options += `<option value="${t.id}" ${isSel}>${t.nome}</option>`;
        });
        $(selector).html(options);

        if (selectedId && selector === '#selectTutore') {
            carregarDetalhesTutore(selectedId);
        }
    }
}

function carregarDetalhesTutore(id) {
    var tutore = apiGet('/tutore?id=' + id);
    if (tutore) {
        $('#tutoreId').val(tutore.id || id);
        $('#excluirId').val(tutore.id || id);
        $('#tutoreNome').val(tutore.nome || '');
        if (tutore.cod_disciplina) {
            $('#selectDisciplinaEdicao').val(tutore.cod_disciplina);
        }
        $('#blocoEditar').show();
    }
}
