import { renderNavbar } from './navbar.js';

function renderMenu() {
    const nav = document.getElementById('atn-sidebar-nav');
    if (!nav) return;
    nav.innerHTML = `
        <ul style="list-style:none; padding:0; margin:0; font-family:'Inter',sans-serif;">
            <li class="atn-menu-item"><a href="/representante"><i class="fas fa-user-plus"></i> Representante</a></li>
            <li class="atn-menu-item"><a href="/comissao"><i class="fas fa-address-book"></i> Comissão de Faltas</a></li>
            <li class="atn-menu-item"><a href="/monitore"><i class="fas fa-user-circle"></i> Monitore</a></li>
            <li class="atn-menu-item"><a href="/tutore"><i class="fas fa-user"></i> Tutore</a></li>
            <li class="atn-menu-item"><a href="/alune"><i class="fas fa-graduation-cap"></i> Alune</a></li>
            <li class="atn-menu-item"><a href="/disciplina"><i class="fas fa-newspaper"></i> Disciplina</a></li>
            <li class="atn-menu-item"><a href="/sala"><i class="fas fa-university"></i> Sala</a></li>
            <li class="atn-menu-item"><a href="/presenca"><i class="fas fa-calendar"></i> Presença</a></li>
            <li class="atn-menu-item"><a href="/certificado"><i class="fas fa-file-pdf"></i> Certificado</a></li>
            <li class="atn-menu-item"><a href="/relatorio"><i class="fas fa-bar-chart"></i> Relatório</a></li>
            <li class="atn-menu-item logout"><a href="#" onclick="if(window.atnAuth) window.atnAuth.logout(); else window.location.assign('/login'); return false;"><i class="fas fa-power-off"></i> Logout</a></li>
        </ul>
    `;
}

document.addEventListener('DOMContentLoaded', function() {
    renderNavbar();
    renderMenu();
});
