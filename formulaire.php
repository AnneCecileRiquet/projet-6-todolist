<?php
ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
// Afficher les erreurs et les avertissements
error_reporting(E_ALL);

$getFile = file_get_contents("todo.json"); //recherche le fichier Json

    if(isset($_POST['tache'])) {
        $result = trim(filter_input(INPUT_POST, 'tache', FILTER_SANITIZE_STRING)); //Sanitize
        $arrayJson = json_decode($getFile, true); //crée l'objet
        $arrayJson[] = ["id" => sizeof($arrayJson),'tache' => $result, 'status' => true]; //transforme l'objet en tableau
        $encodeJson = json_encode($arrayJson);   //encode dans le json
        file_put_contents("todo.json",$encodeJson);    
    }
    include "contenu.php";

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    
    <title>Document</title>
</head>
<body>

<div class = "container">
    <div class ="toDoList">
        <h1>To-Do-List</h1>
        <div class="scroll">
            <div class ="aFaire">
                <form method='POST'action="formulaire.php"> 
                <p>A FAIRE</p>
                <?= $true; ?><br>
                <input type="submit"   value="Enregistrer"><br>
                <p> ARCHIVE</p>  
                <?= $false; ?><br> 
                </form> 
            </div>
        </div>
        <hr>
        <div class = "Ajouter">
            <form method='POST' action='formulaire.php'> 
            <p>AJOUTER UNE TACHE
            <p>
            <p>La tâche à effectuer</p>

            	<input type="text"  name="tache"required>
            	<input type="submit" name="submit" value="Ajouter"> 
            </form>  
        </div>
    </div>
</div>


</body>
</html>
                     