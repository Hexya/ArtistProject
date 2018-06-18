<?php
Class ContentManager{
    // Propriétés
    private $bdd;
    // constructor
    public function __construct(){
        require_once('Connexion.php');
        $connexion = Connexion::getInstance();
        $this->bdd = $connexion->bdd;
    }
        // methodes
        /**
        * 
        */
        public function addCat($pPost, $pFIles){
            //CONSTRUCT code

            // Verifier si on a un fichier image
            $image="";
            if(!empty($pFIles['picture']['tmp_name'])){
                $uniq = uniqid();
                // uniqid est une methode native de php qui renvoi un numéo unique
                // cela permet d'être sur de ne pas avoir 2fois le même fichier image
                move_uploaded_file($pFIles['picture']['tmp_name'], "../dist/imgUploaded/category/".$uniq.$pFIles['picture']['name']);
                $image = $uniq.$pFIles['picture']['name'];
            }
            $title = mb_convert_case($pPost['title'], MB_CASE_TITLE, "UTF-8");
            $query = $this->bdd->prepare('INSERT INTO category (cat_title,cat_pict) VALUES ("'.$title.'", "'.$image.'")');
            $query->execute();
        }


    private function createKey($pNumber){
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@#%';
        $arrayChars = str_split($chars);
        $response = '';
            for($i=0; $i < $pNumber; $i++) {
                $random = rand(0, strlen($chars) -1);
                $response.=$arrayChars[$random];
        }
        return $response;
    }

    public function addArt($pPost, $pFIles){
        //CONSTRUCT code

        // Verifier si on a un fichier image
        $avatar="";
        if(!empty($pFIles['avatar']['tmp_name'])){
            $uniq = uniqid();
            move_uploaded_file($pFIles['avatar']['tmp_name'], "../dist/imgUploaded/artiste/".$uniq.$pFIles['avatar']['name']);
            $avatar = $uniq.$pFIles['avatar']['name'];
        }
        $firstname = mb_convert_case($pPost['firstname'], MB_CASE_TITLE, "UTF-8");
        $name = mb_convert_case($pPost['name'], MB_CASE_UPPER, "UTF-8");//maj
        $address = $pPost['address'];
        $city = $pPost['city'];
        $country = $pPost['country'];
        $email = $pPost['email'];
        $lat = $pPost['lat'];
        $lon = $pPost['lon'];
        $pseudo = $pPost['pseudo'];
        $active = 0;
        if(isset($pPost["active"])) {
            $active = 1;
        }
        $date = date("Y-m-d H:i:s");
        //$salt = $this->createKey(22);

        //mot de passe encrypté
        $options = [
          'cost' => 11,
          // 'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
         'salt' => $salt
        ];
        $password = password_hash($pPost['password'], PASSWORD_BCRYPT, $options);

        $query = $this->bdd->prepare('INSERT INTO artiste (firstname, name,  address, city, country, email, lat, lon, password, salt, pseudo, avatar, active, updated_at) 
          VALUES ("'.$firstname.'", "'.$name.'", "'.$address.'", "'.$city.'", "'.$country.'", "'.$email.'", "'.$lat.'", "'.$lon.'", "'.$password.'", "'.$salt.'", "'.$pseudo.'", "'.$avatar.'", "'.$active.'", "'.$date.'")');
        $query->execute();
    }


    public function getArtisteSelect() {
        $query = $this->bdd->prepare('SELECT * FROM artiste WHERE active=1');
        $query->execute();

        $results = $query->fetchAll();

        $response = '<select name="artiste" class="form-control">';

        foreach($results as $artiste) {
            $response.= '<option value="'.$artiste['id'].'">'.$artiste['firstname'].' '.$artiste['name'].'</option>';
        }
        $response.= '</select>';
        return $response;
    }

    public function getCategorySelect() {
        $query = $this->bdd->prepare('SELECT * FROM category WHERE cat_active=1');
        $query->execute();

        $results = $query->fetchAll();

        $response = '<select name="category" class="form-control">';

        foreach($results as $category) {
            $response.= '<option value="'.$category['cat_id'].'">'.$category['cat_title'].'</option>';
        }
        $response.= '</select>';
        return $response;
    }

    public function addArtwork($pPost, $pFiles) {
        //CONSTRUCT code

        // Verif champs vide
        $_SESSION['errors'] = array();
        if(empty($pPost['title'])) {
            $_SESSION['errors']['title'] = 'A title must be specified';
        }
        if(empty($pPost['desc'])) {
            $_SESSION['errors']['desc'] = 'A description must be specified';
        }
        if(empty($pFiles['media']['tmp_name'])) {
            $_SESSION['errors']['media'] = 'A media must be selected';
        }

        // Verifier si on a un fichier image
        $image = "";
        if (!empty($pFiles['media']['tmp_name'])) {
            $uniq = uniqid();
            // uniqid est une methode native de php qui renvoi un numéo unique
            // cela permet d'être sur de ne pas avoir 2fois le même fichier image
            move_uploaded_file($pFiles['media']['tmp_name'], "../dist/imgUploaded/artwork/" . $uniq . $pFiles['media']['name']);
            $image = $uniq . $pFiles['media']['name'];
        }
        $title = mb_convert_case($pPost['title'], MB_CASE_TITLE, "UTF-8");
        $desc = addslashes(htmlentities(htmlspecialchars($pPost['desc'])));
        $active = 0;
        if (isset($pPost["active"])) {
            $active = 1;
        }
        $artiste = $pPost['artiste'];
        $category = $pPost['category'];
        $date = date("Y-m-d H:i:s");
        //var_dump($_SESSION['errors']);
        if (count($_SESSION['errors']) == 0) {
            $query = $this->bdd->prepare('INSERT INTO artwork (art_title, art_desc, art_media, art_active, art_artiste, art_category, art_updated_at) 
              VALUES ("' . $title . '", "' . $desc . '", "' . $image . '", "' . $active . '", "' . $artiste . '", "' . $category . '", "' . $date . '")');
            $query->execute();
        } else {
            $_SESSION['errors']['post'] = $pPost;
        }
    }

    public function getAllArtwork() {

        $query = $this->bdd->prepare('SELECT * FROM artwork JOIN artiste ON artwork.art_artiste = artiste.id JOIN category ON artwork.art_category = category.cat_id ORDER BY art_updated_at');
        $query->execute();

        $results = $query->fetchAll();
        foreach($results as $artwork) {
            $response.= '<div class="container-cards">
                            <div class="top-bloc"><div class="top-bloc-container"><img src="./dist/imgUploaded/category/'.$artwork['cat_pict'].'"></div></div>
                            <a href="artwork.php?idart='.$artwork['art_id'].'" class="mid-bloc"><img src="./dist/imgUploaded/artwork/'.$artwork['art_media'].'"></a>
                            <div class="bot-bloc">
                                <div class="bot-bloc-container">
                                    <p class="article-title">'.$artwork['art_title'].'</p>
                                    <p>'.$artwork['pseudo'].' | '.$artwork['art_updated_at'].'</p>
                                    <p>'.$artwork['art_desc'].'</p>
                                </div>
                            </div>
                        </div>';
        }
        return $response;
    }
    public function getArtwork() {
        $query = $this->bdd->prepare('SELECT * FROM artwork JOIN artiste ON artwork.art_artiste = artiste.id JOIN category ON artwork.art_category = category.cat_id WHERE art_id = '.$_GET['idart'].' ORDER BY art_updated_at');
        $query->execute();

        $results = $query->fetchAll();
        foreach($results as $artwork) {
            $response.= '<div class="container-cards">
                            <div class="top-bloc"><div class="top-bloc-container"><img src="./dist/imgUploaded/category/'.$artwork['cat_pict'].'"></div></div>
                            <div class="mid-bloc"><img src="./dist/imgUploaded/artwork/'.$artwork['art_media'].'"></div>
                            <div class="bot-bloc">
                                <div class="bot-bloc-container">
                                    <p class="article-title">'.$artwork['art_title'].'</p>
                                    <p>'.$artwork['pseudo'].' | '.$artwork['art_updated_at'].'</p>
                                    <p>'.$artwork['art_desc'].'</p>
                                </div>
                            </div>
                        </div>';
        }
        return $response;
    }
        // Getter/Setter
    }