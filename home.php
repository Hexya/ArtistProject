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

        <div class="main-home-wrapper-container">

            <!-- CARDS -->
            <div class="cards-side">

                <?php
                    require('./core/ContentManager.php');
                    $cm = new ContentManager();
                    echo $cm->getAllArtwork();
                ?>
                <p class="latest">LATEST ARTICLE</p>

            </div>

            <!-- ACTU -->
            <div class="actu-side">
                <div class="right-bloc">

                    <div class="search-bloc">
                        <div class="search-title">SEARCH</div>
                        <input class="search-bar" type="text" placeholder="Search...">
                    </div>

                    <div class="abo-bloc">
                        <div class="abo-title">NEXT MAG</div>
                        <div class="abo-img-cont">
                            <div class="abo-img"></div>
                        </div>

                        <div class="soc-bloc">
                            <div class="soc-title">FOLLOW US</div>
                            <div class="soc-log">
                                <div class="log"><i class="fa fa-facebook-square" aria-hidden="true"></i><p>Facebook</p></div>
                                <div class="log"><i class="fa fa-instagram" aria-hidden="true"></i><p>Instagram</p></div>
                                <div class="log"><i class="fa fa-twitter-square" aria-hidden="true"></i><p>Twitter</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        


    <script type="text/javascript" src="dist/assets/js/app.min.js"></script>
    <script type="text/javascript" src="src/js/utils/less.js"></script>
</body>

</html>