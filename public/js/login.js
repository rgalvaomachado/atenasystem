function login(){
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    $.ajax({
        method: "POST",
        url: "/api/login",
        data: {
            usuario: usuario,
            senha: md5(senha),
        },
        success: function(response) {
            window.location.assign(response.redirect);
        },
        error: function() {
            alert("Erro ao conectar ao servidor.");
        }
    });
}

function logout(){
    $.ajax({
        method: "POST",
        url: "/api/logout",
        success: function(response) {
            window.location.assign(response.redirect);
        },
        error: function() {
            window.location.assign('/login');
        }
    });
}