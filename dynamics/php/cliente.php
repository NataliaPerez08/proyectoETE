<html>
    <head>
        <title>Registro Cliente</title>
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
            
            echo '<label>Veterinario:</label>';
            echo "<select name='vet'";
                $sql = "SELECT ID,Nombres,Apellidos FROM Empleado";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "    <option value='".$row[0]."'>".utf8_encode($row[1])." ".utf8_encode($row[2])."</option>";
                }
                echo "    </select><br><br>";
            echo "<input type='submit' value='submit'>";
            echo  "</form>";

            // Registro Cliente
            $n = isset($_POST['name']);
            $ln = isset($_POST['lastname']);
            $em = isset($_POST['email']);
            $tp = isset($_POST['telephone']);
            $vt = isset($_POST['vet']);
            if($n && $ln && $em && $tp && $vt){
                $name=$_POST['name'];
                $lastname=$_POST['lastname'];
                $email = $_POST['email'];
                $telephone = $_POST['telephone'];
                $vet = $_POST['vet'];

                $n = $name != "";
                $ln = $lastname != "";
                $em = $email != "";
                $tp = $telephone != "";
                $vt = $vet != "";
                if($n && $ln && $em && $tp && $vt){
                    $sql = "SELECT * FROM Cliente WHERE CorreoE ='". $email. "'";
                    $result = mysqli_query($conn,$sql);
                    if ($row = mysqli_fetch_array($result)){
                    echo "Ese correo ya fue registrado";
                    }else{
                    $sql = sprintf("INSERT INTO Cliente (Nombres, Apellidos, CorreoE, Telefono, Veterinario) VALUES ('%s','%s','%s','%s','%s')",
                                    $name,
                                    $lastname,
                                    $email,
                                    $telephone,
                                    $vet,
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
            echo "</form>  <a href='../../templates/empleado.html'>Regresar</a>";
        }else{
            echo "<a href='../../'>Inicia sesión</a>";
        }
    ?>
    </body>
</html>