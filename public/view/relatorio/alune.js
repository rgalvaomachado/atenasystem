$(document).ready(function() {
    loadMenu('relatorio');

    var selectCodSala = $('#selectCodSala');
    var inputDataInicial = $('#inputDataInicial');
    var inputDataFinal = $('#inputDataFinal');
    var formRelatorio = $('#formRelatorioAlune');
    var tableRelatorioBody = $('#tableRelatorioAlune tbody');
    var relatorioContainer = $('#relatorioTableContainer');

    // Carregar salas
    var salas = apiGet('/salas');
    selectCodSala.empty();
    if (salas && Array.isArray(salas)) {
        selectCodSala.append('<option value="">Selecione uma sala</option>');
        salas.forEach(function(s) {
            selectCodSala.append('<option value="' + s.id + '">' + s.nome + '</option>');
        });

        var urlParams = new URLSearchParams(window.location.search);
        var salaParam = urlParams.get('cod_sala');
        var dataIniParam = urlParams.get('data_inicial');
        var dataFimParam = urlParams.get('data_final');

        if (salaParam) selectCodSala.val(salaParam);
        if (dataIniParam) inputDataInicial.val(dataIniParam);
        if (dataFimParam) inputDataFinal.val(dataFimParam);

        if (salaParam && dataIniParam && dataFimParam) {
            gerarRelatorio(salaParam, dataIniParam, dataFimParam);
        }
    }

    function gerarRelatorio(sala, dataIni, dataFim) {
        var payload = {
            cod_sala: sala,
            data_inicial: dataIni,
            data_final: dataFim
        };

        var relatorioData = apiPost('/presenca/relatorio/alune', payload);
        tableRelatorioBody.empty();

        if (relatorioData && Array.isArray(relatorioData) && relatorioData.length > 0) {
            relatorioData.forEach(function(alune) {
                var presencas = parseInt(alune.presencas) || 0;
                var ausencias = parseInt(alune.ausencias) || 0;
                var justificado = parseInt(alune.justificado) || 0;
                var total = presencas + ausencias + justificado;
                var porcentagem = total > 0 ? ((presencas + justificado) / total) * 100 : 0;
                var cor = porcentagem >= 70 ? 'green' : 'red';

                var row = $('<tr></tr>');
                row.append('<td style="text-align:left; font-weight: bold; color:' + cor + ';">' + alune.nome + '</td>');
                row.append('<td>' + presencas + '</td>');
                row.append('<td>' + ausencias + '</td>');
                row.append('<td>' + justificado + '</td>');
                row.append('<td style="font-weight: bold; color:' + cor + ';">' + porcentagem.toFixed(2) + '%</td>');
                tableRelatorioBody.append(row);
            });
            relatorioContainer.show();
        } else {
            tableRelatorioBody.append('<tr><td colspan="5">Nenhum dado encontrado para o período selecionado.</td></tr>');
            relatorioContainer.show();
        }
    }

    formRelatorio.on('submit', function(e) {
        e.preventDefault();
        var sala = selectCodSala.val();
        var dataIni = inputDataInicial.val();
        var dataFim = inputDataFinal.val();

        if (sala && dataIni && dataFim) {
            gerarRelatorio(sala, dataIni, dataFim);
        }
    });
});
