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