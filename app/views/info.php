<?php include 'layout-top.php' ?>

<div class="title-info"><?=$animal['nome']?></div>
<p class="title-status"> Ameaçado por: <strong class="status"><?=$animal['ameaca']?></strong></p>

<div class="info-container">
    <div class="card-info"><?=$animal['info']?></div>    
</div>
<div class="info-img-container">
    <img class="info-img" src="<?=$animal['foto']?>" alt="Imagem">
</div>
<a class="btn-back" style="left:15px" href="<?=route('game')?>"></a>

<?php include 'layout-bottom.php' ?>