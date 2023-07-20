<?php include 'layout-top.php' ?>


<h1 class="scoreTitle">Pontuação: <strong class="scoreNumber">0</strong></h1>
<h2 class="gameDesc">Adivinhe qual o animal ameaçado!</h2>

<div class="container">

<form method="POST" action="<?=route('game/resposta')?>">

<?php foreach($dados as $animal): ?>

    <label class="game-label">
        <input type="radio" name="animal" class="card-input-element" value="<?=$animal['id']?>"/>
            <div class="card-input">
                <div class="card-title"><?=$animal['nome']?></div>
                <div class="animal-img">
                    <img class="animal-photo" src="<?=$animal['foto']?>" alt="Imagem">
                </div>
                <div class="card-status">
                    Status: ------
                </div>
            </div>
    </label>

<?php endforeach; ?>

 <button class="btn-send"></button>

</form>


</div>

<?php include 'layout-bottom.php' ?>
