<?php include 'layout-top.php' ?>

<form class="box" action="login.html" method="post">
        <img class="icon" src="/assets/img/icon.png">
        <input type="email" name="email" placeholder="E-Mail" id="email">
        <input type="password" name="senha" placeholder="Senha" id="password">
        <input type="submit" class="submit" value="Login">
    </form>

    <nav>
        <a class="btn-back" href="<?=route('account')?>"></a>
    </nav>

<?php include 'layout-bottom.php' ?>