<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Puestos</title>
        <link rel="stylesheet" href="../../statics/css/formularios.css">
        <link rel="icon" type="image/png" sizes="32x32" href="../../statics/media/favicon/logo.png">
    </head>
    <body>
        <?php
        session_start();
        if(isset($_SESSION['id'])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "clinicaVeterinaria";
            $conn = new mysqli($servername, $username, $password,$dbname);
            if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
            echo "<br><a href='../../templates/empleado.html'>Regresar</a><br><br>";
             
            echo "<h1>Registro de nuevo puesto:</h1>
            <form action='crearpuesto.php' method='POST'>
            <label>Nombre:</label>
            <input type='text' name='name'>

            <label>Descripción:</label>
            <input type='text' name='des'>";
            echo "<input type='submit' value='submit'>";
            echo  "</form>";

            // Registro Puesto
            $n = isset($_POST['name']);
            $d = isset($_POST['des']);
            
            if($n && $d){
                $name = $_POST['name'];
                $des = $_POST['des'];

                $n = $name != "";
                $d = $des != "";
                if($n && $d){
                    $sql = "SELECT * FROM Puesto WHERE Nombre ='". $name. "'";
                    $result = mysqli_query($conn,$sql);
                    if ($row = mysqli_fetch_array($result)){
                    echo "Ese puesto ya fue registrado";
                    }else{
                    $sql = sprintf("INSERT INTO Puesto (Nombre, Descripcion) VALUES ('%s','%s')",$name, $des);
            
                    if (mysqli_query($conn, $sql)) {
                        echo "Se ha registrado existosamente";
                        //header('Location: cliente.php');
                        } else {
                        echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }
                }else{ echo "Verifica la entrada";}
            }
        }else{
            echo "<a href='../../'>Inicia sesión</a>";
        }
    ?>
    </body>
</html>