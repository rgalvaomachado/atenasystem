$(document).ready(function() {
    loadMenu('presenca/tutore');

    var selectSala = $('#selectSalaTutore');
    var selectTutore = $('#selectTutore');
    var formCadastro = $('#formCadastroTutore');
    var messageStatus = $('#messageStatusTutore');

    // Carregar salas
    var salas = apiGet('/salas');
    selectSala.empty();
    if (salas && Array.isArray(salas)) {
        selectSala.append('<option value="">Selecione uma sala</option>');
        salas.forEach(function(s) {
            selectSala.append('<option value="' + s.id + '">' + s.nome + '</option>');
        });
    }

    // Carregar tutores
    var tutores = apiGet('/tutores');
    selectTutore.empty();
    if (tutores && Array.isArray(tutores)) {
        selectTutore.append('<option value="">Selecione um tutore</option>');
        tutores.forEach(function(t) {
            selectTutore.append('<option value="' + t.id + '">' + t.nome + '</option>');
        });
    }

    formCadastro.on('submit', function(e) {
        e.preventDefault();
        var payload = {
            sala: selectSala.val(),
            data: $('#inputDataTutore').val(),
            aula: $('#selectAulaTutore').val(),
            tutore: selectTutore.val()
        };

        var resp = apiPost('/presenca/tutore', payload);
        if (resp && resp.access) {
            alert(resp.message || 'Presença salva com sucesso!');
            messageStatus.text('Presença cadastrada com sucesso!').css('color', 'green').show();
            formCadastro[0].reset();
        } else {
            alert(resp && resp.message ? resp.message : 'Erro ao cadastrar presença.');
            messageStatus.text(resp && resp.message ? resp.message : 'Erro ao cadastrar presença.').css('color', 'red').show();
        }
    });
});
