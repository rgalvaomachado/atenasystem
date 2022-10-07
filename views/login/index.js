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
            if(response.access){
                window.location.assign("")
            }else{
                const alert = document.getElementById("messageAlertLogin");
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}