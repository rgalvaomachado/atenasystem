function login(){
    var usuario = $("#usuarioLogin").val();
    var senha = $("#senhaLogin").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
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