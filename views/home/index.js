function verificaSessão(){
    $.ajax({
        method: "POST",
        url: "src/Controller/Controller.php",
        data: {
            metodo: "verificaSessão",
        },
        complete: function(response) {
            var response = JSON.parse(response.responseText);
            if (!response.access) {
                window.location.assign("")
            }
        }
    });
}

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
        <li>
            <input type="checkbox" id="representanteMenu" class="subMenu"/>
            <label for="representanteMenu">
                <em class="fa fa-user-plus" aria-hidden="true"></em>&nbsp;Representante
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="cadRepresentante()"><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick="editRepresentante()"><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                <li><a href="#" onclick="assinaturaRepresentante()"><em class="fa fa-arrow-right">&nbsp;</em>Assinatura</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="comissaoMenu" class="subMenu"/>
            <label for="comissaoMenu">
                <em class="fa fa-address-book" aria-hidden="true"></em>&nbsp;Comissão
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="cadComissao()"><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick="editComissao()"><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="monitoreMenu" class="subMenu"/>
            <label for="monitoreMenu">
                <em class="fa fa-user-circle-o" aria-hidden="true"></em>&nbsp;Monitore
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="cadMonitore()"><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick="editMonitore()"><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                <li><a href="#" onclick="editPresencaMonitore()"><em class="fa fa-arrow-right">&nbsp;</em>Editar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="tutoreMenu" class="subMenu"/>
            <label for="tutoreMenu">
                <em class="fa fa-user-o" aria-hidden="true"></em>&nbsp;Tutore
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="cadTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick="editTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                <li><a href="#" onclick="editPresencaTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Editar Presença</a></li>
                <li><a href="#" onclick="justificarTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Justificar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="aluneMenu" class="subMenu"/>
            <label for="aluneMenu">
                <em class="fa fa-graduation-cap" aria-hidden="true"></em>&nbsp;Alune
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="cadAlune()"><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick="editAlune()"><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                <li><a href="#" onclick="justificarAlune()"><em class="fa fa-arrow-right">&nbsp;</em>Justificar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="disciplinaMenu" class="subMenu"/>
            <label for="disciplinaMenu">
                <em class="fa fa-newspaper-o" aria-hidden="true"></em>&nbsp;Disciplina
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="cadDisciplina()"><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick="editDisciplina()"><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="salaMenu" class="subMenu"/>
            <label for="salaMenu">
                <em class="fa fa-university" aria-hidden="true"></em>&nbsp;Sala
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="cadSala()"><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick="editSala()"><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="presencaMenu" class="subMenu"/>
            <label for="presencaMenu">
                <em class="fa fa-calendar"></em>&nbsp;Presença
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="presencaAlune()"><em class="fa fa-arrow-right">&nbsp;</em>Aula Alune</a></li>
                <li><a href="#" onclick="presencaTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Aula Tutore</a></li>
                <li><a href="#" onclick="presencaMonitore()"><em class="fa fa-arrow-right">&nbsp;</em>Monitore</a></li>
                <li><a href="#" onclick="presencaReuniao()"><em class="fa fa-arrow-right">&nbsp;</em>Reunião</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="relatorioMenu" class="subMenu"/>
            <label for="relatorioMenu">
                <em class="fa fa-bar-chart"></em>&nbsp;Relatorio
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="relatorioAlune()"><em class="fa fa-arrow-right">&nbsp;</em>Presença Alune</a></li>
                <li><a href="#" onclick="relatorioReuniao()"><em class="fa fa-arrow-right">&nbsp;</em>Presença Reunião</a></li>
                <li><a href="#" onclick="relatorioMonitore()"><em class="fa fa-arrow-right">&nbsp;</em>Presença Monitore</a></li>
                <li><a href="#" onclick="relatorioTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Presença Tutore</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="certificadoMenu" class="subMenu"/>
            <label for="certificadoMenu">
                <em class="fa fa-file-pdf-o"></em>&nbsp;Certificado
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="certificadoTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Tutore</a></li>
                <li><a href="#" onclick="certificadoMonitore()"><em class="fa fa-arrow-right">&nbsp;</em>Monitore</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="logoutMenu" class="subMenu"/>
            <label onclick="logout()">
                <em class="fa fa-power-off"></em>&nbsp;Logout
            </label>
        </li>
    `);
}

function menuMonitore(){
    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="tutoreMenu" class="subMenu"/>
            <label for="tutoreMenu">
                <em class="fa fa-user-o" aria-hidden="true"></em>&nbsp;Tutore
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="cadTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick="editTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                <li><a href="#" onclick="editPresencaTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Editar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="aluneMenu" class="subMenu"/>
            <label for="aluneMenu">
                <em class="fa fa-graduation-cap" aria-hidden="true"></em>&nbsp;Alune
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="cadAlune()"><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick="editAlune()"><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
                <li><a href="#" onclick="justificarAlune()"><em class="fa fa-arrow-right">&nbsp;</em>Justificar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="disciplinaMenu" class="subMenu"/>
            <label for="disciplinaMenu">
                <em class="fa fa-newspaper-o" aria-hidden="true"></em>&nbsp;Disciplina
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="cadDisciplina()"><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick="editDisciplina()"><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="salaMenu" class="subMenu"/>
            <label for="salaMenu">
                <em class="fa fa-university" aria-hidden="true"></em>&nbsp;Sala
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="cadSala()"><em class="fa fa-arrow-right">&nbsp;</em>Cadastro</a></li>
                <li><a href="#" onclick="editSala()"><em class="fa fa-arrow-right">&nbsp;</em>Editar</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="presencaMenu" class="subMenu"/>
            <label for="presencaMenu">
                <em class="fa fa-calendar"></em>&nbsp;Presença
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="presencaAlune()"><em class="fa fa-arrow-right">&nbsp;</em>Aula Alune</a></li>
                <li><a href="#" onclick="presencaTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Aula Tutore</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="relatorioMenu" class="subMenu"/>
            <label for="relatorioMenu">
                <em class="fa fa-bar-chart"></em>&nbsp;Relatorio
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="relatorioAlune()"><em class="fa fa-arrow-right">&nbsp;</em>Presença Alune</a></li>
                <li><a href="#" onclick="relatorioTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Presença Tutore</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="certificadoMenu" class="subMenu"/>
            <label for="certificadoMenu">
                <em class="fa fa-file-pdf-o"></em>&nbsp;Certificado
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="certificadoTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Tutore</a></li>
                <li><a href="#" onclick="certificadoMonitore()"><em class="fa fa-arrow-right">&nbsp;</em>Monitore</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="logoutMenu" class="subMenu"/>
            <label onclick="logout()">
                <em class="fa fa-power-off"></em>&nbsp;Logout
            </label>
        </li>
    `);
}

function menuComissao(){
    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="tutoreMenu" class="subMenu"/>
            <label for="tutoreMenu">
                <em class="fa fa-user-o" aria-hidden="true"></em>&nbsp;Tutore
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="justificarTutore()"><em class="fa fa-arrow-right">&nbsp;</em>Justificar Presença</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="presencaMenu" class="subMenu"/>
            <label for="presencaMenu">
                <em class="fa fa-calendar"></em>&nbsp;Presença
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="presencaReuniao()"><em class="fa fa-arrow-right">&nbsp;</em>Reunião</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="relatorioMenu" class="subMenu"/>
            <label for="relatorioMenu">
                <em class="fa fa-bar-chart"></em>&nbsp;Relatorio
                <em class="fa fa-plus"></em>
            </label>
            <ul>
                <li><a href="#" onclick="relatorioReuniao()"><em class="fa fa-arrow-right">&nbsp;</em>Presença Reunião</a></li>
            </ul>
        </li>
    `);

    $('#listMenu').append(`
        <li>
            <input type="checkbox" id="logoutMenu" class="subMenu"/>
            <label onclick="logout()">
                <em class="fa fa-power-off"></em>&nbsp;Logout
            </label>
        </li>
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