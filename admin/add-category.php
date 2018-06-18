<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Add category</title>
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

    <div class="admin-container admin-add-category">
        <!-- CATEGORY-->
        <div class="container">
            <h1><a href="menu.php">Add category</a></h1>
            <form action="../core/services.php?action=addCat" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="Add title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Picture</label>
                    <input type="file" name="picture" placeholder="Add picture" class="form-control" accept="image/jpeg, image/png, image/gif">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>

    </div>


</div>
</body>
</html>