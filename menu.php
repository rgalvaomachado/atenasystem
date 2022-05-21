<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="nav menu">
        <?php
            session_start();
            
            if ($_SESSION['usuario'] == "") {
                session_destroy();
                header('location:../index.php');
            }
            if (!isset($_SESSION['CREATED'])) {
                $_SESSION['CREATED'] = time();
            } else if (time() - $_SESSION['CREATED'] > 1800) { // 30 minutos
                $_SESSION['usuario'] =  "";
                $_SESSION['modo'] = "";
                session_destroy();
            }

            $uri = $_SERVER["REQUEST_URI"];
            $parametros = explode('/',$uri);
            $menu = isset($parametros[1]) ? $parametros[1] : "" ;
            $item = isset($parametros[2]) ? $parametros[2] : "" ;
            $item = explode('?',$item);
            $arquivo = $item[0];
        ?>
        <h1 id="espaco-menu"></h1>
        <?php if($_SESSION['modo'] == "admin") { ?>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-user-circle-o" aria-hidden="true"></em> Monitore <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse <?= $menu == "monitore" ? "in" : "" ?> " id="sub-item-1">
                    <li><a style=<?= $arquivo == "cadMonitore.php" ? "background-color:orange;" : "" ?> class="" href="\monitore\cadMonitore.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                    <li><a style=<?= $arquivo == "editMonitore.php" ? "background-color:orange;" : "" ?> class="" href="\monitore\editMonitore.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                </ul>
            </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "admin" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
            <em class="fa fa-user-o" aria-hidden="true">&nbsp;</em> Tutore <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse<?= $menu == "tutore" ? "in" : "" ?> " id="sub-item-2">
                <li><a style=<?= $arquivo == "cadTutore.php" ? "background-color:orange;" : "" ?> class="" href="\tutore\cadTutore.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "editTutore.php" ? "background-color:orange;" : "" ?> class="" href="\tutore\editTutore.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
                <li><a style=<?= $arquivo == "justificarTutorePresenca.php" ? "background-color:orange;" : "" ?> class="" href="\tutore\justificarTutorePresenca.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Justificar Presença
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "admin" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
            <em class="fa fa-graduation-cap" aria-hidden="true">&nbsp;</em> Alune <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $menu == "alune" ? "in" : "" ?>" id="sub-item-3">
                <li><a style=<?= $arquivo == "cadAlune.php" ? "background-color:orange;" : "" ?> class="" href="\alune\cadAlune.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "editAlune.php" ? "background-color:orange;" : "" ?> class="" href="\alune\editAlune.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
                <li><a style=<?= $arquivo == "justificarAlunePresenca.php" ? "background-color:orange;" : "" ?> class="" href="\alune\justificarAlunePresenca.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Justificar Presença
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "admin" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
            <em class="fa fa-newspaper-o" aria-hidden="true">&nbsp;</em> Disciplina <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $menu == "disciplina" ? "in" : "" ?>" id="sub-item-4">
                <li><a style=<?= $arquivo == "cadDisciplina.php" ? "background-color:orange;" : "" ?> class="" href="\disciplina\cadDisciplina.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "editDisciplina.php" ? "background-color:orange;" : "" ?> class="" href="\disciplina\editDisciplina.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "admin" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-5">
            <em class="fa fa-university" aria-hidden="true">&nbsp;</em> Sala <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $menu == "sala" ? "in" : "" ?>" id="sub-item-5">
                <li><a style=<?= $arquivo == "cadSala.php" ? "background-color:orange;" : "" ?> class="" href="\sala\cadSala.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "editSala.php" ? "background-color:orange;" : "" ?> class="" href="\sala\editSala.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-6">
            <em class="fa fa-calendar">&nbsp;</em> Presença <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $menu == "presenca" ? "in" : "" ?>" id="sub-item-6">
                <?php if($_SESSION['modo'] == "admin" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "presenAlune.php" ? "background-color:orange;" : "" ?> class="" href="\presenca\presenAlune.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Aula Alune
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "admin" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "presenTutore.php" ? "background-color:orange;" : "" ?> class="" href="\presenca\presenTutore.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Aula Tutore
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "admin") { ?>
                    <li><a style=<?= $arquivo == "presenMonitore.php" ? "background-color:orange;" : "" ?> class="" href="\presenca\presenMonitore.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Monitoria
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "admin" || $_SESSION['modo'] == "comicao") { ?>
                    <li><a style=<?= $arquivo == "presenReuniao.php" ? "background-color:orange;" : "" ?> class="" href="\presenca\presenReuniao.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Reunião
                    </a></li>
                <?php } ?>
            </ul>
        </li>
        <?php if($_SESSION['modo'] == "admin" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-7">
            <em class="fa fa-file-pdf-o">&nbsp;</em> Certificado <span data-toggle="collapse" href="#sub-item-7" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $menu == "certificado" ? "in" : "" ?>" id="sub-item-7">
                <li><a style=<?= $arquivo == "certTutore.php" ? "background-color:orange;" : "" ?> class="" href="\certificado\certTutore.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Tutore
                </a></li>
                <li><a style=<?= $arquivo == "certMonitore.php" ? "background-color:orange;" : "" ?> class="" href="\certificado\certMonitore.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Monitore
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-8">
            <em class="fa fa-bar-chart">&nbsp;</em> Relatorio <span data-toggle="collapse" href="#sub-item-8" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= $menu == "relatorio" ? "in" : "" ?>" id="sub-item-8">
                <?php if($_SESSION['modo'] == "admin" || $_SESSION['modo'] == "monitore") { ?>
                <li><a style=<?= $arquivo == "relAlune.php" ? "background-color:orange;" : "" ?> class="" href="\relatorio\relAlune.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Presença Alune
                </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "admin" || $_SESSION['modo'] == "comicao") { ?>
                    <li><a style=<?= $arquivo == "relReuniao.php" ? "background-color:orange;" : "" ?> class="" href="\relatorio\relReuniao.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Precença Reunião
                    </a></li>
                <?php } ?>
            </ul>
        </li>
        <li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div>