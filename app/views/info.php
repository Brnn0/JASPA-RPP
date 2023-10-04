<?php include 'layout-top.php' ?>

<div class="info-container">
    <div class="info-details">
        <div class="info-img">
            <img src="<?=$animal['foto']?>" alt="Imagem">
        </div>

        <div class="info-title">
            <p class="info-name"><?=$animal['nome']?></p>
        </div>
        
    
        <div class="info-card">
            <p class="title-status">
                Ameaçado por: <strong class="status"><?=$animal['ameaca']?></strong>
            </p>
            <p class="info-text"><?=$animal['info']?></p> 
        </div>
    </div>
    
    <a class="btn-back" href="<?=route('game')?>"></a>
</div>


<?php include 'layout-bottom.php' ?>