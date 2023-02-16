function start(){
    $.ajax({
        method: "POST",
        url: "controller/Controller.php",
        data: {
            metodo: "verificaLogin",
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if (response.access) {
                $(function(){
                    $("#content0").load("view/home/index.html"); 
                });
            } else {
                $(function(){
                    $("#content0").load("view/login/index.html"); 
                });
            }
        }
    });
}