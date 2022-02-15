<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinicaVeterinaria";


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
                $dbhash = $row[0];
                if(password_verify($pass,$dbhash)){
                    $_SESSION['id'] = $row[1];
                    //header('Location: empleado.php');
                    header('Location: ../../templates/empleado.html');
                }else{
                    echo "<br>No";
                }
            }
        }else{
            echo "La consulta no es valida";
        }
    }

    $conn->close();

?>