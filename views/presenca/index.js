function buscarSalas(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getSalas",
        },
        complete: function(response) {
            var salas = JSON.parse(response.responseText);
            salas.map(({id,nome}) => {
                $('#sala').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
}

function buscarAlunesLista(){
    var sala = $("#sala").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getAlunesSala",
            sala: sala,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $("#lista").html('');
                var alunes = response.alunes;
                alunes.map(({id,nome}) => {
                    $('#lista').append(`
                        <tr>
                            <td>${nome}</td>
                            <td><input name="presente[]" type="checkbox" value='${id}'></td>
                        </tr>
                    `);
                });
            }
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

function buscarTutoresLista(){
    var sala = $("#sala").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getTutores",
            sala: sala,
        },
        complete: function(response) {
            var tutores = JSON.parse(response.responseText);
            $("#lista").html('');
            tutores.map(({id,nome}) => {
                $('#lista').append(`
                    <tr>
                        <td>${nome}</td>
                        <td><input name="presente[]" type="checkbox" value='${id}'></td>
                    </tr>
                `);
            });
        }
    });
}

function buscarTutoresSelect(){
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

function criarPresencaAlune(){
    var sala = $("#sala").val();
    var data = $("#data").val();
    var aula = $("#aula").val();
    var presente = $('input[name="presente[]"]:checked').map(function () {
        return this.value;
    }).get();

    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "criarPresencaAlune",
            sala: sala,
            data: data,
            aula: aula,
            "presente[]": presente,
            
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            $('html, body').animate({scrollTop:0}, 'slow');
            if (response.access) {
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("views/presenca/alune.php");
                    });
                }, 2000);
                
            } else {
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
        
    });
}

function criarPresencaReuniao(){
    var data = $("#data").val();
    var presente = $('input[name="presente[]"]:checked').map(function () {
        return this.value;
    }).get();

    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "criarPresencaReuniao",
            data: data,
            "presente[]": presente,
            
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            $('html, body').animate({scrollTop:0}, 'slow');
            if (response.access) {
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("views/presenca/reuniao.php");
                    });
                }, 2000);
                
            } else {
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
        
    });
}

function criarPresencaMonitore(){
    var monitore = $("#monitore").val();
    var sala = $("#sala").val();
    var data = $("#data").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "criarPresencaMonitore",
            monitore: monitore,
            sala: sala,
            data: data,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if (response.access) {
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("views/presenca/monitore.php");
                    });
                }, 2000);
            } else {
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}

function criarPresencaTutore(){
    var sala = $("#sala").val();
    var data = $("#data").val();
    var aula = $("#aula").val();
    var tutore = $("#tutore").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "criarPresencaTutore",
            sala: sala,
            data: data,
            aula: aula,
            tutore: tutore,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            $('html, body').animate({scrollTop:0}, 'slow');
            if (response.access) {
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("views/presenca/tutore.php");
                    });
                }, 2000);
            } else {
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}