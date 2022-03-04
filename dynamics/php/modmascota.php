<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="icon" type="image/png" sizes="32x32" href="../statics/media/favicon/logo.png">
        <title>Modificar Mascota</title>
    </head>
    <body>
        <h1>Modificar Mascota</h1>
<?php
session_start();
if(isset($_SESSION['id'])){
    if(isset($_SESSION['idClient'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ClinicaVeterinaria";
        $conn = new mysqli($servername, $username, $password,$dbname);
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

        if(isset($_POST['pet']) && $_POST['pet'] != ""){
            $idPet = $_POST['pet'];
            $_SESSION['idPet'] = $idPet;
            header("Location: modMascota.php");
        }
        if(isset($_SESSION['idPet'])){
            if(isset($_POST['terminar'])){unset($_SESSION['idPet']); header('Location: ../../templates/empleado.html');}
            $idPet = $_SESSION['idPet'];
            $sql = "SELECT Nombres,Apellidos FROM Cliente WHERE ID ='".$_SESSION['idClient']. "'";
            $result = mysqli_query($conn, $sql);
            if($result){
                if($row = mysqli_fetch_array($result)){
                    echo "<h2>Se ha seleccionado del cliente ".utf8_encode($row[0])." ".utf8_encode($row[1]);
                }
                $sqlP = "SELECT * FROM Mascota WHERE ID ='". $idPet. "'";
                $query = mysqli_query($conn, $sqlP);
                if($row = mysqli_fetch_array($query)){
                    echo "<br> la mascota ".utf8_encode($row[2])."</h2>";
                    echo "<h4>Edad: ".utf8_encode($row[3])." <br>Tipo: ".utf8_encode($row[4]);
                    $sqlV = "SELECT Nombres,Apellidos FROM Empleado WHERE ID ='". $row[5]. "'";
                    $query = mysqli_query($conn,$sqlV);
                    if($row2 = mysqli_fetch_array($query)){
                        echo "<br>Veterinario: ".utf8_encode($row2[0])." ".utf8_encode($row2[1])."<br>Diagnostico: ".utf8_encode($row[6]);
                        echo "<br>Procedimientos: ";
                        $tmp = explode(",", $row[7]);
                        for ($i=0; $i < count($tmp)-1 ; $i++) { 
                            $sqlP = "SELECT * FROM Procedimiento WHERE ID ='". $tmp[$i]. "'";
                            $query = mysqli_query($conn, $sqlP);
                            if($row = mysqli_fetch_array($query)){
                            echo $row[1].", ";
                            }
                        }
                        echo "</h4><br>";
                    }

                    echo "
                        <h4>Recargar para ver cambios</h4>
                        <div id='res'>Modificar nombre</div>
                        <div id='frm'></div>
                
                        <div id='res1'>Modificar edad</div>
                        <div id='frm1'></div>
                
                        <div id='res2'>Modificar tipo</div>
                        <div id='frm2'></div>

                        <div id='res3'>
                            <form action='modMascota.php' method='GET'>
                            <button name='modVet'>Modificar veterinario</button>
                            </form> 
                        </div>
                        <div id='frm3'></div>
                
                        <div id='res4'>Modificar Diagnostico</div>
                        <div id='frm4'></div>
                
                        <div id='res5'>Registrar procedimiento</div>
                        <div id='res6'>Modificar procedimiento</div>
                        <div id='res7'>Borrar registro de la mascota seleccionada</div>
                        <div id='frm5'></div>           
                        ";
                
                    
                    if(isset($_POST['newName']) && $_POST['newName'] != ""){
                        $newName = $_POST['newName'];
                        $sql = "UPDATE Mascota SET Nombre='".$newName."' WHERE ID='".$idPet."'";
                        $mod = mysqli_query($conn, $sql);
                    }
                    if(isset($_POST['newAge']) && $_POST['newAge'] > 0){
                        $newAge = $_POST['newAge'];
                        $sql = "UPDATE Mascota SET Edad='".$newAge."' WHERE ID='".$idPet."'";
                        $mod2 = mysqli_query($conn, $sql);
                    }
                    if(isset($_POST['newType']) && $_POST['newType'] != ""){
                        $newType = $_POST['newType'];
                        $sql = "UPDATE Mascota SET Tipo='".$newType."' WHERE ID='".$idPet."'";
                        $mod2 = mysqli_query($conn, $sql);
                    }
                    if(isset($_POST['newDiag']) && $_POST['newDiag'] != ""){
                        $newDiag = $_POST['newDiag'];
                        $sql = "UPDATE Mascota SET Diagnostico='".$newDiag."' WHERE ID='".$idPet."'";
                        $mod2 = mysqli_query($conn, $sql);
                    }
                    if(isset($_POST['del'])){
                        $sql = "DELETE FROM Mascota WHERE ID='".$idPet."'";
                        if(mysqli_query($conn, $sql)){
                            unset($_SESSION['idPet']); 
                            header('Location: ../../templates/empleado.html');
                        }
                    }
                    if(isset($_POST['vet'])){
                        $newVet = $_POST['vet'];
                        $sql = "UPDATE Mascota SET Veterinario='".$newVet."' WHERE ID='".$idPet."'";
                        $mod2 = mysqli_query($conn, $sql);
                    }
                    if(isset($_GET['modVet'])){
                        echo "<br><br><div>";
                        echo "<form action='modMascota.php' method='POST'>";
                        echo '<label>Veterinario:</label>';
                        echo "<select name='vet'";
                            $id=1;
                            $sql = 'SELECT ID,Nombres,Apellidos FROM Empleado WHERE Cargo='.$id;
                            $result = mysqli_query($conn, $sql);
                            do{
                                echo "    <option value='".$row[0]."'>".utf8_encode($row[1])." ".utf8_encode($row[2])."</option>";
                            }while($row = mysqli_fetch_array($result));
                            echo "    </select><br><br>";
                        echo "<input type='submit' value='submit'></form></div>";
                    }
                }
            } 
            echo "<form action='modMascota.php' method='POST'><button name='terminar'>Terminar</button></form>";
            
        }else{
            $sql = "SELECT Nombres,Apellidos FROM Cliente WHERE ID ='".$_SESSION['idClient']. "'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo "<h2>Seleccionar mascota a modificar del cliente ".utf8_encode($row[0])." ".utf8_encode($row[1])."</h2>";
            echo "<form action='modMascota.php' method='POST'>
            <label>Selecciona Mascota:</label>";
            echo "<select name='pet'";
            $sql = "SELECT ID,Nombre FROM Mascota WHERE Propietario ='".$_SESSION['idClient']. "'";
            $result = mysqli_query($conn, $sql);
            do{
                echo "<option value='".$row[0]."'>".utf8_encode($row[1])."</option>";
            }while ($row = mysqli_fetch_array($result));
            echo "    </select><br><br>";
            echo "<input type='submit' name='enviar'></form>";
        }
    }else{ echo "<a href='modCliente.php'>Selecciona Cliente Primero</a>";}  
}else{
    echo "<a href='../../'>Inicia sesión</a>";
}
?>
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/mascota.js"></script>
</html>