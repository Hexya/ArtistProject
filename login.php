<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tattoo Artist Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="dist/assets/css/style.css">
</head>
<body>

<!-- HEADER -->
<div class="head-cont">
    <div class="head-menu">
        <ul class="list-menu">
            <li><img src="./dist/img/inkedLogo.png"></li>
            <li>HOME</li>
            <li>MODELS</li>
            <li>SHOPS</li>
            <li>ABOUT</li>
            <li>CONTACT</li>
        </ul>
    </div>
    <div class="head-menu-back"></div>
    <div class="head-ban"></div>
</div>

<div class="main-home-wrapper-container main-inscription-wrapper-container">

    <form action="../core/services.php?action=addUser" method="POST" enctype="multipart/form-data">
        <div class="input-container">
            <label>Username</label>
            <input type="text" name="username" placeholder="Add username">
        </div>
        <div class="input-container">
            <label>Password</label>
            <input type="text" name="password" placeholder="Add password">
        </div>
    </form>


</div>



<script type="text/javascript" src="dist/assets/js/app.min.js"></script>
<script type="text/javascript" src="src/js/utils/less.js"></script>
</body>

</html>