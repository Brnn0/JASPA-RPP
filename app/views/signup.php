<?php include 'layout-top.php' ?>

<?php if (isset($msg) && $msg != "") : ?>
    <div class="alert alert-danger" role="alert">
    <?=$msg?>
    </div>
<?php endif; ?>
<h1>Cadastrar</h1>
<form method='POST' action='<?=route('signup/salvar')?>'>
<label class='col-md-6'>
    Nome <span style='color:red;'>*</span>
    <input type="text" class="form-control <?=hasError("nome","is-invalid")?>" name="nome" value="" >
    <div class='invalid-feedback'><?=getValidationError("nome") ?></div>
</label>

<label class='col-md-6' style='position:relative'>
    Data de nascimento <span style='color:red;'>*</span>
    <input type="text" class="form-control <?=hasError("dataNascimento","is-invalid")?>" name="dataNascimento"
            value="" >

    <!-- para esse formato (invalid-tooltip) funcionar, o parent tem que ser relative -->
    <div class="invalid-feedback"><?=getValidationError("dataNascimento") ?></div>
</label>

<label class='col-md-6'>
    E-mail
    <input type="email" class="form-control <?=hasError("email","is-invalid")?>" name="email" value="" >
    <div class='invalid-feedback'><?=getValidationError("email") ?></div>
</label>

<label class='col-md-6'>
    Senha
    <input type="password" class="form-control <?=hasError("senha","is-invalid")?>" name="senha" value="" >
    <div class='invalid-feedback'><?=getValidationError("senha") ?></div>
</label>

<label class='col-md-6'>
    Tipo
    <select name="tipo" class="form-control" id="opcao">
        <option selected hidden>Escolha o tipo</option>
        <?php
        $selected= _v($data,"tipo");
        foreach($tipoUser as $tipo => $valor){
            print "<option value='".$tipo."'>".$valor."</option>";
        }
        ?>
    </select>
</label>

<button class='btn btn-primary col-12 col-md-3 mt-3'>Entrar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("login")?>">logar</a>
</form>

<nav>
        <a class="btn-back" href="<?=route('home')?>"></a>
</nav>

<?php include 'layout-bottom.php' ?>