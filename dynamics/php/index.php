<?php
    
    $se = "usuario";
    echo "Hola  ".$se;
   


    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    if(isset($_POST['usr']) && isset($_POST['pass'])){
        $usr=$_POST['usr'];
        echo "Tu nombre es: ".$usr;
    }
    $conn->close();

?>