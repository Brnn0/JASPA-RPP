<?php include 'layout-top.php' ?>

<?php foreach ($dados as $ln){
    print $ln["nome"];
    print $ln["total"];
    print"<br>";
}
?>

<?php include 'layout-bottom.php' ?>