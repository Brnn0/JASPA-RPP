<?php include 'layout-top.php' ?>

<?php if (isset($_SESSION["signup"])): ?>
    <h1 class="scoreTitle">Pontuação: <strong class="scoreNumber"><?=$scoreAtual?></strong></h1>
<?php else: ?>
    <h1 class="scoreTitle">Login para pontuar</h1>
<?php endif; ?>


<h2 class="gameDesc">Adivinhe qual o animal mais ameaçado!</h2>

<form method="POST" action="<?=route('game/responder')?>">

    <div class="card-container">

        <?php foreach($dados as $animal): ?>
            <label class="card-label">
                <input type="radio" name="animal" class="card-input-element" value="<?=$animal['id']?>"/>
                    <div class="card-input slit-in-vertical">
                        <div class="card-title"><?=$animal['nome']?></div>
                        <div class="animal-img">
                            <img class="animal-photo" src="<?=$animal['foto']?>" alt="Imagem">
                        </div>
                        <div class='card-status'>-----</div>
                    </div>
                    
            </label>
        <?php endforeach; ?>

        <button class="btn-send"></button>

    </div>

</form>

<a class="btn-back" href="<?=route('home')?>"></a>

<?php include 'layout-bottom.php' ?>
