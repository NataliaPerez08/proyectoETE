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

    
    if(isset($_POST['terminar'])){unset($_SESSION['client']); header('Location: ../..');}
    

    if(isset($_SESSION['client'])){
        $client = $_SESSION['client'];
        $sql = "SELECT Nombres,Apellidos, Mascotas FROM Cliente WHERE ID ='". $client. "'";
        $result = mysqli_query($conn,$sql);
        if($row = mysqli_fetch_array($result)){
            echo "Hola ".$row[0]." ".$row[1];
            $pets = $row[2];    
            $tmp = explode(",",$pets);
            echo "<table>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Tipo</th>
                    <th>Veterinario</th>
                    <th>Diagnostico</th>
                    <th>Procedimientos</th>
                </tr>";
                for ($i=0; $i < count($tmp); $i++) { 
                    $sql = "SELECT * FROM Mascota WHERE ID ='". $tmp[$i]. "'";
                    $result = mysqli_query($conn, $sql);
                    while($row3 = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>".$row3[2]."</td>";
                        echo "<td>".$row3[3]."</td>";
                        echo "<td>".$row3[4]."</td>";
                        //echo "<td>".$row3[5]."</td>";
                        $sql = "SELECT Nombres,Apellidos FROM Empleado WHERE ID ='".$row3[5]. "'";
                        $result = mysqli_query($conn, $sql);
                        if($row2 = mysqli_fetch_array($result)){
                            echo "<td>".$row2[0]." ".$row2[1]."</td>";
                        }else{
                            echo "<td>No se encontro</td>";
                        }

                        echo "<td>".$row3[6]."</td>";
                        //echo "<td>".$row3[7]."</td>";
                        $tmpP = explode(",",$row3[7]);
                        for($j=0; $j < count($tmpP); $j++){
                            $sql = "SELECT Nombre, Descripcion FROM Procedimiento WHERE ID ='".$tmpP[$j]. "'";
                            $result = mysqli_query($conn, $sql);
                            if($row2 = mysqli_fetch_array($result)){
                                echo "<td>".$row2[0].". ".$row2[1]."<br></td>";
                            }else{
                                echo "<td></td>";
                            }
                        }
                        echo "</tr>";
                    }
                }
            }
            echo "<form action='infoCliente.php' method='POST'><button name='terminar'>Terminar</button></form>";
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