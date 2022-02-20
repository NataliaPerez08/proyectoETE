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
            echo "<h1>Modificación de puesto:</h1>
            <form action='modificarPuesto.php' method='POST'>
            <label>Nombre:</label>";

            echo "<select name='job'";
            $sql = "SELECT ID,Nombre FROM Puesto";
            $result = mysqli_query($conn, $sql);
            do{
                echo "    <option value='".$row[0]."'>".utf8_encode($row[1])."</option>";
            }while ($row = mysqli_fetch_array($result));
            echo "    </select><br><br>";

            echo "<label>Opción:</label>
            <select name='op'>
            <option value='name'>Nombre</option>
            <option value='des'>Descripción</option> 
            </select><br><br>";
            echo "<input type='submit' value='submit'>";
            echo  "</form>";

            echo "</form>  <a href='../../templates/empleado.html'>Regresar</a>";

            if(isset($_POST['job']) && isset($_POST['op'])  && $_POST['job'] != "" && $_POST['op']=='name'){
                $id = $_POST['job'];
                echo "<form action='modificarPuesto.php' method='POST'>
                <label>Nuevo nombre:</label>
                <input type='text' name='newName'>";
                echo "<input type='hidden' name='job' value='".$id."'>";
                echo "<input type='submit' value='enviar'>
                </form>";
            }
            
            if(isset($_POST['job']) && isset($_POST['op'])  && $_POST['job'] != "" && $_POST['op']=='des'){
                $id = $_POST['job'];
                echo "<form action='modificarPuesto.php' method='POST'>
                <label>Nueva descripción:</label>
                <input type='text' name='newDes'>
                <input type='hidden' name='job' value='".$id."'>
                <input type='submit' value='enviar'>
                </form>";
            }


            if(isset($_POST['newName']) && isset($_POST['job']) && $_POST['newName'] !=""){
                echo "<h1>Modifica el nombre</h1>";
                $newName = $_POST['newName'];
                $id = $_POST['job'];
                $sql = "UPDATE Puesto SET Nombre='".$newName."' WHERE ID='".$id."'";
                $result = mysqli_query($conn, $sql);
                if($result){echo "Se ha modificado exitosamente";};
            }

            if(isset($_POST['newDes']) && isset($_POST['job']) && $_POST['newDes']!=""){
                echo "<h1>Modifica la descripción</h1>";
                $newDes = $_POST['newDes'];
                $id = $_POST['job'];
                $sql = "UPDATE Puesto SET Descripcion='".$newDes."' WHERE ID='".$id."'";
                $result = mysqli_query($conn, $sql);
                echo $sql;
                if($result){echo "Se ha modificado exitosamente";}
            }
        }else{
            echo "<a href='../../'>Inicia sesión</a>";
        }
    ?>
    </body>
</html>