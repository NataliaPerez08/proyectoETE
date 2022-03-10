<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="icon" type="image/png" sizes="32x32" href="../statics/media/favicon/logo.png">
        <title>Modificar procedimiento</title>
    </head>
    <body>
        <h1>Modificar procedimiento</h1>
<?php
session_start();
if(isset($_SESSION['id'])){
    if(isset($_POST['procedure']) && $_POST['procedure'] > 0){
        $_SESSION['idPro'] =  $_POST['procedure'];
    }
    if(isset($_SESSION['idClient'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ClinicaVeterinaria";
        $conn = new mysqli($servername, $username, $password,$dbname);
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

        if(isset($_SESSION['idPet']) && isset($_GET['details'])){
            echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Costo</th>
                </tr>";
            $sql = "SELECT * FROM Procedimiento WHERE Paciente='".$_SESSION['idPet']. "'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                echo "<td>".$row[2]."</td>";
                echo "<td>".$row[4]."</td>";
                echo "<td>".$row[3]."</td>";
                echo "</tr>";
                
            }
            echo "</table>";
        }

        
        if(isset($_SESSION['idPet']) && isset($_SESSION['idPro']) ){
            if(isset($_POST['terminar'])){unset($_SESSION['idPro']); header('Location: ../../templates/empleado.html');}
            $idPet = $_SESSION['idPet'];
            $idPro = $_SESSION['idPro'];
            
            $sql = "SELECT * FROM Procedimiento WHERE ID ='".$idPro. "'";
            $result = mysqli_query($conn, $sql);
            if($row = mysqli_fetch_array($result)){
                echo "<h2> Se ha seleccionado el procedimiento ".$row[1];
                $name=$row[1];
                $des=$row[2];
                $date=$row[3];
                $cost=$row[4];
                $sqlP = "SELECT * FROM Mascota WHERE ID ='". $idPet. "'";
                $query = mysqli_query($conn, $sqlP);
                if($row = mysqli_fetch_array($query)){
    
                    echo " de ".utf8_encode($row[2])."</h2>";
                    echo "<h4>Edad: ".utf8_encode($row[3])." <br>Tipo: ".utf8_encode($row[4]);
                    $sqlV = "SELECT Nombres,Apellidos FROM Empleado WHERE ID ='". $row[5]. "'";
                    $query = mysqli_query($conn,$sqlV);
                    if($row2 = mysqli_fetch_array($query)){
                        echo "<br>Veterinario: ".utf8_encode($row2[0])." ".utf8_encode($row2[1])."<br>Diagnostico: ".utf8_encode($row[6]);
                    }else{ echo "<br>No se ha encontrado veterinario registrado";}
                    echo "<br>Procedimientos: ";
                    $tmp = explode(",", $row[7]);
                    for ($i=0; $i < count($tmp)-1 ; $i++) { 
                        $sqlP = "SELECT * FROM Procedimiento WHERE ID ='". $tmp[$i]. "'";
                        $query = mysqli_query($conn, $sqlP);
                        if($row = mysqli_fetch_array($query)){
                        echo $row[1].", ";
                        }
                    }
                    $sql = "SELECT Nombres,Apellidos FROM Cliente WHERE ID ='".$_SESSION['idClient']. "'";
                    $result = mysqli_query($conn, $sql);
                    if($row = mysqli_fetch_array($result)){
                        echo "<br>Propietario: ".utf8_encode($row[0])." ".utf8_encode($row[1]);
                    }
                    echo "</h4><br>";
                }
                        echo "<h2>Información procedimieto</h2>";
                        echo "<h4>Nombre: ".$name."<br>Descripción: ".$des."<br>Fecha: ".$date."<br>Costo: ".$cost;
                        echo "
                            <h4>Recargar para ver cambios</h4>
                    
                            <div id='res'>Modificar nombre</div>
                            <div id='frm'></div>
                    
                            <div id='res1'>Modificar descripción</div>
                            <div id='frm1'></div>
                    
                            <div id='res2'>Modificar fecha</div>
                            <div id='frm2'></div>
                    
                            <div id='res3'>Modificar costo</div>
                            <div id='frm3'></div>
    
                            <div id='res4'>Eliminar registro</div>
                            <div id='frm4'></div>
                            </div>
                            ";
                    
                        
                        if(isset($_POST['newName']) && $_POST['newName'] != ""){
                            $newName = $_POST['newName'];
                            $sql = "UPDATE Procedimiento SET Nombre='".$newName."' WHERE ID='".$idPro."'";
                            $mod = mysqli_query($conn, $sql);
                        }
                        if(isset($_POST['newDes']) && $_POST['newDes'] != ""){
                            $newDes = $_POST['newDes'];
                            $sql = "UPDATE Procedimiento SET Descripcion='".$newDes."' WHERE ID='".$idPro."'";
                            $mod2 = mysqli_query($conn, $sql);
                        }
                        if(isset($_POST['newDate']) && $_POST['newDate'] != ""){
                            $newDate = $_POST['newDate'];
                            $sql = "UPDATE Procedimiento SET Fecha='".$newDate."' WHERE ID='".$idPro."'";
                            $mod2 = mysqli_query($conn, $sql);
                        }
                        if(isset($_POST['modCost']) && $_POST['modCost'] >= 0){
                            $newCost = $_POST['modCost'];
                            $sql = "UPDATE Procedimiento SET Costo='".$newCost."' WHERE ID='".$idPro."'"; 
                            $mod2 = mysqli_query($conn, $sql);
                        }
                        if(isset($_POST['del'])){
                            $sql = "DELETE FROM Procedimiento WHERE ID='".$idPro."'";
                            if(mysqli_query($conn, $sql)){
                                unset($_SESSION['idPro']); 
                                header('Location: modMascota.php');
                            }
                        }
            }
            
            echo "<form action='modProcedimiento.php' method='POST'><button name='terminar'>Terminar</button></form>";
            
        }else{
            if(isset($_SESSION['idPet'])){
                $sql = "SELECT Nombre, Procedimiento FROM Mascota WHERE ID ='".$_SESSION['idPet']. "'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                echo "<h2>Seleccionar procedimiento de ".utf8_encode($row[0])."</h2>";
                $tmp = explode(",",$row[1]);
                echo "<form action='modProcedimiento.php' method='POST'>
                <label>Selecciona procedimiento: </label>";
                echo "<input type='hidden' name='prueba'>";
                echo "<select name='procedure'";
                for ($i=-1; $i < count($tmp)-1 ; $i++) { 
                    $sqlP = "SELECT * FROM Procedimiento WHERE ID ='". $tmp[$i]. "'";
                    $query = mysqli_query($conn, $sqlP);
                    if($row = mysqli_fetch_array($query)){
                        echo "<option value='".$row[0]."'> ID: ".utf8_encode($row[0])." ".utf8_encode($row[1])."</option>";
                    }
                }
                echo "    </select><br><br>";
                echo "<input type='submit' name='enviar'></form>";
            }
        }
    }else{ echo "<a href='modCliente.php'>Selecciona Cliente Primero</a>";}  
}else{
    echo "<a href='../../'>Inicia sesión</a>";
}
?>
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/procedimiento.js"></script>
</html>