$(document).ready(function() {
    loadMenu('presenca/reuniao');

    var tableTutoresBody = $('#tableTutores tbody');
    var formCadastro = $('#formCadastroReuniao');
    var messageStatus = $('#messageStatusReuniao');

    // Carregar tutores
    var tutores = apiGet('/tutores');
    tableTutoresBody.empty();
    if (tutores && Array.isArray(tutores)) {
        tutores.forEach(function(t) {
            var row = $('<tr></tr>');
            row.append('<td style="text-align:left; vertical-align:middle;">' + t.nome + '</td>');
            row.append('<td style="text-align:center; vertical-align:middle;"><input type="checkbox" name="presente[]" value="' + t.id + '" style="transform: scale(1.3);"></td>');
            tableTutoresBody.append(row);
        });
    }

    formCadastro.on('submit', function(e) {
        e.preventDefault();
        var data = $('#inputDataReuniao').val();
        var presentes = [];
        $('#tableTutores input[name="presente[]"]:checked').each(function() {
            presentes.push($(this).val());
        });

        var payload = {
            data: data,
            presente: presentes
        };

        var resp = apiPost('/presenca/reuniao', payload);
        if (resp && resp.access) {
            alert(resp.message || 'Presença de reunião salva com sucesso!');
            messageStatus.text('Presença cadastrada com sucesso!').css('color', 'green').show();
        } else {
            alert(resp && resp.message ? resp.message : 'Erro ao cadastrar presença.');
            messageStatus.text(resp && resp.message ? resp.message : 'Erro ao cadastrar presença.').css('color', 'red').show();
        }
    });
});
