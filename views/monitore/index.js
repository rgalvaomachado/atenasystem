function criar(){
    var nome = $("#nome").val();
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "criarMonitore",
            nome: nome,
            usuario: usuario,
            senha: senha,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if(response.access){
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("views/monitore/criar.php");
                    });
                }, 1000);
            }else{
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}

function buscar(){
    var id = $("#monitore").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getMonitore",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $('#nome').val(response.monitore.nome);
                $('#usuario').val(response.monitore.usuario);
            }
        }
    });
}

function editar(){
    var id = $("#monitore").val();
    var nome = $("#nome").val();
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "salvarMonitore",
            id: id,
            nome: nome,
            usuario: usuario,
            senha: senha,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if(response.access){
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("views/monitore/editar.php");
                    });
                }, 1000);
            }else{
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}

function excluir(){
    if (confirm("Voce realmente deseja excluir?")){
        var id = $("#monitore").val();
        $.ajax({
            method: "POST",
            url: "src/Controller/Controller.php",
            data: {
                metodo: "excluirMonitore",
                id: id,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                if(response.access){
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                        $(function(){
                            $("#content").load("views/monitore/editar.php");
                        });
                    }, 1000);
                }else{
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
            }
        });
    }
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

function buscarPresencaMonitore(){
    var monitore = $("#monitore").val();
    var sala = $("#sala").val();
    var data = $("#data").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "buscarPresencaMonitore",
            monitore: monitore,
            sala: sala,
            data: data,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if (response.access) {
                $('#detalhes').show();
                $('#presente').val(response.presente);
            } else {
                $('#detalhes').hide();
                const alert = document.getElementById("messageAlert");
                alert.style.color = "red";
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}

function editarPresencaMonitore(){
    var monitore = $("#monitore").val();
    var sala = $("#sala").val();
    var data = $("#data").val();
    var presente = $("#presente").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "editarPresencaMonitore",
            monitore: monitore,
            sala: sala,
            data: data,
            presente: presente,
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
                        $("#content").load("views/monitore/presenca.php");
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

function buscarSalas(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getSalas",
        },
        complete: function(response) {
            var sala = JSON.parse(response.responseText);
            sala.map(({id,nome}) => {
                $('#sala').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
}