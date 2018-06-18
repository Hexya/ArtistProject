<?php
session_start();

require('ContentManager.php');
require('messages-services.php');
// Analyse de l'action reçue en GET ou POST
$action;
if(isset($_GET["action"])){
    $action = $_GET["action"];
}elseif(isset($_POST["action"])){
    $action = $_POST["action"];
}else{
    header('Location:../index.html');
}

$cm = new ContentManager();
$ms = new MessageServices();
// Switch case sur l'action reçue
switch($action){
    case 'addCat':
        // Instanciation d'un objet de type ContentManager
        // On déclenche la méthode
        $cm->addCat($_POST, $_FILES);
        // ContentManager::addCar($_POST) est un appel statique a la methode addCat
        header('Location:'.$_SERVER['HTTP_REFERER']);
        // $_SESSION['message'] = "Catégorie correctement ajoutée";
    break;
    case 'addArt':
        $cm->addArt($_POST, $_FILES);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    break;
    case 'addArtwork':
        $cm->addArtwork($_POST, $_FILES);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    break;
    case 'addMessage':
        $ms->addMessage();
        break;
    case 'loadMessages':
        $ms->loadMessages();
        break;
    default:
    $cm=null;
    header('Location:../index.html');
}
