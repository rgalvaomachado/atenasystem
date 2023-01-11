<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="nav menu">
        <?php
            session_start();
            if ($_SESSION['usuario'] == "") {
                session_destroy();
                header('location: index.php');
            }
            if (!isset($_SESSION['CREATED'])) {
                $_SESSION['CREATED'] = time();
            } else if (time() - $_SESSION['CREATED'] > 1800) { // 30 minutos
                $_SESSION['usuario'] =  "";
                $_SESSION['modo'] = "";
                session_destroy();
                header('location: index.php');
            }
            $uri = $_SERVER["REQUEST_URI"];
            $parametros = explode('/',$uri);
            if ($parametros[1] == 'atenasystem') {
                $menu = isset($parametros[2]) ? $parametros[2] : "" ;
            } else {
                $menu = isset($parametros[1]) ? $parametros[1] : "" ;
            }
            $menu = explode('?',$menu);
            $arquivo = $menu[0];
        ?>
        <h1 id="espaco-menu"></h1>
        <?php if($_SESSION['modo'] == "representate") { ?>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-user-plus" aria-hidden="true"></em> Representante <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>   
            </a>
                <ul class="children collapse <?= str_contains($arquivo, 'Representante') ? "in" : "" ?> " id="sub-item-1">
                    <li><a style=<?= $arquivo == "RepresentanteCadastro.php" ? "background-color:orange;" : "" ?> class="" href="RepresentanteCadastro.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                    <li><a style=<?= $arquivo == "RepresentanteEditar.php" ? "background-color:orange;" : "" ?> class="" href="RepresentanteEditar.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                </ul>
            </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate") { ?>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-address-book" aria-hidden="true"></em> Comissão de Faltas  <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse <?= str_contains($arquivo, "Comissao") ? "in" : "" ?> " id="sub-item-2">
                    <li><a style=<?= $arquivo == "ComissaoCadastro.php" ? "background-color:orange;" : "" ?> class="" href="ComissaoCadastro.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                    <li><a style=<?= $arquivo == "ComissaoEditar.php" ? "background-color:orange;" : "" ?> class="" href="ComissaoEditar.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                </ul>
            </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate") { ?>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-3">
                <em class="fa fa-user-circle-o" aria-hidden="true"></em> Monitore <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse <?= str_contains($arquivo, "Monitore") ? "in" : "" ?> " id="sub-item-3">
                    <li><a style=<?= $arquivo == "MonitoreCadastro.php" ? "background-color:orange;" : "" ?> class="" href="MonitoreCadastro.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                    <li><a style=<?= $arquivo == "MonitoreEditar.php" ? "background-color:orange;" : "" ?> class="" href="MonitoreEditar.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                    <li><a style=<?= $arquivo == "MonitoreEditarPresenca.php" ? "background-color:orange;" : "" ?> class="" href="MonitoreEditarPresenca.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar Presença
                    </a></li>
                </ul>
            </li>
        <?php } ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
            <em class="fa fa-user-o" aria-hidden="true">&nbsp;</em> Tutore <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse<?= str_contains($arquivo, "Tutore") ? "in" : "" ?> " id="sub-item-4">
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "TutoreCadastro.php" ? "background-color:orange;" : "" ?> class="" href="TutoreCadastro.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "TutoreEditar.php" ? "background-color:orange;" : "" ?> class="" href="TutoreEditar.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "comissao") { ?>
                    <li><a style=<?= $arquivo == "TutoreJustificarPresenca.php" ? "background-color:orange;" : "" ?> class="" href="TutoreJustificarPresenca.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Justificar Presença
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "TutoreEditarPresenca.php" ? "background-color:orange;" : "" ?> class="" href="TutoreEditarPresenca.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Editar Presença
                    </a></li>
                <?php } ?>
            </ul>
        </li>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-5">
            <em class="fa fa-graduation-cap" aria-hidden="true">&nbsp;</em> Alune <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= str_contains($arquivo, "Alune") ? "in" : "" ?>" id="sub-item-5">
                <li><a style=<?= $arquivo == "AluneCadastro.php" ? "background-color:orange;" : "" ?> class="" href="AluneCadastro.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "AluneEditar.php" ? "background-color:orange;" : "" ?> class="" href="AluneEditar.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
                <li><a style=<?= $arquivo == "AluneJustificarPresenca.php" ? "background-color:orange;" : "" ?> class="" href="AluneJustificarPresenca.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Justificar Presença
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-6">
            <em class="fa fa-newspaper-o" aria-hidden="true">&nbsp;</em> Disciplina <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= str_contains($arquivo, "Disciplina") ? "in" : "" ?>" id="sub-item-6">
                <li><a style=<?= $arquivo == "DisciplinaCadastro.php" ? "background-color:orange;" : "" ?> class="" href="DisciplinaCadastro.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "DisciplinaEditar.php" ? "background-color:orange;" : "" ?> class="" href="DisciplinaEditar.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-7">
            <em class="fa fa-university" aria-hidden="true">&nbsp;</em> Sala <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= str_contains($arquivo, "Sala") ? "in" : "" ?>" id="sub-item-7">
                <li><a style=<?= $arquivo == "SalaCadastro.php" ? "background-color:orange;" : "" ?> class="" href="SalaCadastro.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Cadastro
                </a></li>
                <li><a style=<?= $arquivo == "SalaEditar.php" ? "background-color:orange;" : "" ?> class="" href="SalaEditar.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Editar
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-8">
            <em class="fa fa-calendar">&nbsp;</em> Presença <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= str_contains($arquivo, "PresencaCadastro") ? "in" : "" ?>" id="sub-item-8">
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "PresencaCadastroA.php" ? "background-color:orange;" : "" ?> class="" href="PresencaCadastroA.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Aula Alune
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                    <li><a style=<?= $arquivo == "PresencaCadastroT.php" ? "background-color:orange;" : "" ?> class="" href="PresencaCadastroT.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Aula Tutore
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate") { ?>
                    <li><a style=<?= $arquivo == "PresencaCadastroM.php" ? "background-color:orange;" : "" ?> class="" href="PresencaCadastroM.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Monitoria
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "comissao") { ?>
                    <li><a style=<?= $arquivo == "PresencaCadastroReuniao.php" ? "background-color:orange;" : "" ?> class="" href="PresencaCadastroReuniao.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Reunião
                    </a></li>
                <?php } ?>
            </ul>
        </li>
        <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-9">
            <em class="fa fa-file-pdf-o">&nbsp;</em> Certificado <span data-toggle="collapse" href="#sub-item-7" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= str_contains($arquivo, "Certificado") ? "in" : "" ?>" id="sub-item-9">
                <li><a style=<?= $arquivo == "CertificadoT.php" ? "background-color:orange;" : "" ?> class="" href="CertificadoT.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Tutore
                </a></li>
                <li><a style=<?= $arquivo == "CertificadoM.php" ? "background-color:orange;" : "" ?> class="" href="CertificadoM.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Monitore
                </a></li>
            </ul>
        </li>
        <?php } ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-10">
            <em class="fa fa-bar-chart">&nbsp;</em> Relatorio <span data-toggle="collapse" href="#sub-item-8" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse <?= str_contains($arquivo, "Relatorio") ? "in" : "" ?>" id="sub-item-10">
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                <li><a style=<?= $arquivo == "RelatorioA.php" ? "background-color:orange;" : "" ?> class="" href="RelatorioA.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Presença Alune
                </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "comissao") { ?>
                    <li><a style=<?= $arquivo == "RelatorioReuniao.php" ? "background-color:orange;" : "" ?> class="" href="RelatorioReuniao.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Precença Reunião
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate") { ?>
                    <li><a style=<?= $arquivo == "RelatorioM.php" ? "background-color:orange;" : "" ?> class="" href="RelatorioM.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Presença Monitore
                    </a></li>
                <?php } ?>
                <?php if($_SESSION['modo'] == "representate" || $_SESSION['modo'] == "monitore") { ?>
                <li><a style=<?= $arquivo == "RelatorioT.php" ? "background-color:orange;" : "" ?> class="" href="RelatorioT.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Presença Tutore
                </a></li>
                <?php } ?>
            </ul>
        </li>
        <li><a onclick="logout()"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div>