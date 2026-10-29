<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="nav menu">
        <?php
            if(!isset($_SESSION)) {
                session_start();
            };
            
            if ($_SESSION['usuario'] == "") {
                session_destroy();
                header('location: /login');
            }
            if (!isset($_SESSION['CREATED'])) {
                $_SESSION['CREATED'] = time();
            } else if (time() - $_SESSION['CREATED'] > 1800) { // 30 minutos
                $_SESSION['usuario'] =  "";
                $_SESSION['modo'] = "";
                session_destroy();
                header('location: /login');
            }
            $uri = $_SERVER["REQUEST_URI"];
            $uri = explode('?', $uri)[0];
            $arquivo = trim($uri, '/');
        ?>
        <h1 id="espaco-menu"></h1>
        <?php if($_SESSION['modo'] == "representate") { ?>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-user-plus" aria-hidden="true"></em> Representante <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>   
            </a>
                <ul class="children collapse <?= $arquivo == 'representante' || $arquivo == 'representante/editar'? "in" : "" ?> " id="sub-item-1">
                    <li><a style=<?= $arquivo == "representante" ? "background-color:orange;" : "" ?> class="" href="/representante">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                    <li><a style=<?= $arquivo == "representante/editar" ? "background-color:orange;" : "" ?> class="" href="/representante/editar">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                </ul>
            </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate") { ?>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-address-book" aria-hidden="true"></em> Comissão de Faltas  <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse <?= $arquivo == 'comissao' || $arquivo == 'comissao/editar'? "in" : "" ?> " id="sub-item-2">
                    <li><a style=<?= $arquivo == "comissao" ? "background-color:orange;" : "" ?> class="" href="/comissao">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                    <li><a style=<?= $arquivo == "comissao/editar" ? "background-color:orange;" : "" ?> class="" href="/comissao/editar">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                </ul>
            </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate") { ?>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-3">
                <em class="fa fa-user-circle-o" aria-hidden="true"></em> Monitore <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse <?= $arquivo == 'monitore' || $arquivo == 'monitore/editar' || $arquivo == 'monitore/presenca' ? "in" : "" ?> " id="sub-item-3">
                    <li><a style=<?= $arquivo == "monitore" ? "background-color:orange;" : "" ?> class="" href="/monitore">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                    <li><a style=<?= $arquivo == "monitore/editar" ? "background-color:orange;" : "" ?> class="" href="/monitore/editar">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                    <li><a style=<?= $arquivo == "monitore/presenca" ? "background-color:orange;" : "" ?> class="" href="/monitore/presenca">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar Presença
                    </a></li>
                </ul>
            </li>
        <?php } ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
            <em class="fa fa-user-o" aria-hidden="true">&nbsp;</em> Tutore <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'tutore' || $arquivo == 'tutore/editar' || $arquivo == 'tutore/justificar' || $arquivo == 'tutore/presenca'? "in" : "" ?> " id="sub-item-4">
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "tutore" ? "background-color:orange;" : "" ?> class="" href="/tutore">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "tutore/editar" ? "background-color:orange;" : "" ?> class="" href="/tutore/editar">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "comissao") { ?>
                    <li><a style=<?= $arquivo == "tutore/justificar" ? "background-color:orange;" : "" ?> class="" href="/tutore/justificar">
                        <span class="fa fa-arrow-right">&nbsp;</span> Justificar Presença
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "tutore/presenca" ? "background-color:orange;" : "" ?> class="" href="/tutore/presenca">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar Presença
                    </a></li>
                <?php } ?>
            </ul>
        </li>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-5">
            <em class="fa fa-graduation-cap" aria-hidden="true">&nbsp;</em> Alune <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'alune' || $arquivo == 'alune/editar' || $arquivo == 'alune/justificar' ? "in" : "" ?>" id="sub-item-5">
                <li><a style=<?= $arquivo == "alune" ? "background-color:orange;" : "" ?> class="" href="/alune">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "alune/editar" ? "background-color:orange;" : "" ?> class="" href="/alune/editar">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
                <li><a style=<?= $arquivo == "alune/justificar" ? "background-color:orange;" : "" ?> class="" href="/alune/justificar">
                    <span class="fa fa-arrow-right">&nbsp;</span> Justificar Presença
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-6">
            <em class="fa fa-newspaper-o" aria-hidden="true">&nbsp;</em> Disciplina <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'disciplina' || $arquivo == 'disciplina/editar'? "in" : "" ?>" id="sub-item-6">
                <li><a style=<?= $arquivo == "disciplina" ? "background-color:orange;" : "" ?> class="" href="/disciplina">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "disciplina/editar" ? "background-color:orange;" : "" ?> class="" href="/disciplina/editar">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-7">
            <em class="fa fa-university" aria-hidden="true">&nbsp;</em> Sala <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'sala' || $arquivo == 'sala/editar'? "in" : "" ?>" id="sub-item-7">
                <li><a style=<?= $arquivo == "sala" ? "background-color:orange;" : "" ?> class="" href="/sala">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "sala/editar" ? "background-color:orange;" : "" ?> class="" href="/sala/editar">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-8">
            <em class="fa fa-calendar">&nbsp;</em> Presença <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'presenca' || $arquivo == 'presenca/tutore' || $arquivo == 'presenca/monitore' || $arquivo == 'presenca/reuniao' ? "in" : "" ?>" id="sub-item-8">
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "presenca" ? "background-color:orange;" : "" ?> class="" href="/presenca">
                        <span class="fa fa-arrow-right">&nbsp;</span> Aula Alune
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "presenca/tutore" ? "background-color:orange;" : "" ?> class="" href="/presenca/tutore">
                        <span class="fa fa-arrow-right">&nbsp;</span> Aula Tutore
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate") { ?>
                    <li><a style=<?= $arquivo == "presenca/monitore" ? "background-color:orange;" : "" ?> class="" href="/presenca/monitore">
                        <span class="fa fa-arrow-right">&nbsp;</span> Monitoria
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "comissao") { ?>
                    <li><a style=<?= $arquivo == "presenca/reuniao" ? "background-color:orange;" : "" ?> class="" href="/presenca/reuniao">
                        <span class="fa fa-arrow-right">&nbsp;</span> Reunião
                    </a></li>
                <?php } ?>
            </ul>
        </li>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-9">
            <em class="fa fa-file-pdf-o">&nbsp;</em> Certificado <span data-toggle="collapse" href="#sub-item-7" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'certificado/tutore' || $arquivo == 'certificado'? "in" : "" ?>" id="sub-item-9">
                <li><a style=<?= $arquivo == "certificado/tutore" ? "background-color:orange;" : "" ?> class="" href="/certificado/tutore">
                    <span class="fa fa-arrow-right">&nbsp;</span> Tutore
                </a></li>
                <li><a style=<?= $arquivo == "certificado" ? "background-color:orange;" : "" ?> class="" href="/certificado">
                    <span class="fa fa-arrow-right">&nbsp;</span> Monitore
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-10">
            <em class="fa fa-bar-chart">&nbsp;</em> Relatorio <span data-toggle="collapse" href="#sub-item-8" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $arquivo == 'relatorio' || $arquivo == 'relatorio/reuniao' || $arquivo == 'relatorio/monitore' || $arquivo == 'relatorio/tutore' ? "in" : "" ?>" id="sub-item-10">
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                <li><a style=<?= $arquivo == "relatorio" ? "background-color:orange;" : "" ?> class="" href="/relatorio">
                    <span class="fa fa-arrow-right">&nbsp;</span> Presença Alune
                </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "comissao") { ?>
                    <li><a style=<?= $arquivo == "relatorio/reuniao" ? "background-color:orange;" : "" ?> class="" href="/relatorio/reuniao">
                        <span class="fa fa-arrow-right">&nbsp;</span> Precença Reunião
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate") { ?>
                    <li><a style=<?= $arquivo == "relatorio/monitore" ? "background-color:orange;" : "" ?> class="" href="/relatorio/monitore">
                        <span class="fa fa-arrow-right">&nbsp;</span> Presença Monitore
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                <li><a style=<?= $arquivo == "relatorio/tutore" ? "background-color:orange;" : "" ?> class="" href="/relatorio/tutore">
                    <span class="fa fa-arrow-right">&nbsp;</span> Presença Tutore
                </a></li>
                <?php } ?>
            </ul>
        </li>
        <li><a onclick="logout()"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div>