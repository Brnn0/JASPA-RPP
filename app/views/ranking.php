<?php include 'layout-top.php' ?>

<div class="rank-title">

<img src="public\assets\img\trophy.png" alt="" class="img-trophy">
<h1 class="rank-name">Placar!</h1>
<img src="public\assets\img\trophy.png" alt="" class="img-trophy">


</div>

<div class="rank-container">

<div class="rank-box">

    <?php foreach ($dados as $ln){
            print $ln["nome"] . " - " . $ln["total"];
            print"<br>";
        }
        ?>
        
</div>

</div>

<a class="btn-back" href="<?=route('home')?>"></a>

<?php include 'layout-bottom.php' ?>