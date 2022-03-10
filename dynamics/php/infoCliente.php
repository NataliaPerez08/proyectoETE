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

    
    if(isset($_POST['terminar'])){unset($_SESSION['client']); header('Location: ../../templates/empleado.html');}
    

    if(isset($_SESSION['client'])){
        $client = $_SESSION['client'];
        $sql = "SELECT Nombres,Apellidos, Mascotas FROM Cliente WHERE ID ='". $client. "'";
        $result = mysqli_query($conn,$sql);
        if($row = mysqli_fetch_array($result)){
            echo "Hola ".$row[0]." ".$row[1];
            $pets = $row[2];    
            $tmp = explode(",",$pets);
                for ($i=0; $i < count($tmp); $i++) { 
                   $sql = "SELECT * FROM Mascota WHERE ID ='". $tmp[$i]. "'";
                    $result = mysqli_query($conn, $sql);
                    while($row3 = mysqli_fetch_array($result)){
                        echo "<table>
                            <tr>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Tipo</th>
                                <th>Veterinario</th>
                                <th>Diagnostico</th>
                                <th>Procedimientos</th>
                            </tr>";
                        echo "<tr>";
                        echo "<td>".$row3[2]."</td>";
                        echo "<td>".$row3[3]."</td>";
                        echo "<td>".$row3[4]."</td>";
                        echo "<td>".$row3[5]."</td>";
                        echo "<td>".$row3[6]."</td>";
                        echo "<td>".$row3[7]."</td>";
                        echo "</tr>";
                    }
            }
        }
        
    }else{
        echo "Inicie sesión con el correo registrado";
    }
    if(isset($_POST['email'])){
        $email=$_POST['email'];
        $sql = "SELECT ID FROM Cliente WHERE CorreoE ='". $email. "'";
        $result = mysqli_query($conn,$sql);
        if ($result){
            if($row = mysqli_fetch_array($result)){  
                $_SESSION['client'] = $row[0];
                header('Location: infoCliente.php');
            }
        }
    }
$conn->close();

?>