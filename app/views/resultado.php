<?php include 'layout-top.php' ?>


<h1 class="scoreTitle">Pontuação: <strong class="scoreNumber"><?=$scoreAtual?></strong></h1>

<!-- <?php
if (isset($_SESSION["signup"])) {
                echo '<h1 class="scoreTitle">Pontuação: <strong class="scoreNumber"><?=$scoreAtual?></strong></h1>';
            } else {
                echo '<h1 class="scoreTitle">Login para pontuar</strong></h1>';
            }
?> -->

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
                <div class="card-status">------</div>
            </div>
    </label>
    <?php endforeach; ?>
</div>

<nav class="result-nav">
    <div class="result-nav-items">

        <?php if ($animalCerto != false): ?>
            <a class="btn-info" href="<?=route('game/info/' . $animalCerto['id'] )?>">Info</a>
            <a class="btn-next" href="<?=route('game')?>"></a>
        <?php endif; ?>
        <a class="btn-home" href="<?=route('home')?>">Início</a>

    </div>
</nav>


<?php include 'layout-bottom.php' ?>
