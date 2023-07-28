<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=assets("css/estilo.css")?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passero+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coiny&display=swap" rel="stylesheet">
    <title>J.A.S.P.A.</title>
</head>
<body>

<?php
#só exibirá o menu caso ESTEJA logado
if (isset($_SESSION['user'])):
?>
<?php endif; ?>

<!-- MENU 
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=route('')?>">Documentação</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?=route('usuarios')?>">Usuários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=route('scores')?>">Scores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=route('animals')?>">Animais</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=route('ameacas')?>">Ameaças</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=route('animal_ameacas')?>">animal_ameacas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=route('autenticacao/logout')?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>-->

<div class="container">

<?php

if (getFlash("success")){
    print "<div class='alert alert-success' role='alert'>".getFlash("success")."</div>";
} else
if (getFlash("error")){
    print "<div class='alert alert-danger' role='alert'>".getFlash("error")."</div>";
}

?>

<script src="https://unpkg.com/imask"></script>

<script src="<?=assets('js/main.js')?>" ></script>