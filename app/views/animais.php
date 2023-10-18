<?php include 'layout-top.php' ?>

<div >

    <div class="animal-box">
        
        <form method='POST' action='<?=route('animais/salvar/'._v($data,"id"))?>'>
        
            <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?=_v($data,"nome")?>" >
            <input type="text" class="form-control" name="foto" placeholder="Foto (URL)" value="<?=_v($data,"foto")?>" >
            <input type="text" class="form-control" name="ameaca" placeholder="Ameaça" value="<?=_v($data,"ameaca")?>" >
        
            <textarea type="text" class="form-control-info" name="info" placeholder="Info." value="<?=_v($data,"info")?>" ></textarea>

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

    <div class="scroll-table animal-table">
        
        <table class='tableList animal-list'>
        
            <tr class="table-tr">
                <th class="table-th">Editar</th>
                <th class="table-th">Nome</th>
                <th class="table-th">Situação</th>
                <th class="table-th">Deletar</th>
            </tr>
        
            <?php foreach($lista as $item): ?>
        
                <tr>
                    <td class="table-td">
                        <a href='<?=route("animais/index/{$item['id']}")?>'>Editar</a>
                    </td>
                    <td class="table-td limit-text"><?=$item['nome']?></td>
                    <td class="table-td limit-text"><?=$item['situacao']?></td>
                    <td class="table-td">
                        <a href='<?=route("animais/deletar/{$item['id']}")?>'>Deletar</a>
                    </td>
                </tr>
        
            <?php endforeach; ?>
        </table>

    </div>

</div>

<?php include 'layout-bottom.php' ?>