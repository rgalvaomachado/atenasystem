function start(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "verificaLogin",
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if (response.access) {
                $(function(){
                    $("#content0").load("views/home/index.php"); 
                });
            } else {
                $(function(){
                    $("#content0").load("views/login/index.php"); 
                });
            }
        }
    });
}