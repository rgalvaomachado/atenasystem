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
    <ul id="listMenu">
    </ul>
</div>
<div id="content">
    <img id="logo-atena" src='public/img/atena.jpeg'>
</div>
<script src="views/home/index.js"></script>
<script>
    verificaPermissao();
    setInterval(verificaSessão, 60000);
</script>