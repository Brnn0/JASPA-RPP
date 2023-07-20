<?php include 'layout-top.php' ?>



<form class="box" method='POST' action='<?=route('signup/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    <input type="text" name="user" placeholder="Usuário" class="user" value="<?=_v($data,"user")?>" >
</label>

<label class='col-md-6'>
    <input type="text" name="email" placeholder="E-Mail" class="email" value="<?=_v($data,"email")?>" >
</label>

<label class='col-md-2'>
    <input type="text" name="senha" placeholder="Senha" class="password" value="<?=_v($data,"senha")?>" >
</label>

</label>

<button class='btn btn-primary col-12 col-md-3 mt-3 btn-account'>Salvar</button>
<!-- <a class='btn btn-secondary col-12 col-md-3 mt-3 btn-account' href="<?=route("signup")?>">Novo</a> -->

</form>

<!-- <table class='table'>

    <tr>
        <th>Editar</th>
        <th>Usuário</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("signup/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['user']?></td>
            <td><?=$item['email']?></td>
            <td><?=$item['senha']?></td>
            <td>
                <a href='<?=route("signup/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table> -->

<nav>
        <a class="btn-back" href="<?=route('account')?>"></a>
</nav>

<?php include 'layout-bottom.php' ?>