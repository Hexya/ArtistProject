<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    if(file_exists('./inc/head.inc.php')){
        include('./inc/head.inc.php');
    }
    ?>
</head>
<body>
<?php
    if(file_exists('./inc/headFront.inc.php')){
        include('./inc/headFront.inc.php');
    }
?>

<div class="main-home-wrapper-container">

    <div class="admin-container">
        <p class="action-choice">Choose your action</p>
        <div class="admin-home-list">
            <div class="bloc"><img src="../dist/img/category.png" ><a href="add-category.php">Add category</a></div>
            <div class="bloc"><img src="../dist/img/artiste.png" ><a href="add-artiste.php">Add artiste</a></div>
            <div class="bloc"><img src="../dist/img/artwork.png" ><a href="add-artwork.php">Add artwork</a></div>
        </div>
    </div>


</div>

</body>
</html>