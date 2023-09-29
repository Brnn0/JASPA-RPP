<?php include 'layout-top.php' ?>

<div class="info-container"> //flex
    <div>
        <div class="info-first-row">
            <div class="info-img">
                <img class="info-img" src="<?=$animal['foto']?>" alt="Imagem">
            </div>
        </div>
    
        <div class="info-second-row">
            <div class="info-title"><?=$animal['nome']?></div>
        
            <div class="info-text">
                <p class="title-status"> Ameaçado por: <strong class="status"><?=$animal['ameaca']?></strong></p>
                <div class="card-info"><?=$animal['info']?></div>    
            </div>
        </div>
    </div>
    
    <a class="btn-back" href="<?=route('game')?>"></a>
</div>


<?php include 'layout-bottom.php' ?>