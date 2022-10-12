function criar(){
    var nome = $("#nome").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "criarSala",
            nome: nome,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if(response.access){
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("views/sala/criar.php");
                    });
                }, 1000);
            }else{
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}

function buscar(){
    var id = $("#sala").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getSala",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $('#nome').val(response.sala.nome);
            }
        }
    });
}

function editar(){
    var id = $("#sala").val();
    var nome = $("#nome").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "salvarSala",
            id: id,
            nome: nome,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if(response.access){
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("views/sala/editar.php");
                    });
                }, 1000);
            }else{
                alert.style.color = "red";
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 2000);
            }
        }
    });
}

function excluir(){
    if (confirm("Voce realmente deseja excluir?")){
        var id = $("#sala").val();
        $.ajax({
            method: "POST",
            url: "src/Controller/Controller.php",
            data: {
                metodo: "excluirSala",
                id: id,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                if(response.access){
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
                        $(function(){
                            $("#content").load("views/sala/editar.php");
                        });
                    }, 1000);
                }else{
                    alert.style.color = "red";
                    setTimeout(function(){
                        alert.innerHTML = "";
                    }, 2000);
                }
            }
        });
    }
}

function buscarSalas(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getSalas",
        },
        complete: function(response) {
            var salas = JSON.parse(response.responseText);
            salas.map(({id,nome}) => {
                $('#sala').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
}