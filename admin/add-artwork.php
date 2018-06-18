<?php
    session_start();
?>
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

    <div class="admin-container admin-add-artwork">

        <!--ARTWORK-->

        <div class="container">
            <h1><a href="menu.php">Add artwork</a></h1>
            <form action="../core/services.php?action=addArtwork" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <?php
                    $value = "";
                    if(!empty($_SESSION['errors']) && empty($_SESSION['errors']['title'])) {
                        $value = $_SESSION['errors']['post']['title'];
                    }

                    echo '<input type="text" name="title" placeholder="Add title" class="form-control" value="'.$value.'">';

                    if(!empty($_SESSION['errors']['title'])) {
                        echo '<div class="error">'.$_SESSION['errors']['title'].'</div>';
                        unset($_SESSION['errors']['title']);
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <?php
                    $value = "";
                    if(!empty($_SESSION['errors']) && empty($_SESSION['errors']['desc'])) {
                        $value = $_SESSION['errors']['post']['desc'];
                    }

                    echo '<textarea name="desc" placeholder="Add desc" class="form-control">'.$value.'</textarea>';

                    if(!empty($_SESSION['errors']['desc'])) {
                        echo '<div class="error">'.$_SESSION['errors']['desc'].'</div>';
                        unset($_SESSION['errors']['desc']);
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Media</label>
                    <input type="file" name="media" placeholder="Add media" class="form-control">
                    <?php
                    if(!empty($_SESSION['errors']['media'])) {
                        echo '<div class="error">'.$_SESSION['errors']['media'].'</div>';
                        unset($_SESSION['errors']['media']);
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Active</label>
                    <input type="checkbox" name="active">
                </div>
                <div class="form-group">
                    <label>Artiste</label>
                    <?php
                    require('../core/ContentManager.php');
                    $cm = new ContentManager();
                    echo $cm->getArtisteSelect();
                    ?>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <?php
                    //require('../core/ContentManager.php');
                    //$cm = new ContentManager();
                    echo $cm->getCategorySelect();
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>


    </div>


</div>
<script type="text/javascript" src="../dist/assets/js/app.min.js"></script>
</body>
</html>