<html>
    <head>
        <title>Puestos</title>
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
            
            echo "<h1>Registro o modificación de puestos:</h1>
            <form action='puesto.php' method='GET'>
            <select name='option'>
            <option value='modi'>Modificación</option>
            <option value='reg'>Registro</option>
            </select>
            <input type='submit' value='submit'>
            </form>";

            if(isset($_GET['option'])){
                $op = $_GET['option'];
                if ($op == 'modi') {
                    echo "Modi";
                    echo "<h1>Modificación de puesto:</h1>
                    <form action='puesto.php' method='POST'>
                    <label>Nombre:</label>";

                    echo "<select name='vet'";
                    $sql = "SELECT ID,Nombre FROM Puesto";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "    <option value='".$row[0]."'>".utf8_encode($row[1])."</option>";
                    }
                    echo "    </select><br><br>";


                    echo "<input type='submit' value='submit'>";
                    echo  "</form>";
                }
                if($op=='reg'){
                    echo "<h1>Registro de nuevo puesto:</h1>
                    <form action='puesto.php' method='POST'>
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
                }
            }

            echo "</form>  <a href='../../templates/empleado.html'>Regresar</a>";
        }else{
            echo "<a href='../../'>Inicia sesión</a>";
        }
    ?>
    </body>
</html>