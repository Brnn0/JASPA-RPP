<?php include 'layout-top.php' ?>

<?php foreach ($dados as $ln){
    print $ln["nome"];
    print $ln["total"];
    print"<br>";
}
?>

<a class="btn-back" href="<?=route('home')?>"></a>

<?php include 'layout-bottom.php' ?>