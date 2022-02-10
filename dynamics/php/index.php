<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinicaVeterinaria";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    //Validar sesión
    if(isset($_POST['usr']) && isset($_POST['pass'])){
        $usr=$_POST['usr'];
        $pass=$_POST['pass'];
        echo "Tu nombre es: ".$usr."<br>";
     
        
        $sql = "SELECT * FROM Empleado WHERE ID=".$usr;
        //$sql = 'SELECT Telefono FROM Empleado WHERE Nombre="Abi"';
        //$usr = "Abi";
        
        $result = mysqli_query($conn,$sql);
        if ($result){
            $row = mysqli_fetch_array($result);
            echo $row[0];
        }else{
            echo "Nos se ha encontrado";
        }
        //$consulta = "SELECT no_cuenta FROM usuario WHERE no_cuenta=".$cuenta;
        //$respuesta = mysqli_query($conexion, $consulta);
        //if(!$row = mysqli_fetch_array($respuesta)){
        
    }

    $conn->close();

?>