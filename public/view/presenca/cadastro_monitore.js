$(document).ready(function() {
    loadMenu('presenca/monitore');

    var selectSala = $('#selectSalaMonitore');
    var selectMonitore = $('#selectMonitore');
    var formCadastro = $('#formCadastroMonitore');
    var messageStatus = $('#messageStatusMonitore');

    // Carregar salas
    var salas = apiGet('/salas');
    selectSala.empty();
    if (salas && Array.isArray(salas)) {
        selectSala.append('<option value="">Selecione uma sala</option>');
        salas.forEach(function(s) {
            selectSala.append('<option value="' + s.id + '">' + s.nome + '</option>');
        });
    }

    // Carregar monitores
    var monitores = apiGet('/monitores');
    selectMonitore.empty();
    if (monitores && Array.isArray(monitores)) {
        selectMonitore.append('<option value="">Selecione um monitore</option>');
        monitores.forEach(function(m) {
            selectMonitore.append('<option value="' + m.id + '">' + m.nome + '</option>');
        });
    }

    formCadastro.on('submit', function(e) {
        e.preventDefault();
        var payload = {
            sala: selectSala.val(),
            data: $('#inputDataMonitore').val(),
            monitore: selectMonitore.val()
        };

        var resp = apiPost('/presenca/monitore', payload);
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
