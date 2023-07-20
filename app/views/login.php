<?php include 'layout-top.php' ?>

<form class="box" action="login.html" method="post">
        <img class="icon">
        <input type="email" name="email" placeholder="E-Mail" class="email">
        <input type="password" name="senha" placeholder="Senha" class="password">
        <input type="submit" class="btn-account" value="Login">
    </form>

    <nav>
        <a class="btn-back" href="<?=route('account')?>"></a>
    </nav>

<?php include 'layout-bottom.php' ?>