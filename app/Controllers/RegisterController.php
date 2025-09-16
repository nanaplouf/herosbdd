<?php

function isNotEmpty ($value){
    //Création d'un tableau vide
    global $arrayError;

    //si le post avec la valeur est vide alors
    if(empty($_POST[$value])){
        //On rapelle le tableau et on lui donne en clé le nom de la $value et en valeur une string
        $arrayError[$value] = "Le champs $value ne peut pas être vide.";
        //On retour le tableau
        return $arrayError;
    }

    //sinon on retourne false
    return false;
}


if(isset($_POST['pseudo'])){

    isNotEmpty('pseudo');
    isNotEmpty('email');
    isNotEmpty('password');
    var_dump($arrayError);

    require_once( __DIR__ . "/../Views/register.view.php" );
}else{

    require_once( __DIR__ . "/../Views/register.view.php" );
}
    