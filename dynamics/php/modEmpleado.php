<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="icon" type="image/png" sizes="32x32" href="../statics/media/favicon/logo.png">
        <title>Modificar empleado</title>
    </head>
    <body>
        <h1>Modificar empleado</h1>
        <?php
session_start();
if(isset($_SESSION['id'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ClinicaVeterinaria";
    $conn = new mysqli($servername, $username, $password,$dbname);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

    if(isset($_POST['emp']) && $_POST['emp'] != ""){
        $idEm = $_POST['emp'];
        $_SESSION['idEm'] = $idEm;
        header("Location: modEmpleado.php");
    }
    if(isset($_SESSION['idEm'])){
        if(isset($_POST['terminar'])){unset($_SESSION['idEm']); header('Location: ../../templates/empleado.html');}
        $idEm = $_SESSION['idEm'];
        $sql = "SELECT * FROM Empleado WHERE ID ='".$_SESSION['idEm']. "'";
        $result = mysqli_query($conn, $sql);
        if($result){
            if($row = mysqli_fetch_array($result)){
                echo "<h3>Se ha seleccionado del empleado ".utf8_encode($row[1])." ".utf8_encode($row[2])."</h3>";
                echo "<h3>Correo electronico:  ".utf8_encode($row[3])."</h3>";
                echo "<h3>Telefono: ".utf8_encode($row[4])."</h3>";
                echo "<h3>Salario: ".utf8_encode($row[5])."</h3>";
                echo "<h3>Puesto: ";
                $sqlP = "SELECT Nombre FROM Puesto WHERE ID='".$row[7]. "'";
                $query = mysqli_query($conn, $sqlP);
                if($row2 = mysqli_fetch_array($query)){
                    echo $row2[0];
                }
                echo "</h3><br><br>";
            }
        }

            echo "
                <h4>Recargar para ver cambios</h4>
                <div id='res'>Modificar nombre(s)</div>
                <div id='frm'></div>
        
                <div id='res1'>Modificar apellido(s)</div>
                <div id='frm1'></div>
        
                <div id='res2'>Modificar correo electronico</div>
                <div id='frm2'></div>

                <div id='res3'>Modificar telefono</div>
                <div id='frm3'></div>
        
                <div id='res4'>Modificar salario</div>
                <div id='frm4'></div>
        
                <div id='res5'>Modificar contraseña</div>
                <div id='frm5'></div>

                <div id='res6'>Modificar puesto</div>
                
                <div id='res7'>Modificar empleadp</div>";
        
            
            if(isset($_POST['newName']) && $_POST['newName'] != ""){
                $newName = $_POST['newName'];
                $sql = "UPDATE Empleado SET Nombres='".$newName."' WHERE ID='".$idEm."'";
                $mod = mysqli_query($conn, $sql);
            }
            if(isset($_POST['newLastname']) && $_POST['newLastname'] != ""){
                $newLastname = $_POST['newLastname'];
                $sql = "UPDATE Empleado SET Apellidos='".$newLastname."' WHERE ID='".$idEm."'";
                $mod = mysqli_query($conn, $sql);
            }
            if(isset($_POST['newDiag']) && $_POST['newDiag'] != ""){
                $newDiag = $_POST['newDiag'];
                $sql = "UPDATE Mascota SET Diagnostico='".$newDiag."' WHERE ID='".$idEm."'";
                $mod2 = mysqli_query($conn, $sql);
            }
            if(isset($_POST['del'])){
                $sql = "DELETE FROM Mascota WHERE ID='".$idEm."'";
                if(mysqli_query($conn, $sql)){
                    unset($_SESSION['idEm']); 
                    header('Location: ../../templates/empleado.html');
                }
            }
            if(isset($_POST['vet'])){
                $newVet = $_POST['vet'];
                $sql = "UPDATE Mascota SET Veterinario='".$newVet."' WHERE ID='".$idEm."'";
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
        echo "<form action='modEmpleado.php' method='POST'><button name='terminar'>Terminar</button></form>";
        
    }else{
        echo "<form action='modEmpleado.php' method='POST'>
        <label>Selecciona Empleado:</label>";
        echo "<select name='emp'";
        $sql = "SELECT ID,Nombres,Apellidos FROM Empleado";
        $result = mysqli_query($conn, $sql);
        do{
            echo "<option value='".$row[0]."'>".utf8_encode($row[1])." ".utf8_encode($row[2])."</option>";
        }while ($row = mysqli_fetch_array($result));
        echo "    </select><br><br>";
        echo "<input type='submit' name='enviar'></form>";
    }
}else{
    echo "<a href='../../'>Inicia sesión</a>";
}
?>
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/modEmpleado.js"></script>
</html>