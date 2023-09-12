<?php include 'layout-top.php' ?>



<form method='POST' action='<?=route('animais/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Nome
    <input type="text" class="form-control" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label class='col-md-2'>
    Foto (Link da imagem)
    <input type="text" class="form-control" name="foto" value="<?=_v($data,"foto")?>" >
</label>

    Ameaça
    <input type="text" class="form-control" name="ameaca" value="<?=_v($data,"ameaca")?>" >
</label>

    Informações
    <input type="text" class="form-control" name="info" value="<?=_v($data,"info")?>" >
</label>

    Situação
    <input type="boolean" class="form-control" name="situacao" value="<?=_v($data,"situacao")?>" >
</label>

<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("animais")?>">Novo</a>
<a class="btn-back" href="<?=route('account')?>"></a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Foto</th>
        <th>Ameaça</th>
        <th>Informações</th>
        <th>Situação</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("animais/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['foto']?></td>
            <td><?=$item['ameaca']?></td>
            <td><?=$item['info']?></td>
            <td><?=$item['situacao']?></td>
            <td>
                <a href='<?=route("animais/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>