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
        echo "Tu nombre es: ".$usr."<br> Tu contraseña es: ".$pass;
     
        
        //$sql = 'SELECT * FROM Empleado WHERE ID='.$usr;
        //$sql = "SELECT Telefono FROM Empleado WHERE CorreoE='ny@gmail.com'";
        
        $sql = "SELECT Contraseña FROM Empleado WHERE CorreoE ='". $usr. "'";
        //$usr = "Abi";
        
        $result = mysqli_query($conn,$sql);
        if ($result){
            if($row = mysqli_fetch_array($result)){
                $dbhash = $row[0];
                echo "<br>".$pass."<br>".$dbhash;
                if(password_verify($pass,$dbhash)){
                    echo "<br>Sí";
                    header('Location: ../../templates/empleado.html');
                }else{
                    echo "<br>No";
                }
            }
        }else{
            echo "La consulta no es valida";
        }
        //$consulta = "SELECT no_cuenta FROM usuario WHERE no_cuenta=".$cuenta;
        //$respuesta = mysqli_query($conexion, $consulta);
        //if(!$row = mysqli_fetch_array($respuesta)){
        //$query_getShows = "SELECT * FROM toho_shows WHERE toho_shows.show ='". $show. "'";
        /*$len = count($row);
        for ($i=0; $i <$len-1; $i++) { 
            $dbpass = $row[$i];
            $ver = password_verify($pass,$dbpass);
            echo "<br>".$pass."<br> ver:".$ver;
        }*/
    }

    $conn->close();

?>