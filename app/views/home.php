<?php include 'layout-top.php' ?>

<?php   
    if (isset($_SESSION["signup"])) {
        echo '<p class="home-user">Logado como: ' . $_SESSION["signup"]["nome"] . '</p>';
    } else {
        echo '<p class="home-user"></p>';
    }
?>

<a class="copyright" href="<?=route('credits')?>">Créditos</a>

<h1 class="titleHome text-pop-up-top">
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

