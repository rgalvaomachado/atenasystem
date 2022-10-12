function criar(){
    var nome = $("#nome").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "criarDisciplina",
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
                        $("#content").load("views/disciplina/criar.php");
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
    var id = $("#disciplina").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getDisciplina",
            id: id,
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if(response.access){
                $('#detalhes').show();
                $('#nome').val(response.disciplina.nome);
            }
        }
    });
}

function editar(){
    var id = $("#disciplina").val();
    var nome = $("#nome").val();
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "salvarDisciplina",
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
                        $("#content").load("views/disciplina/editar.php");
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
        var id = $("#disciplina").val();
        $.ajax({
            method: "POST",
            url: "src/Controller/Controller.php",
            data: {
                metodo: "excluirDisciplina",
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
                            $("#content").load("views/disciplina/editar.php");
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

function buscarDisciplinas(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "getDisciplinas",
        },
        complete: function(response) {
            var disciplinas = JSON.parse(response.responseText);
            disciplinas.map(({id,nome}) => {
                $('#disciplina').append(`<option value='${id}'>${nome}</option>`);
            });
           
        }
    });
}