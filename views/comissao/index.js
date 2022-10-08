function buscar(){
    var id = $("#comissao").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getComissao",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $('#nome').val(response.comissao.nome);
                $('#usuario').val(response.comissao.usuario);
            }
        }
    });
}

function criar(){
    var nome = $("#nome").val();
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    var assinatura = $("#assinatura").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "criarComissao",
            nome: nome,
            usuario: usuario,
            senha: senha,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlertRepresentante");
            alert.innerHTML = response.message;
            if(response.access){
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $(function(){
                        $("#content").load("views/comissao/criar.php");
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

function editar(){
    var id = $("#comissao").val();
    var nome = $("#nome").val();
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "salvarComissao",
            id: id,
            nome: nome,
            usuario: usuario,
            senha: senha,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if(response.access){
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
                    $.ajax({
                        method: "POST",
                        url: "src/Controller/Controller.php",
                        data: {
                            metodo: "getComissoes",
                        },
                        complete: function(response) {
                            var comissao = JSON.parse(response.responseText);
                            comissao.map(({id,nome}) => {
                                $('#comissao').append(`<option value='${id}'>${nome}</option>`);
                            });
                           
                        }
                    });
                    $(function(){
                        $("#content").load("views/representante/editar.php");
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
        var id = $("#comissao").val();
        $.ajax({
            method: "POST",
            url: "src/Controller/Controller.php",
            data: {
                metodo: "excluirComissao",
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
                        $.ajax({
                            method: "POST",
                            url: "src/Controller/Controller.php",
                            data: {
                                metodo: "getComissoes",
                            },
                            complete: function(response) {
                                var comissao = JSON.parse(response.responseText);
                                comissao.map(({id,nome}) => {
                                    $('#comissao').append(`<option value='${id}'>${nome}</option>`);
                                });
                               
                            }
                        });
                        $(function(){
                            $("#content").load("views/representante/editar.php");
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