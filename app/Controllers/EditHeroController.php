<?php 

//Si la personne est connecté + admin alors:
if( (isset($_SESSION['user'])) && ($_SESSION['user']['role'] === "admin")){

    if(isset($_GET['id'])){
        $id = htmlspecialchars($_GET['id']);

        //Je fais une requête sql pour récupérer le heros par l'id
        $query = "SELECT `id`, `name`, `magic_power`, `image`, `description` 
        FROM `heros` WHERE `id` = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        //on met la reponse dans la variable hero
        $hero = $statement->fetch();

        //Si il y a un hero alors:
        if($hero){



            require_once(__DIR__ . '/../Views/edithero.view.php');
        }else{
            redirectToRoute('404', 404);
        }

    }else{
        redirectToRoute('404', 404);
    }

}else{
    redirectToRoute('404', 404);
}
    
