function verificaPermissao(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "verificaLogin",
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if (response.access) {
                if (response.modo == 'representante'){
                    menuRepresentante();
                }
                if (response.modo == 'monitore'){
                    menuMonitore();
                }
                if (response.modo == 'comissao'){
                    menuComissao();
                }
            }
        }
    });
}

function menuRepresentante(){
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-user-plus" aria-hidden="true"></em>&nbsp;Representante</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Cadastro</a></li>
                <li><a href="#" onclick="editRepresentante()">Editar</a></li>
                <li><a href="#" onclick="assinaturaRepresentante()">Assinatura</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-address-book" aria-hidden="true"></em>&nbsp;Comissão</a>
            <ul>
                <li><a href="#" onclick="cadComissao()">Cadastro</a></li>
                <li><a href="#" onclick="editComissao()">Editar</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-user-circle-o" aria-hidden="true"></em>&nbsp;Monitore</a>
            <ul>
                <li><a href="#" onclick="cadMonitore()">Cadastro</a></li>
                <li><a href="#" onclick="editMonitore()">Editar</a></li>
                <li><a href="#" onclick="editPresencaMonitore()">Editar Presença</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-user-o" aria-hidden="true"></em>&nbsp;Tutore</a>
            <ul>
                <li><a href="#" onclick="cadTutore()">Cadastro</a></li>
                <li><a href="#" onclick="editTutore()">Editar</a></li>
                <li><a href="#" onclick="editPresencaTutore()">Editar Presença</a></li>
                <li><a href="#" onclick="justificarTutore()">Justificar Presença</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-graduation-cap" aria-hidden="true"></em>&nbsp;Alune</a>
            <ul>
                <li><a href="#" onclick="cadAlune()">Cadastro</a></li>
                <li><a href="#" onclick="editAlune()">Editar</a></li>
                <li><a href="#" onclick="justificarAlune()">Justificar Presença</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-newspaper-o" aria-hidden="true"></em>&nbsp;Disciplina</a>
            <ul>
                <li><a href="#" onclick="cadDisciplina()">Cadastro</a></li>
                <li><a href="#" onclick="editDisciplina()">Editar</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-university" aria-hidden="true"></em>&nbsp;Sala</a>
            <ul>
                <li><a href="#" onclick="cadSala()">Cadastro</a></li>
                <li><a href="#" onclick="editSala()">Editar</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-calendar"></em>&nbsp;Presença</a>
            <ul>
                <li><a href="#" onclick="presencaAlune()">Aula Alune</a></li>
                <li><a href="#" onclick="presencaTutore()">Aula Tutore</a></li>
                <li><a href="#" onclick="presencaMonitore()">Monitore</a></li>
                <li><a href="#" onclick="presencaReuniao()">Reunião</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-bar-chart"></em>&nbsp;Relatorio</a>
            <ul>
                <li><a href="#" onclick="relatorioAlune()">Presença Alune</a></li>
                <li><a href="#" onclick="relatorioReuniao()">Presença Reunião</a></li>
                <li><a href="#" onclick="relatorioMonitore()">Presença Monitore</a></li>
                <li><a href="#" onclick="relatorioTutore()">Presença Tutore</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-file-pdf-o"></em>&nbsp;Certificado</a>
            <ul>
                <li><a href="#" onclick="certificadoTutore()">Tutore</a></li>
                <li><a href="#" onclick="certificadoMonitore()">Monitore</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#" onclick="logout()"><em class="fa fa-power-off"></em>&nbsp;Logout</a></li>
    `);
}

function menuMonitore(){
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-user-o" aria-hidden="true"></em>&nbsp;Tutore</a>
            <ul>
                <li><a href="#" onclick="cadTutore()">Cadastro</a></li>
                <li><a href="#" onclick="editTutore()">Editar</a></li>
                <li><a href="#" onclick="editPresencaTutore()">Editar Presença</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-graduation-cap" aria-hidden="true"></em>&nbsp;Alune</a>
            <ul>
                <li><a href="#" onclick="cadAlune()">Cadastro</a></li>
                <li><a href="#" onclick="editAlune()">Editar</a></li>
                <li><a href="#" onclick="justificarAlune()">Justificar Presença</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-newspaper-o" aria-hidden="true"></em>&nbsp;Disciplina</a>
            <ul>
                <li><a href="#" onclick="cadDisciplina()">Cadastro</a></li>
                <li><a href="#" onclick="editDisciplina()">Editar</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-university" aria-hidden="true"></em>&nbsp;Sala</a>
            <ul>
                <li><a href="#" onclick="cadSala()">Cadastro</a></li>
                <li><a href="#" onclick="editSala()">Editar</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-calendar"></em>&nbsp;Presença</a>
            <ul>
                <li><a href="#" onclick="presencaAlune()">Aula Alune</a></li>
                <li><a href="#" onclick="presencaTutore()">Aula Tutore</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-bar-chart"></em>&nbsp;Relatorio</a>
            <ul>
                <li><a href="#" onclick="relatorioAlune()">Presença Alune</a></li>
                <li><a href="#" onclick="relatorioTutore()">Presença Tutore</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-file-pdf-o"></em>&nbsp;Certificado</a>
            <ul>
                <li><a href="#" onclick="certificadoTutore()">Tutore</a></li>
                <li><a href="#" onclick="certificadoMonitore()">Monitore</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#" onclick="logout()"><em class="fa fa-power-off"></em>&nbsp;Logout</a></li>
    `);
}

function menuComissao(){
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-user-o" aria-hidden="true"></em>&nbsp;Tutore</a>
            <ul>
                <li><a href="#" onclick="justificarTutore()">Justificar Presença</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-calendar"></em>&nbsp;Presença</a>
            <ul>
                <li><a href="#" onclick="presencaReuniao()">Reunião</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#"><em class="fa fa-bar-chart"></em>&nbsp;Relatorio</a>
            <ul>
                <li><a href="#" onclick="relatorioReuniao()">Presença Reunião</a></li>
            </ul>
        </li>
    `);
    $('#listMenu').append(`
        <li><a href="#" onclick="logout()"><em class="fa fa-power-off"></em>&nbsp;Logout</a></li>
    `);
}

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

function assinaturaRepresentante(){
    $(function(){
        $("#content").load("views/representante/assinatura.php");
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