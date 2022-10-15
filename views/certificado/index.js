function buscarTutore(){
    var id = $("#tutore").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getTutore",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('.nomeTutore').html(response.tutore.nome);
                $('.nomeMateria').html(response.tutore.nome_disciplina);
            }
        }
    });
}

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

function gerarCertificadoTutore(){
    var tutore = $('#tutore').val();
    var dataInicial = $('#dataInicial').val();
    var dataFinal = $('#dataFinal').val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "certificadoTutore",
            tutore: tutore,
            dataInicial: dataInicial,
            dataFinal: dataFinal,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $('.anoFinal').html(response.anoFinal);
                $('.mesFinal').html(response.mesFinal);
                $('.mesInicial').html(response.mesInicial);
                $('.presencaAulas').html(response.presencaAulas*2);
                $('.presencaReuniao').html(response.presencaReuniao);
            }else{
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}

function buscarDiscente(){
    var id = $("#discente").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getRepresentante",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                var srcData = response.representante.assinatura;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                document.getElementById("assinaturaDiscente").innerHTML = newImage.outerHTML;
            }
        }
    });
}

function buscarDocente(){
    var id = $("#docente").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getRepresentante",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                var srcData = response.representante.assinatura;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                document.getElementById("assinaturaDocente").innerHTML = newImage.outerHTML;
            }
        }
    });
}

function downloadTutoreVerso(){
    var id = $("#tutore").val();
    const alert = document.getElementById("messageAlert");
    if (id > 0){
        var tutore = $('#tutore option[value="'+ id+'"]').html()
        html2canvas(document.getElementById("verso"),{
            allowTaint: true,
            scale:2,
        }).then(function (canvas) {
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);
            anchorTag.download = tutore+" Verso.png";
            anchorTag.href = canvas.toDataURL();
            anchorTag.target = '_blank';
            anchorTag.click();
        });
    } else {
        $('html, body').animate({scrollTop:0}, 'slow');
        alert.style.color = "red";
        alert.innerHTML = "Por favor, ensira todos os dados";
        setTimeout(function(){
            alert.innerHTML = "";
        }, 2000);
    }
}

function downloadTutoreFrente(){
    var id = $("#tutore").val();
    const alert = document.getElementById("messageAlert");
    if (id > 0){
        var tutore = $('#tutore option[value="'+ id+'"]').html()
        html2canvas(document.getElementById("frente"),{
            allowTaint: true,
            scale:2,
        }).then(function (canvas) {
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);
            anchorTag.download = tutore+" Frente.png";
            anchorTag.href = canvas.toDataURL();
            anchorTag.target = '_blank';
            anchorTag.click();
        });
    }else{
        $('html, body').animate({scrollTop:0}, 'slow');
        alert.style.color = "red";
        alert.innerHTML = "Por favor, ensira todos os dados";
        setTimeout(function(){
            alert.innerHTML = "";
        }, 2000);
    }
}