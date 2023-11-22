<?php
use models\Signup;
include 'layout-top.php' ?>

<div class="user-box-container">

    <?php
        if (getFlash("success")){
            print "<div class='alert alert-success' role='alert'>".getFlash("success")."</div>";
        } else
        if (getFlash("error")){
            print "<div class='alert alert-danger' role='alert'>".getFlash("error")."</div>";
        }
    ?>

    <div class="user-box">
        <br>

    <?php if (isset($msg) && $msg != "") : ?>
        <div class="alert alert-danger" role="alert">
        <?=$msg?>
        </div>
    <?php endif; ?>

        <form method='POST' autocomplete="off" action='<?=route('signup/salvar/') . _v($data,"id") ?>'>

            <h1 class="titleSimple" style="margin-bottom: 20px" >
                Cadastrar
            </h1>

            <input type="text" autocomplete="off" class="form-control <?=hasError("nome","is-invalid")?>" name="nome" value="<?=old("nome", _v($data,"nome"))?>" placeholder="Nome"> 
            <div class='invalid-feedback'><?=getValidationError("nome") ?></div>

            <input type="email" autocomplete="off" class="form-control" name="email" placeholder="E-Mail" value="<?=old("email", _v($data,"email"))?>" >

            <input type="password" autocomplete="off" class="form-control" name="senha" placeholder="Senha" value="" >


            <label class='col-md-4' style='position:relative'>
                <input type="text" class="form-control date <?=hasError("dataNascimento","is-invalid")?>" name="dataNascimento" placeholder="Aniversário"
                        value="<?=old("dataNascimento", _v($data,"dataNascimento"))?>" >

                <!-- para esse formato (invalid-tooltip) funcionar, o parent tem que ser relative -->
                <div class="invalid-tooltip"><?=getValidationError("dataNascimento") ?></div>
            </label>

            <?php if (isset($_SESSION["signup"]) && $_SESSION['signup']['tipo'] == Signup::ADMIN_USER): ?>
            <select name="tipo" class="form-control">
                <?php
                foreach($tipos as $k=>$tipo){
                    _v($data,"tipo") == $k ? $selected='selected' : $selected='';
                    print "<option value='$k' $selected>$tipo</option>";
                }
                ?>
            </select>
            <?php endif; ?>
            
            
            <div class="btn-user-container">
                <button class='btn-account'>Registrar</button><br>
                <a class='redirect' href="<?=route("login")?>">Logar</a>
                <a class='redirect' href="<?=route("signup")?>">Novo</a>
            </div>
        </form>


        <?php if (isset($_SESSION["signup"]) && $_SESSION['signup']['tipo'] == Signup::ADMIN_USER): ?>
        <div class="scroll-table user-table">
            <table class='tableList'>

                    <tr class="table-tr">
                        <th class="table-th-edit">Editar</th>
                        <th class="table-th-name">Nome</th>
                        <th class="table-th-name">Data de nascimento</th>
                        <th class="table-th-delet">Deletar</th>
                    </tr>

                    <?php foreach($lista as $item): ?>

                        <tr class="table-tr">
                            <td class="table-td">
                                <a href='<?=route("signup/index/{$item['id']}")?>'>Editar</a>
                            </td>
                            <td class="table-td"><?=$item['nome']?></td>
                            <td class="table-td"><?=$item['dataNascimento']?></td>
                            <td class="table-td">
                                <a href='<?=route("signup/deletar/{$item['id']}")?>'>Deletar</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    
    </div>
    
    <a class="btn-back" href="<?=route('account')?>"></a>

</div>

<?php include 'layout-bottom.php' ?>