<?php
if (session_status() != 2) {
    session_start();
}
?>
<div class="navbar">
    <nav class="navbar-bar navbar-bar_top">
        <div class="navbar-item">
            <a href="./help">Ajuda</a>
        </div>
        <?php
        if (!isset($_SESSION["id"])) {
        echo ('<div class="navbar-item">
            <a href="./register">Juntar-se</a>
        </div>');
        }
        if (isset($_SESSION["id"])) {
            echo ('<div class="navbar-item">
            <div class="dropdown show">
                <a href="#" class="btn dropdown-toggle" id="dropdownMenuLink">Opções</a>
                <div class="dropdown-menu " id="dropdownMenu">');
            if ($_SESSION["level"] >= 2) {
                echo ('<a class="dropdown-item" href="./users">Usuários</a>');
            };
            if ($_SESSION["level"] >= 1) {
                echo ('<a class="dropdown-item" href="./products">Produtos</a>');
            };
            echo ('<a class="dropdown-item" href="./sistema/logout">Sair</a>
                </div>
            </div>
        </div>');
        }
        ?>
    </nav> <!-- navbar-bar navbar-bar_top -->
    <nav class="navbar-bar navbar-bar_bottom navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" id="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-item navbar-logo">
            <a href="./"><img src="imgs/favicon.png" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <div class="navbar-item">
                    <a href="./index?parameter=lastr">Lançamentos</a>
                </div>
                <div class="navbar-item">
                    <a href="./index?parameter=men">Masculino</a>
                </div>
                <div class="navbar-item">
                    <a href="./index?parameter=women">Feminino</a>
                </div>
            </div>
        </div>

    </nav> <!-- navbar-bar navbar-bar_bottom -->
</div> <!-- navbar -->
<script src="js/navbar.js"></script>