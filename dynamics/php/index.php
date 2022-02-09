<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    //Validar sesión
    if(isset($_POST['usr']) && isset($_POST['pass'])){
        $usr=$_POST['usr'];
        $usr=$_POST['pass'];
        echo "Tu nombre es: ".$usr;
    }

    $conn->close();

?>