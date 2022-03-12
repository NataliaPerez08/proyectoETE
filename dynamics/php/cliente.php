<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Registro cliente</title>
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
            echo "<h1>Registro Cliente</h1>
            <form action='cliente.php' method='POST'>
            <label>Nombre(s):</label>
            <input type='text' name='name'>

            <label>Apellidos:</label>
            <input type='text' name='lastname'>

            <label>Correo Electronico:</label>
            <input type='email' name='email'>

            <label>Telefono:</label>
            <input type='tel' name='telephone'>";
            
            echo "<input type='submit' value='submit'>";
            echo  "</form>";

            // Registro Cliente
            $n = isset($_POST['name']);
            $ln = isset($_POST['lastname']);
            $em = isset($_POST['email']);
            $tp = isset($_POST['telephone']);
            if($n && $ln && $em && $tp){
                $name=$_POST['name'];
                $lastname=$_POST['lastname'];
                $email = $_POST['email'];
                $telephone = $_POST['telephone'];

                $n = $name != "";
                $ln = $lastname != "";
                $em = $email != "";
                $tp = $telephone != "";
                if($n && $ln && $em && $tp){
                    $sql = "SELECT * FROM Cliente WHERE CorreoE ='". $email. "'";
                    $result = mysqli_query($conn,$sql);
                    if ($row = mysqli_fetch_array($result)){
                    echo "Ese correo ya fue registrado";
                    }else{
                    $sql = sprintf("INSERT INTO Cliente (Nombres, Apellidos, CorreoE, Telefono) VALUES ('%s','%s','%s','%s')",
                                    $name,
                                    $lastname,
                                    $email,
                                    $telephone,
                                );
            
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