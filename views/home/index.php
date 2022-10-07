<div id="barraSuperior">
    <input type="checkbox" id="checkMenu">
    <label for="checkMenu">
        <div id="botaoMenu" onclick="menu()">
            <span class="linha-menu"></span>
            <span class="linha-menu"></span>
            <span class="linha-menu"></span>
        </div> 
    </label>
</div>
<div id="topMenu">
    <a href="index.php"><label><span style="color:orange">ATENA</span>SYSTEM</label></a>
    <a href="http://hubis.com.br/" target="_blank">
        <img src="public/img/hubis.png" id="logo-hubis">
    </a>
</div>
<div class="menu" id="menu">
    <ul>
        <li><a href="#"><em class="fa fa-user-plus" aria-hidden="true"></em>&nbsp;Representante</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Cadastro</a></li>
                <li><a href="#" onclick="editRepresentante()">Editar</a></li>
            </ul>
        </li>
        <li><a href="#"><em class="fa fa-address-book" aria-hidden="true"></em>&nbsp;Comissão</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Cadastro</a></li>
                <li><a href="#" onclick="editRepresentante()">Editar</a></li>
            </ul>
        </li>
        <li><a href="#"><em class="fa fa-user-circle-o" aria-hidden="true"></em>&nbsp;Monitore</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Cadastro</a></li>
                <li><a href="#" onclick="editRepresentante()">Editar</a></li>
                <li><a href="#" onclick="editRepresentante()">Editar Presença</a></li>
            </ul>
        </li>
        <li><a href="#"><em class="fa fa-user-o" aria-hidden="true"></em>&nbsp;Tutore</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Cadastro</a></li>
                <li><a href="#" onclick="editRepresentante()">Editar</a></li>
                <li><a href="#" onclick="editRepresentante()">Editar Presença</a></li>
                <li><a href="#" onclick="editRepresentante()">Justificar Presença</a></li>
            </ul>
        </li>
        <li><a href="#"><em class="fa fa-graduation-cap" aria-hidden="true"></em>&nbsp;Alune</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Cadastro</a></li>
                <li><a href="#" onclick="editRepresentante()">Editar</a></li>
                <li><a href="#" onclick="editRepresentante()">Justificar Presença</a></li>
            </ul>
        </li>
        <li><a href="#"><em class="fa fa-newspaper-o" aria-hidden="true"></em>&nbsp;Disciplina</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Cadastro</a></li>
                <li><a href="#" onclick="editRepresentante()">Editar</a></li>
            </ul>
        </li>
        <li><a href="#"><em class="fa fa-university" aria-hidden="true"></em>&nbsp;Sala</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Cadastro</a></li>
                <li><a href="#" onclick="editRepresentante()">Editar</a></li>
            </ul>
        </li>
        <li><a href="#"><em class="fa fa-calendar"></em>&nbsp;Presença</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Aula Alune</a></li>
                <li><a href="#" onclick="editRepresentante()">Aula Tutore</a></li>
                <li><a href="#" onclick="editRepresentante()">Monitore</a></li>
                <li><a href="#" onclick="editRepresentante()">Reunião</a></li>
            </ul>
        </li>
        <li><a href="#"><em class="fa fa-file-pdf-o"></em>&nbsp;Certificado</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Tutore</a></li>
                <li><a href="#" onclick="editRepresentante()">Monitore</a></li>
            </ul>
        </li>
        <li><a href="#"><em class="fa fa-bar-chart"></em>&nbsp;Relatorio</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Presença Alune</a></li>
                <li><a href="#" onclick="editRepresentante()">Presença Reunião</a></li>
                <li><a href="#" onclick="editRepresentante()">Presença Monitore</a></li>
                <li><a href="#" onclick="editRepresentante()">Presença Tutore</a></li>
            </ul>
        </li>
        <li><a href="#" onclick="logout()"><em class="fa fa-power-off"></em>&nbsp;Logout</a></li>
    </ul>
</div>
<div id="content">
    <img id="logo-atena" src='public/img/atena.jpeg'>
</div>
<script src="views/home/index.js"></script>