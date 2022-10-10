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
    $(function(){
        $("#content").load("views/monitore/editar.php");
    });
    menu();
}

function editPresencaMonitore(){
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