<?php include 'layout-top.php' ?>

<?php if (isset($msg) && $msg != "") : ?>
    <div class="alert alert-danger" role="alert">
    <?=$msg?>
    </div>
<?php endif; ?>

<div class="box">

    <h1 class="titleSimple">
        Cadastrar
    </h1>
    <br>

    <form method='POST' action='<?=route('signup/salvar')?>'>

    <label class='col-md-6'>

        <input type="text" class="form-control <?=hasError("nome","is-invalid")?>" name="nome" value="" placeholder="Nome"> 
        <div class='invalid-feedback'><?=getValidationError("nome") ?></div>
    </label>

    <label class='col-md-6'>
        <input type="email" class="form-control" name="email" placeholder="E-Mail" value="<?=old("email", _v($data,"email"))?>" >
    </label>

    <label class='col-md-6'>
        <input type="password" class="form-control" name="senha" placeholder="Senha" value="" >
    </label>


    <label class='col-md-4' style='position:relative'>
        <input type="text" class="form-control date <?=hasError("dataNascimento","is-invalid")?>" name="dataNascimento" placeholder="Aniversário"
                value="<?=old("dataNascimento", _v($data,"dataNascimento"))?>" >

        <!-- para esse formato (invalid-tooltip) funcionar, o parent tem que ser relative -->
        <div class="invalid-tooltip"><?=getValidationError("dataNascimento") ?></div>
    </label>

    <label class='col-md-6'>

        <select name="tipo" class="form-control">
            <?php
            foreach($tipos as $k=>$tipo){
                _v($data,"tipo") == $k ? $selected='selected' : $selected='';
                print "<option value='$k' $selected>$tipo</option>";
            }
            ?>
        </select>
    </label>

    <button class='btn-account'>Registrar</button>
    <a class='redirect' href="<?=route("login")?>">logar</a>
    </form>

    
</div>

<table class='tableList'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Data de nascimento</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("signup/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['dataNascimento']?></td>
            <td>
                <a href='<?=route("signup/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<a class="btn-back" href="<?=route('account')?>"></a>

<?php include 'layout-bottom.php' ?>