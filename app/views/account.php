<?php include 'layout-top.php' ?>

<form class="box">

        <p class="userName titleSimple">Bem vindo!</p>
        <?php   
            if (isset($_SESSION["signup"])) {
                echo '<h1 class="userName titleSimple">' . $_SESSION["signup"]["nome"] . '</h1>';
            } else {
                echo '<h1 class="userName titleSimple"></h1>';
            }
        ?>
        <br>

        <a class="btn-link" href="<?=route('login')?>">Login</a>
        <a class="btn-link" href="<?=route('signup')?>">Cadastrar</a>
        <a class="btn-link" href="<?=route('animais')?>">Animais</a>
        <a class="btn-link" href="<?=route('autenticacao/logout')?>">Logout</a>
</form>

<nav>
        <a class="btn-back" href="<?=route('home')?>"></a>
</nav>

<?php include 'layout-bottom.php' ?>
