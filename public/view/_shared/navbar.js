export function renderNavbar() {
    const navbar = document.getElementById('atn-navbar');
    if (!navbar || !navbar.hasAttribute('data-shared-navbar')) return;

    navbar.innerHTML = `
        <div class="container-fluid" style="display:flex; align-items:center; justify-content:space-between; width:100%; padding:0 clamp(0.75rem, 2vw, 2rem); height:4rem;">
            <a href="/home" class="atn-logo" style="font-size:1.25rem; font-weight:700; color:#fff; text-decoration:none; display:flex; align-items:center; gap:0.5rem;">
                <i class="fas fa-graduation-cap" style="font-size:1.5rem; color:#ffb53e;"></i>
                <span><span style="color:#ffb53e;">Atena</span><span style="color:#fff;">System</span></span>
            </a>
            <a href="http://hubis.com.br/" target="_blank" rel="noopener noreferrer" aria-label="Hubis">
                <img src="/public/img/hubis.png" alt="Hubis" style="display:block; width:clamp(100px, 10vw, 150px); height:auto;">
            </a>
        </div>
    `;
}