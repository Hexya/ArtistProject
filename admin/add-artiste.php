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

    <div class="admin-container admin-ad-artiste">
        <!-- ARTISTE-->

        <div class="container">
            <h1><a href="menu.php">Add artiste</a></h1>
            <form action="../core/services.php?action=addArt" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" name="firstname" placeholder="Add firstname" class="form-control">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Add name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Add address" class="form-control">
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <select name="country" class="form-control">
                        <option>France</option>
                        <option>Brésil</option>
                        <option>Corée</option>
                        <option>Japon</option>
                        <option>Etats-Unis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" placeholder="Add your city" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="mail" name="email" placeholder="Add email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Latitude</label>
                    <input type="number" name="latitude" step="any" placeholder="Add latitude" class="form-control">
                </div>
                <div class="form-group">
                    <label>Longitude</label>
                    <input type="number" name="longitude" step="any" placeholder="Add longitude" class="form-control">
                </div>
                <div class="form-group">
                    <label>Pseudo</label>
                    <input type="pseudo" name="pseudo" placeholder="Add pseudo" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Add password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Validate password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Active</label>
                    <input type="checkbox" name="active" placeholder="Add active">
                </div>
                <div class="form-group">
                    <label>Avatar</label>
                    <input type="file" name="avatar" placeholder="Add avatar" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>


    </div>


</div>

</body>
</html>