<?php include 'layout-top.php' ?>

<form class="box">
        <h1 class="userName titleSimple">Nome Usuário</h1>
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
