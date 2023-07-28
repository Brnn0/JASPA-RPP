<?php include 'layout-top.php' ?>

<?php if (isset($msg) && $msg != "") : ?>
    <div class="alert alert-danger" role="alert">
    <?=$msg?>
    </div>
<?php endif; ?>
<h1>Login</h1>
<form method='POST' action='<?=route('autenticacao/logar/')?>'>

<label class='col-md-4'>
    E-mail
    <input type="email" class="form-control" name="email" value="" >
</label>

<label class='col-md-4'>
    Senha
    <input type="password" class="form-control" name="senha" value="" >
</label>

<button class='btn btn-primary col-12 col-md-3 mt-3'>Entrar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("signup")?>">Registrar</a>
</form>

<nav>
        <a class="btn-back" href="<?=route('home')?>"></a>
</nav>

<?php include 'layout-bottom.php' ?>