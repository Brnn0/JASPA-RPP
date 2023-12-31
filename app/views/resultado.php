<?php include 'layout-top.php' ?>




<?php if (isset($_SESSION["signup"])): ?>
    <h1 class="scoreTitle">Pontuação: <strong class="scoreNumber"><?=$scoreAtual?></strong></h1>
<?php else: ?>
    <h1 class="scoreTitle">Login para pontuar</h1>
<?php endif; ?>

<?php if ($resultado): ?>
    <h2 class="gameDesc game-correct">Animal certo!</h2>
    <audio autoplay src="<?=serverUrl().'public\assets\audio\audio-correct.wav'?>"></audio>
<?php else: ?>
    <h2 class="gameDesc game-wrong">Animal errado!</h2>
    <audio autoplay src="<?=serverUrl().'public\assets\audio\audio-wrong.wav'?>"></audio>
<?php endif; ?>


<div class="card-container">
    <?php foreach($dados as $animal): ?>
    <label class="game-label">
        <input type="radio" name="animal" class="card-input-element" value="<?=$animal['id']?>"/>
            <?php if ($animal['situacao'] != false) {
                echo "<div class='card-input-correct'>";
            } else {
                echo "<div class='card-input-wrong'>";
            }
            ?>
                <div class="card-title"><?=$animal['nome']?></div>
                <div class="animal-img">
                    <img class="animal-photo" src="<?=serverUrl().$animal['foto']?>" alt="Imagem">
                </div>

                <?php if ($animal['situacao'] != false) {
                    echo "<div class='card-status'>AMEAÇADO</div>";
                } else {
                    echo "<div class='card-status'>SEGURO</div>";
                }
                ?>

            </div>
    </label>
    <?php endforeach; ?>
</div>

<nav class="result-nav">

    <?php if ($animalCerto != false): ?>
        <a class="btn-info" href="<?=route('game/info/' . $animalCerto['id'] )?>">Info</a>
        <a class="btn-next" href="<?=route('game')?>"></a>
        <a class="btn-home" href="<?=route('home')?>">Início</a>
    <?php else: ?>
        <a class="btn-home" href="<?=route('home')?>">Fim!</a>
    <?php endif; ?>

</nav>


<?php include 'layout-bottom.php' ?>
