<?php include 'layout-top.php' ?>



<form method='POST' action='<?=route('usuarios/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Login
    <input type="text" class="form-control" name="loginUsuario" value="<?=_v($data,"loginUsuario")?>" >
</label>

<label class='col-md-2'>
    Senha
    <input type="text" class="form-control" name="senhaUsuario" value="<?=_v($data,"senhaUsuario")?>" >
</label>

</label>

<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("usuarios")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Login</th>
        <th>Senha</th>
        <th>Id_Score</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("usuarios/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['loginUsuario']?></td>
            <td><?=$item['senhaUsuario']?></td>
            <td><?=$item['id_score']?></td>
            <td>
                <a href='<?=route("usuarios/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>