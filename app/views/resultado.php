<?php include 'layout-top.php' ?>


<h1 class="scoreTitle">Pontuação: <strong class="scoreNumber">0</strong></h1>
<?php if ($resultado): ?>
    <h2 class="gameDesc">Animal certo!</h2>
<?php else: ?>
    <h2 class="gameDesc">Animal errado!</h2>
<?php endif; ?>


<div class="card-container">
<?php foreach($dados as $animal): ?>

    <label class="game-label">
        <input type="radio" name="animal" class="card-input-element" value="<?=$animal['id']?>"/>
            <div class="card-input">
                <div class="card-title"><?=$animal['nome']?></div>
                <div class="animal-img">
                    <img class="animal-photo" src="<?=$animal['foto']?>" alt="Imagem">
                </div>
            </div>
    </label>

<?php endforeach; ?>

<button class="btn-send" href="<?=route('game')?>"></button>
</div>


<?php include 'layout-bottom.php' ?>
