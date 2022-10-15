function buscar(){
    var id = $("#representante").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getRepresentante",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $('#nome').val(response.representante.nome);
                $('#usuario').val(response.representante.usuario);
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
            metodo: "criarRepresentante",
            nome: nome,
            usuario: usuario,
            senha: senha,
            assinatura: assinatura,
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
                        $("#content").load("views/representante/criar.php");
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
    var id = $("#representante").val();
    var nome = $("#nome").val();
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();
    var assinatura = $("#assinatura").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
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
            const alert = document.getElementById("messageAlert");
            alert.innerHTML = response.message;
            if(response.access){
                alert.style.color = "green";
                setTimeout(function(){
                    alert.innerHTML = "";
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
        var id = $("#representante").val();
        $.ajax({
            method: "POST",
            url: "src/Controller/Controller.php",
            data: {
                metodo: "excluirRepresentante",
                id: id,
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                const alert = document.getElementById("messageAlert");
                alert.innerHTML = response.message;
                setTimeout(function(){
                    alert.innerHTML = "";
                }, 3000);
                if(response.access){
                    alert.style.color = "green";
                    setTimeout(function(){
                        alert.innerHTML = "";
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

function buscarRepresentantes(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
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
}

function buscarAssinatura(){
    var id = $("#representante").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getRepresentante",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                if(response.representante.assinatura){
                    var srcData = response.representante.assinatura;
                    var newImage = document.createElement('img');
                    newImage.src = srcData;
                    newImage.id = "imgAssinaturaRepresentante";
                    newImage.style.maxWidth = "100%";
                    newImage.style.maxHeight = "100%";
                    document.getElementById("assinaturaRepresentante").innerHTML = newImage.outerHTML;
                }else{
                    $('#assinaturaRepresentante').height(0);
                    document.getElementById("assinaturaRepresentante").innerHTML = 'Não há assinatura';
                }
            }
        }
    });
}

function salvarAssinatura() {
    var id = $("#representante").val();
    var filesSelected = document.getElementById("assinatura").files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoadedEvent) {
        var assinatura = fileLoadedEvent.target.result
        $.ajax({
            method: "POST",
            url: "src/Controller/Controller.php",
            data: {
                metodo: "salvaAssinaturaRepresentante",
                assinatura: assinatura,
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
                            $("#content").load("views/representante/assinatura.php");
                        });
                    }, 1000);
                }
            }
        });
      }
      fileReader.readAsDataURL(fileToLoad);
    }
}