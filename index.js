function cadRepresentante(){
    $(function(){
        $("#content").load("frontend/representante/criar.php");
    });
}

function editRepresentante(){
    $(function(){
        $("#content").load("frontend/representante/editar.php");
    });
}

function comissao(){
    $(function(){
        $("#content").load("frontend/comissao/index.php"); 
    });
}

function start(){
    $.ajax({
        method: "POST",
        url: "backend/Controller/Controller.php",
        data: {
            metodo: "verificaLogin",
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if (response.access) {
                $(function(){
                    $("#content0").load("home.php"); 
                });
            } else {
                $(function(){
                    $("#content0").load("login.php"); 
                });
            }
        }
    });
}

function logout(){
    $(function(){
        $.ajax({
            method: "POST",
            url: "backend/Controller/Controller.php",
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

function login(){
    var usuario = $("#usuarioLogin").val();
    var senha = $("#senhaLogin").val();
    $.ajax({
        method: "POST",
        url: "backend/Controller/Controller.php",
        data: {
            metodo: "login",
            usuario: usuario,
            senha: md5(senha),
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            console.log(response);
            if(response.access){
                window.location.assign("")
            }else{
                const alert = document.getElementById("messageAlertLogin");
                alert.innerHTML = response.message;
            }
        }
    });
}

function abreMenu(){
    checkMenu = $('#checkMenu').is(':checked');
    console.log(checkMenu);
    if (checkMenu){
        $('#menu').hide();
    }else{
        $('#menu').show();
    }
}