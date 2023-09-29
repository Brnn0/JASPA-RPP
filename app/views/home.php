<?php include 'layout-top.php' ?>

<h1 class="titleHome">
    J.A.S.P.A.
</h1>

<h2 class="subTitleHome">
    Jogo de Adivinhação Sobre Preservação Animal
</h2>

<a id="btn_start" class="btn-start" href="<?=route('game')?>">Iniciar!</a>

<nav>
    <a id="btn_podium" class="btn-podium" href="<?=route('ranking')?>"></a>

    <a id="btn_profile" class="btn-profile" href="<?=route('account')?>"></a>
</nav>


<?php include 'layout-bottom.php' ?>

