<?php

$true = $false = "";

$result = file_get_contents("todo.json");
$json = json_decode($result, true);

    if($json){
        foreach ($json as $key => $value){   
            if(isset($_POST['clic'])) {
            
                foreach ($_POST['clic'] as $key2 => $value2) {
                    if ($value2 == $value["id"]) {
                        $json[$key2]["status"] = false;
                        $jsonData = json_encode($json, true);  
                        file_put_contents("todo.json", $jsonData);  
                    }
                    
                } 
                                              
            }
        }

        $Json = file_get_contents("todo.json");
        $json2 = json_decode($Json, true);
        
        foreach($json2 as $keyy => $valeur) {

            if($valeur["status"]==true){
                
                $true .= '<input type=checkbox name=clic[] value=' . $valeur["id"] . '>' . '<label>' . ' ' .  $valeur["tache"] . '</label><br>';
                
            } else if ($valeur["status"]==false) {
                
                $false .= '<input type=checkbox checked name=clic[] value=' . $valeur["id"] . '>' . '<label><s>' . ' ' . $valeur["tache"] . '</s></label><br>';
                
            }
        }
            
    } else {  

        $true = "(ง ͡ʘ ͜ʖ ͡ʘ)ง  Rien à faire";

    }
    ?>
