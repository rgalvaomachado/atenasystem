function login(){
    var metodo = $("#metodo").val();
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    $.ajax({
        method: "POST",
        url: "Controller/Controller.php",
        data: {
            metodo: metodo,
            usuario: usuario,
            senha: md5(senha),
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            window.location.assign(response.redirect);
        }
    });
}