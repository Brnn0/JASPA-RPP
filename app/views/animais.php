<?php include 'layout-top.php' ?>


<div class="animal-box">
    
    <form method='POST' action='<?=route('animais/salvar/'._v($data,"id"))?>'>
    
    <label class='col-md-6'>
        <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?=_v($data,"nome")?>" >
    </label>
    
    <label class='col-md-2'>
        <input type="text" class="form-control" name="foto" placeholder="Foto (URL)" value="<?=_v($data,"foto")?>" >
    </label>
    
        <input type="text" class="form-control" name="ameaca" placeholder="Ameaça" value="<?=_v($data,"ameaca")?>" >
    </label>
    
        <input type="text" class="form-control" name="info" placeholder="Info." value="<?=_v($data,"info")?>" >
    </label>

    <p class="titleSimple">
        Ameaçado?
    </p>

    <div class="radio-container">
        <label class="btn-animal">
            Sim
            <input type="radio" class="btn-animal-input" name="situacao" value="1" <?php _v($data,"situacao") == 1 ? print 'checked' : '' ?>  >
        </label>

        <label class="btn-animal"> 
            Não
            <input type="radio" class="btn-animal-input" name="situacao" value="0" <?php _v($data,"situacao") == 0 ? print 'checked' : '' ?>>
        </label>
    </div>
    
    <div class="btn-animal-container">
        <button class='redirect'>Salvar</button>
        <a class='redirect' style="margin-bottom: 0;" href="<?=route("animais")?>">Novo</a>

    </div>
    
    </form>

</div>

<a class="btn-back" href="<?=route('account')?>"></a>

    <table class='tableList animal-list'>
    
        <tr>
            <th>Editar</th>
            <th>Nome</th>
            <th>Situação</th>
            <th>Deletar</th>
        </tr>
    
        <?php foreach($lista as $item): ?>
    
            <tr>
                <td>
                    <a href='<?=route("animais/index/{$item['id']}")?>'>Editar</a>
                </td>
                <td class="limit-text"><?=$item['nome']?></td>
                <td class="limit-text"><?=$item['situacao']?></td>
                <td>
                    <a href='<?=route("animais/deletar/{$item['id']}")?>'>Deletar</a>
                </td>
            </tr>
    
        <?php endforeach; ?>
    </table>

<?php include 'layout-bottom.php' ?>