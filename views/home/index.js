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