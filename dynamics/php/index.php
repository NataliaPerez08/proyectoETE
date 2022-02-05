<?php
    
    $se = "Usuario: ";
    echo "Hola  ".$se;
    if(isset($_POST['usr']) && isset($_POST['pass'])){
        $usr=$_POST['usr'];
        echo "Tu nombre es: ".$usr;
    }
?>