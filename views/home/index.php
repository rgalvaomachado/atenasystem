<input type="checkbox" id="checkMenu">
<label for="checkMenu">
    <div id="botaoMenu" onclick="abreMenu()">
        <span class="linha-menu"></span>
        <span class="linha-menu"></span>
        <span class="linha-menu"></span>
    </div> 
</label>
<div class="menu" id="menu">
    <ul>
        <li><a href="#">Representante</a>
            <ul>
                <li><a href="#" onclick="cadRepresentante()">Criar</a></li>
                <li><a href="#" onclick="editRepresentante()">Editar</a></li>
            </ul>
        </li>
        <li><a href="#">Comissao de Faltas</a>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
        </li>
        <li><a href="#">Monitore</a>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
        </li>
        <li><a href="#">Tutore</a>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
        </li>
        <li><a href="#">Alune</a>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
        </li>
        <li><a href="#">Disciplina</a>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
        </li>
        <li><a href="#">Sala</a>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
        </li>
        <li><a href="#">Presença</a>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
        </li>
        <li><a href="#">Certificado</a>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
        </li>
        <li><a href="#">Relatorio</a>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
            <ul>
                <li><a href="#">Novos</a></li>
            </ul>
        </li>
        <li><a href="#" onclick="logout()">Logout</a></li>
    </ul>
</div>
<div id="content">
    <img id="logo-atena" src='public/img/atena.jpeg'>
</div>
<script src="views/home/index.js"></script>