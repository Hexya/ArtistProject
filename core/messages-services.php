<?php

/*switch($_POST['action']) {
    case 'addMessage':
        addMessage();
        break;
    case 'loadMessages':
        loadMessages();
        break;
}

function loadMessages() {
    require('Connexion.php');

    $sql = 'SELECT * FROM messages';
    $req = mysqli_query($connexion, $sql) or die();
    if(mysqli_num_rows($req)>1) {
        while($msg = mysqli_fetch_array($req)) {
            echo '<div>'.$msg['mes_text'].'</div>'
        }
    }else {
        echo 'pas de messages';
    }
}
    mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

    function addMessage() {
    require('Connexion.php');

    $sql = 'INSERT INTO messsage (mess_text, mess_date) VALUES ("'.$_POST['msg'].'", "'.date('Y-m-d h:m:s').'")';
    mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    echo "Message added!";
}*/

Class MessageServices
{
    // Propriétés
    private $bdd;

    // constructor
    public function __construct()
    {
        require_once('Connexion.php');
        $connexion = Connexion::getInstance();
        $this->bdd = $connexion->bdd;
    }

    public function addMessage() {

        $query = $this->bdd->prepare('INSERT INTO messages (mess_text, mess_date) VALUES ("'.$_POST['msg'].'", "'.date('Y-m-d h:m:s').'")');
        $query->execute();
        echo "Message added!";
    }
}