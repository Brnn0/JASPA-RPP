<?php include 'layout-top.php' ?>



<form method='POST' action='<?=route('scores/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Pontuação
    <input type="text" class="form-control" name="score" value="<?=_v($data,"score")?>" >
</label>

<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("scores")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Score</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("scores/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['score']?></td>
            <td>
                <a href='<?=route("scores/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>