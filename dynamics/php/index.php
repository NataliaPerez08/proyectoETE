<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ClinicaVeterinaria";


    $conn = new mysqli($servername, $username, $password,$dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    //Validar sesión
    if(isset($_POST['usr']) && isset($_POST['pass'])){
        $usr=$_POST['usr'];
        $pass=$_POST['pass'];
        
        $sql = "SELECT Contraseña,ID FROM Empleado WHERE CorreoE ='". $usr. "'";
        
        $result = mysqli_query($conn,$sql);
        if ($result){
            if($row = mysqli_fetch_array($result)){
                //$dbhash = $row[0];
                //Temporal
                $dbhash = password_hash($pass,PASSWORD_DEFAULT,[15]);
                if(password_verify($pass,$dbhash)){
                    $_SESSION['id'] = $row[1];
                    header('Location: ../../templates/empleado.html');
                }else{
                    echo "<br>No";
                }
            }
        }else{
            echo "La consulta no es valida";
        }
    }else{ echo "Revisa la entrada";}

    $conn->close();

?>