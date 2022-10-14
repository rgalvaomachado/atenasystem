function menu(){
    checkMenu = $('#checkMenu').is(':checked');
    if (checkMenu){
        $('#menu').hide();
    }else{
        $('#menu').show();
    }
}

function cadRepresentante(){
    $(function(){
        $("#content").load("views/representante/criar.php");
    });
    menu();
}

function editRepresentante(){
    $(function(){
        $("#content").load("views/representante/editar.php");
    });
    menu();
}

function cadComissao(){
    $(function(){
        $("#content").load("views/comissao/criar.php");
    });
    menu();
}

function editComissao(){
    $(function(){
        $("#content").load("views/comissao/editar.php");
    });
    menu();
}

function cadMonitore(){
    $(function(){
        $("#content").load("views/monitore/criar.php");
    });
    menu();
}

function editMonitore(){
    $(function(){
        $("#content").load("views/monitore/editar.php");
    });
    menu();
}

function editPresencaMonitore(){
    $(function(){
        $("#content").load("views/monitore/presenca.php");
    });
    menu();
}

function cadAlune(){
    $(function(){
        $("#content").load("views/alune/criar.php");
    });
    menu();
}

function editAlune(){
    $(function(){
        $("#content").load("views/alune/editar.php");
    });
    menu();
}

function justificarAlune(){
    $(function(){
        $("#content").load("views/alune/justificar.php");
    });
    menu();
}

function cadDisciplina(){
    $(function(){
        $("#content").load("views/disciplina/criar.php");
    });
    menu();
}

function editDisciplina(){
    $(function(){
        $("#content").load("views/disciplina/editar.php");
    });
    menu();
}

function cadSala(){
    $(function(){
        $("#content").load("views/sala/criar.php");
    });
    menu();
}

function editSala(){
    $(function(){
        $("#content").load("views/sala/editar.php");
    });
    menu();
}

function cadTutore(){
    $(function(){
        $("#content").load("views/tutore/criar.php");
    });
    menu();
}

function editTutore(){
    $(function(){
        $("#content").load("views/tutore/editar.php");
    });
    menu();
}

function editPresencaTutore(){
    $(function(){
        $("#content").load("views/tutore/presenca.php");
    });
    menu();
}

function justificarTutore(){
    $(function(){
        $("#content").load("views/tutore/justificar.php");
    });
    menu();
}

function presencaAlune(){
    $(function(){
        $("#content").load("views/presenca/alune.php");
    });
    menu();
}

function presencaTutore(){
    $(function(){
        $("#content").load("views/presenca/tutore.php");
    });
    menu();
}

function presencaMonitore(){
    $(function(){
        $("#content").load("views/presenca/monitore.php");
    });
    menu();
}

function presencaReuniao(){
    $(function(){
        $("#content").load("views/presenca/reuniao.php");
    });
    menu();
}

function relatorioAlune(){
    $(function(){
        $("#content").load("views/relatorio/alune.php");
    });
    menu();
}

function relatorioTutore(){
    $(function(){
        $("#content").load("views/relatorio/tutore.php");
    });
    menu();
}

function relatorioMonitore(){
    $(function(){
        $("#content").load("views/relatorio/monitore.php");
    });
    menu();
}

function relatorioReuniao(){
    $(function(){
        $("#content").load("views/relatorio/reuniao.php");
    });
    menu();
}

function certificadoTutore(){
    $(function(){
        $("#content").load("views/certificado/tutore.php");
    });
    menu();
}

function certificadoMonitore(){
    $(function(){
        $("#content").load("views/certificado/monitore.php");
    });
    menu();
}

function logout(){
    $(function(){
        $.ajax({
            method: "POST",
            url: "src/Controller/Controller.php",
            data: {
                metodo: "logout",
            },
            complete: function(response) {
                var response = JSON.parse(response.responseText);
                if(response.access){
                    window.location.assign("");
                }
            }
        });
    });
}