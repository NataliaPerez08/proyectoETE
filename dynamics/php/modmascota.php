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
            if(isset($_POST['terminar'])){unset($_SESSION['idClient']); header('Location: ../../templates/empleado.html');}
            $idPet = $_SESSION['idPet'];
            $sql = "SELECT Nombres,Apellidos FROM Cliente WHERE ID ='". $idC. "'";
            $result = mysqli_query($conn, $sql);
            if($result){
                if($row = mysqli_fetch_array($result)){
                    echo "<h2>Se ha seleccionado del cliente: ".utf8_encode($row[1])." ".utf8_encode($row[2])."</h2>";
                }
                $sqlP = "SELECT * FROM Mascota WHERE ID ='". $idPet. "'";
                $query = mysqli_query($conn, $sqlP);
                if($row = mysqli_fetch_array($result)){
                    echo " las mascota".utf8_encode($row[0]);
                    echo "<body>
                        <div id='res'>Modificar nombre</div>
                        <div id='frm'></div>
                
                        <div id='res1'>Modificar edad</div>
                        <div id='frm1'></div>
                
                        <div id='res2'>Modificar tipo</div>
                        <div id='frm2'></div>
                
                        <div id='res3'>Veterinario</div>
                        <div id='frm3'></div>
                
                        <div id='res4'>Diagnostico</div>
                        <div id='frm4'></div>
                
                        <div id='res5'>Registrar procedimiento</div>
                        <div id='res6'>Modificar procedimiento</div>         
                        </body>";
                
                    echo "Recargar para ver cambios";
                    
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
                }
            } 
            echo "<form action='modCliente.php' method='POST'><button name='terminar'>Terminar</button></form>";
            
        }else{
            echo "<h2>Seleccionar mascota a modificar</h2>
            <form action='modMascota.php' method='POST'>
            <label>Selecciona Mascota:</label>";
            echo "<select name='client'";
            $sql = "SELECT ID,Nombre,Propietario FROM Mascota";
            $result = mysqli_query($conn, $sql);
            do{
                echo "<option value='".$row[0]."'>Nombre:".utf8_encode($row[1])." Propietario:".utf8_encode($row[2])."</option>";
            }while ($row = mysqli_fetch_array($result));
            echo "    </select><br><br>";
            echo "<input type='submit' name='enviar'></form>";
        }
    }else{ echo "<a href='modCliente.php'>Selecciona Cliente Primero</a>"}  
}else{
    echo "<a href='../../'>Inicia sesión</a>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="icon" type="image/png" sizes="32x32" href="../statics/media/favicon/logo.png">
        <title>Modificar Mascota</title>
    </head>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/mascota.js"></script>
</html>