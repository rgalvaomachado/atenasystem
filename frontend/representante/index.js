function abrirCriar(){
    $(function(){
        $("#content2").load("frontend/representante/criar.php");
    });
}

function criar(){
    var nome = $("#nome").val();
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    var assinatura = $("#assinatura").val();
    $.ajax({
        method: "POST",
        url: "backend/Controller/Controller.php",
        data: {
            metodo: "criarRepresentante",
            nome: nome,
            usuario: usuario,
            senha: senha,
            assinatura: assinatura,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            let alert = document.getElementById("messageAlertRepresentante");
            console.log(alert);
            alert.innerHTML = response.message;
            setTimeout(function(){
                alert.innerHTML = "";
            }, 3000);
        }
    });
}

function abrirEditar(){
    $.ajax({
        method: "POST",
        url: "backend/Controller/Controller.php",
        data: {
            metodo: "getRepresentantes",
        },
        complete: function(response) {
            var representantes = JSON.parse(response.responseText);
            representantes.map(({id,nome}) => {
                $('#representante').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
    $(function(){
        $("#content2").load("frontend/representante/editar.php");
    });
}

function buscar(){
    var id = $("#representante").val();
    $.ajax({
        method: "POST",
        url: "backend/Controller/Controller.php",
        data: {
            metodo: "getRepresentante",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            console.log(response);
            if(response.access){
                $('#detalhes').show();
                $('#nome').val(response.representante.nome);
                $('#usuario').val(response.representante.usuario);
            }
        }
    });
}

function editar(){
    var id = $("#representante").val();
    var nome = $("#nome").val();
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    var assinatura = $("#assinatura").val();
    $.ajax({
        method: "POST",
        url: "backend/Controller/Controller.php",
        data: {
            metodo: "salvarRepresentante",
            id: id,
            nome: nome,
            usuario: usuario,
            senha: senha,
            assinatura: assinatura,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlertRepresentante");
            alert.innerHTML = response.message;
            setTimeout(function(){
                alert.innerHTML = "";
            }, 3000);
            if(response.access){
                abrirEditar();
            } 
        }
    });
    
}

function excluir(){
    if (confirm("Voce realmente deseja excluir?")){
        var id = $("#representante").val();
        $.ajax({
            method: "POST",
            url: "backend/Controller/Controller.php",
            data: {
                metodo: "excluirRepresentante",
                id: id,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlertRepresentante");
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 3000);
                if(response.access){
                    abrirEditar();
                }
            }
        });
    }
}