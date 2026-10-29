$(document).ready(function() {
    loadMenu('relatorio/reuniao');

    var inputDataInicial = $('#inputDataInicialReuniao');
    var inputDataFinal = $('#inputDataFinalReuniao');
    var formRelatorio = $('#formRelatorioReuniao');
    var tableRelatorioBody = $('#tableRelatorioReuniao tbody');
    var relatorioContainer = $('#relatorioTableContainerReuniao');

    var urlParams = new URLSearchParams(window.location.search);
    var dataIniParam = urlParams.get('data_inicial');
    var dataFimParam = urlParams.get('data_final');

    if (dataIniParam) inputDataInicial.val(dataIniParam);
    if (dataFimParam) inputDataFinal.val(dataFimParam);

    if (dataIniParam && dataFimParam) {
        gerarRelatorio(dataIniParam, dataFimParam);
    }

    function gerarRelatorio(dataIni, dataFim) {
        var payload = {
            data_inicial: dataIni,
            data_final: dataFim
        };

        var relatorioData = apiPost('/presenca/relatorio/reuniao', payload);
        tableRelatorioBody.empty();

        if (relatorioData && Array.isArray(relatorioData) && relatorioData.length > 0) {
            relatorioData.forEach(function(item) {
                var presencas = parseInt(item.presencas) || 0;
                var ausencias = parseInt(item.ausencias) || 0;
                var justificadas = parseInt(item.justificadas) || 0;
                var cor = ausencias < 4 ? 'green' : 'red';

                var row = $('<tr></tr>');
                row.append('<td style="text-align:left; font-weight:bold; color:' + cor + ';">' + item.nome + '</td>');
                row.append('<td>' + presencas + '</td>');
                row.append('<td>' + ausencias + '</td>');
                row.append('<td>' + justificadas + '</td>');
                tableRelatorioBody.append(row);
            });
            relatorioContainer.show();
        } else {
            tableRelatorioBody.append('<tr><td colspan="4">Nenhum dado encontrado para o período selecionado.</td></tr>');
            relatorioContainer.show();
        }
    }

    formRelatorio.on('submit', function(e) {
        e.preventDefault();
        var dataIni = inputDataInicial.val();
        var dataFim = inputDataFinal.val();

        if (dataIni && dataFim) {
            gerarRelatorio(dataIni, dataFim);
        }
    });
});
