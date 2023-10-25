<?php include 'layout-top.php' ?>

<?php if (isset($msg) && $msg != "") : ?>
    <div class="alert alert-danger" role="alert">
    <?=$msg?>
    </div>
<?php endif; ?>
<form method='POST' action='<?=route('autenticacao/logar/')?>'>

<div class="box">

    <h1 class="titleSimple">
        Login
    </h1>
    <br> <br>

    <label class='col-md-4'>
        <input type="text" class="form-controlBig" name="email" value="" placeholder="E-Mail">
    </label>

    <label class='col-md-4'>
        <input type="password" class="form-controlBig" name="senha" value="" placeholder="Senha">
    </label>

    <button class='btn-account'>Entrar</button>
    <a class='redirect' href="<?=route("signup")?>">Registrar</a>
    </form>

</div>

<a class="btn-back" href="<?=route('account')?>"></a>

<?php include 'layout-bottom.php' ?>