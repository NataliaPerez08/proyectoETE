<?php
session_start();
if(isset($_SESSION['id'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ClinicaVeterinaria";
    $conn = new mysqli($servername, $username, $password,$dbname);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    

    if(isset($_POST['client']) && $_POST['client'] != ""){
        $idClient = $_POST['client'];
        $_SESSION['idClient'] = $idClient;
        header("Location: modCliente.php");
    }

    if(isset($_SESSION['idClient'])){
        if(isset($_POST['terminar'])){unset($_SESSION['idClient']); header('Location: ../../templates/empleado.html');}

        $idC = $_SESSION['idClient'];
        $sql = "SELECT * FROM Cliente WHERE ID ='". $idC. "'";
        $result = mysqli_query($conn, $sql);
        if($result){
            if($row = mysqli_fetch_array($result)){
            echo "<h2>Se ha seleccionado el cliente: ".utf8_encode($row[1])." ".utf8_encode($row[2])."</h2><br><br>";
            echo "<h3>Correo Electronico:".utf8_encode($row[3])."<br>Telefono:".utf8_encode($row[4])."</h2><br><br>";
            echo "<h3>Mascotas registradas: ".utf8_encode($row[5])."</h2><br><br>";
            }
            echo "<body>
                <div id='res'>Modificar nombres</div>
                <div id='frm'></div>

                <div id='res1'>Modificar apellidos</div>
                <div id='frm1'></div>

                <div id='res2'>Modificar telefono</div>
                <div id='frm2'></div>

                <div id='res3'>Modificar correo electronico</div>
                <div id='frm3'></div>

                <div id='res4'>Modificar mascotas</div>
                <div id='frm4'></div>

                <div id='res5'>Registrar mascota</div>        
                </body>";

            echo "Recargar para ver cambios";
            if(isset($_POST['newLastname']) && $_POST['newLastname'] != ""){
                $newLastname = $_POST['newLastname'];
                $sql = "UPDATE Cliente SET Apellidos='".$newLastname."' WHERE ID='".$idC."'";
                $mod1 = mysqli_query($conn, $sql);
                //if($mod1){echo "<br>Se ha modificado exitosamente el apellido. Recargar para ver cambio";$_POST['newName']= "";}
            }
            if(isset($_POST['newName']) && $_POST['newName'] != ""){
                $newName = $_POST['newName'];
                $sql = "UPDATE Cliente SET Nombres='".$newName."' WHERE ID='".$idC."'";
                $mod = mysqli_query($conn, $sql);
            }
            if(isset($_POST['newTel']) && $_POST['newTel'] != ""){
                $newTel = $_POST['newTel'];
                $sql = "UPDATE Cliente SET Telefono='".$newTel."' WHERE ID='".$idC."'";
                $mod2 = mysqli_query($conn, $sql);
            }
            if(isset($_POST['newEmail']) && $_POST['newEmail'] != ""){
                $newEmail = $_POST['newEmail'];
                $sql = "UPDATE Cliente SET CorreoE='".$newEmail."' WHERE ID='".$idC."'";
                $mod2 = mysqli_query($conn, $sql);
            }
        }
        echo "<form action='modCliente.php' method='POST'><button name='terminar'>Terminar</button></form>";
    }else{
        echo "<h2>Seleccionar mascota a modificar</h2>
        <form action='modmascota.php' method='POST'>
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
}else{
    echo "Inicia sesión";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="icon" type="image/png" sizes="32x32" href="../statics/media/favicon/logo.png">
        <title>Modificar Cliente</title>
    </head>
    
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/cliente.js"></script>
</html>