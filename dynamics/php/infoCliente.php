<!DOCTYPE html>
<html lang="spa" dir="ltr">
  <head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../statics/css/cliente.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../../statics/media/favicon/logo.png">
	<title>Clínica veterinaria</title>
  </head>
  <body>
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
        echo "<nav>";
        if($row = mysqli_fetch_array($result)){
            echo "<p>Hola ".$row[0]." ".$row[1]."</p>";
            echo "<form action='infoCliente.php' method='POST'><button name='terminar'>Terminar</button></form></nav>";

            echo "Esta es la información registrada de sus mascotas";

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
                        for($j=0; $j < count($tmpP)-1; $j++){
                            $sql = "SELECT Nombre, Descripcion,Fecha,Costo FROM Procedimiento WHERE ID ='".$tmpP[$j]. "'";
                            $result = mysqli_query($conn, $sql);
                            if($row2 = mysqli_fetch_array($result)){
                                echo "<td>";
                                echo "<p>Nombre:".$row2[0]."</p>";
                                echo "<p>Descripción:".$row2[1]."</p>";
                                echo "<p>Fecha:".$row2[2]."</p>";
                                echo "<p>Costo:".$row2[3]."</p>";
                                echo "</td>";
                            }
                        }
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
echo "</body></html>"
?>