function buscarTutores(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getTutores",
        },
        complete: function(response) {
            var tutores = JSON.parse(response.responseText);
            tutores.map(({id,nome}) => {
                $('#tutore').append(`<option value='${id}'>${nome}</option>`);
            });
        }
    });
}

function buscarRepresentantes(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getRepresentantes",
        },
        complete: function(response) {
            var representantes = JSON.parse(response.responseText);
            representantes.map(({id,nome}) => {
                $('#discente').append(`<option value='${id}'>${nome}</option>`);
                $('#docente').append(`<option value='${id}'>${nome}</option>`);
            });
        }
    });
}

function buscarMonitores(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getMonitores",
        },
        complete: function(response) {
            var monitores = JSON.parse(response.responseText);
            monitores.map(({id,nome}) => {
                $('#monitore').append(`<option value='${id}'>${nome}</option>`);
            });
        }
    });
}

function certificadoTutore(){
    var tutore = $('#tutore').val();
    var dataInicial = $('#dataInicial').val();
    var dataFinal = $('#dataFinal').val();
    var docente = $('#docente').val();
    var discente = $('#discente').val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "certificadoTutore",
            tutore: tutore,
            dataInicial: dataInicial,
            dataFinal: dataFinal,
            docente: docente,
            discente: discente,
        },
        complete: function(response) {

        }
    });
}