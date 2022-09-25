function representante(){
    $(function(){
        $("#content").load("frontend/representante/index.php"); 
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
                $('#login').hide();
                $('#menu').show();
                $('#content').show();
            } else {
                $('#login').show();
                $('#menu').hide();
                $('#content').hide();
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
                $('#login').hide();
                $('#menu').show();
                $('#content').show();
            }else{
                const alert = document.getElementById("messageAlertLogin");
                alert.innerHTML = response.message;
            }
        }
    });
}