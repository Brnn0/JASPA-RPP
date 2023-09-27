<?php include 'layout-top.php' ?>

<table class="info-box">

    <div class="card-title"><?=$animal['nome']?></div>
    <div><?=$animal['foto']?></div>
    <div class="card-info"><?=$animal['info']?></div>

</table>

<a class="btn-back" style="left:15px" href="<?=route('game')?>"></a>

<?php include 'layout-bottom.php' ?>