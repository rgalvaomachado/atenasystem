function menu(){
    checkMenu = $('#checkMenu').is(':checked');
    if (checkMenu){
        $('#menu').hide();
    }else{
        $('#menu').show();
    }
}

function cadRepresentante(){
    $(function(){
        $("#content").load("views/representante/criar.php");
    });
    menu();
}

function editRepresentante(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getRepresentantes",
        },
        complete: function(response) {
            var representantes = JSON.parse(response.responseText);
            representantes.map(({id,nome}) => {
                $('#representante').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
    $(function(){
        $("#content").load("views/representante/editar.php");
    });
    menu();
}

function cadComissao(){
    $(function(){
        $("#content").load("views/comissao/criar.php");
    });
    menu();
}

function editComissao(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getComissoes",
        },
        complete: function(response) {
            var representantes = JSON.parse(response.responseText);
            representantes.map(({id,nome}) => {
                $('#comissao').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
    $(function(){
        $("#content").load("views/comissao/editar.php");
    });
    menu();
}

function cadMonitore(){
    $(function(){
        $("#content").load("views/monitore/criar.php");
    });
    menu();
}

function editMonitore(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getMonitores",
        },
        complete: function(response) {
            var representantes = JSON.parse(response.responseText);
            representantes.map(({id,nome}) => {
                $('#monitore').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
    $(function(){
        $("#content").load("views/monitore/editar.php");
    });
    menu();
}

function editPresencaMonitore(){   
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getComissoes",
        },
        complete: function(response) {
            var representantes = JSON.parse(response.responseText);
            representantes.map(({id,nome}) => {
                $('#comissao').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
    $(function(){
        $("#content").load("views/monitore/presenca.php");
    });
    menu();
}

function logout(){
    $(function(){
        $.ajax({
            method: "POST",
            url: "src/Controller/Controller.php",
            data: {
                metodo: "logout",
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                if(response.access){
                    window.location.assign("");
                }
            }
        });
    });
}