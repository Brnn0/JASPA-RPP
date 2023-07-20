<?php include 'layout-top.php' ?>

<form class="box">
    <img class="icon">
    <input type="text" name="usuario" placeholder="Usuário" class="user">
    <input type="email" name="email" placeholder="E-Mail" class="email">
    <input type="password" name="senha" placeholder="Senha" class="password">
    <input type="submit" class="btn-account" value="Cadastrar">
</form>
    
<nav>
    <a class="btn-back" href="<?=route('account')?>"></a>
</nav>

<?php include 'layout-bottom.php' ?>