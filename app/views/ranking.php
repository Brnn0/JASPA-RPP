<?php include 'layout-top.php' ?>

<div class="rank-title">

<img src="public\assets\img\trophy.png" alt="" class="img-trophy">
<h1 class="rank-name">Placar!</h1>
<img src="public\assets\img\trophy.png" alt="" class="img-trophy">


</div>

<div class="rank-container">

    <img src="public\assets\img\stars.png" class="img-star-lefttop">
    <img src="public\assets\img\stars.png" class="img-star-leftbot">

    <div class="rank-border">
        <div class="rank-box">

            <table class="rank-table">
                <tr>
                    <th class="rank-th-position">Posição</th>
                    <th class="rank-th-user">Usuário</th>
                    <th class="rank-th-score">Pontuação</th>
                </tr>
                <?php $count = 0; foreach ($dados as $ln):?>
                    <?php $count++; ?>
                    <tr class="rank-tr">
                        <td class="rank-td"><?=$count?>. </td>
                        <td class="rank-td limit-text"><?=$ln["nome"]?></td>
                        <td class="rank-td"><?=$ln["total"]?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>

    <img src="public\assets\img\stars.png" alt="" class="img-star-righttop">
    <img src="public\assets\img\stars.png" alt="" class="img-star-rightbot">

</div>

<a class="btn-back" href="<?=route('home')?>"></a>

<?php include 'layout-bottom.php' ?>