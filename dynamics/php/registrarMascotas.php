<?php
    session_start();
    if(isset($_SESSION['id'])){
      /*if(isset($_SESSION['idClient'])){
      }*/
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "clinicaVeterinaria";
        $conn = new mysqli($servername, $username, $password,$dbname);
        if ($conn->connect_error) {      die("Connection failed: " . $conn->connect_error);      }
        echo "<form action='registrarMascotas.php' method='POST'>";
        
        echo '<label>Nombre:</label>';
        echo '<input type="text" name="name">';

        echo '<label>Edad</label>';
        echo '<input type="number" name="age">';

        echo '<label>Tipo:</label>';
        echo '<input type="text" name="type">';

        echo '<label>Veterinario:</label>';
        echo "<select name='vet'";
            $id=1;
            $sql = 'SELECT ID,Nombres,Apellidos FROM Empleado WHERE Cargo='.$id;
            $result = mysqli_query($conn, $sql);
            do{
                echo "    <option value='".$row[0]."'>".utf8_encode($row[1])." ".utf8_encode($row[2])."</option>";
            }while($row = mysqli_fetch_array($result));
            echo "    </select><br><br>";

        echo '<label>Diagnostico:</label>';
        echo '<input type="textarea" name="diag">';

        echo '<label>Dueño:</label>';
        echo "<select name='owner'";
                  $id=1;
                  $sql = "SELECT ID,Nombres,Apellidos FROM Cliente";
                  $result = mysqli_query($conn, $sql);
                  do{
                      echo "    <option value='".$row[0]."'>".utf8_encode($row[1])." 
                      ".utf8_encode($row[2])."</option>";
                  }while ($row = mysqli_fetch_array($result));
                  echo "    </select><br><br>";

        echo '<input type="submit" value="submit"></form>';
        // Registro Empleado
        $n = isset($_POST['name']);
        $a = isset($_POST['age']);
        $t = isset($_POST['type']);
        $d = isset($_POST['diag']);
        $o = isset($_POST['owner']);
        $v = isset($_POST['vet']);
  
        if ($n && $a && $t && $d && $o && $v){
          $name = $_POST['name'];
          $age = $_POST['age'];
          $type = $_POST['type'];
          $diag = $_POST['diag'];
          $owner = $_POST['owner'];
          $vet = $_POST['vet'];

          $n = $name != ""; 
          $a = $age > 0;
          $t = $type != "";
          $d = $diag != ""; 
          $v = $vet > 0;

          if ($n && $a && $t && $d && $o && $v) {
            $sql = sprintf("INSERT INTO Mascota (Propietario, Nombre, Edad, Tipo, Veterinario, Diagnostico) VALUES ('%d','%s','%d','%s','%s','%s')",
                          $owner, $name, $age, $type, $vet, $diag);
                 
            if (mysqli_query($conn, $sql)) {
              $last_id = $conn->insert_id;
              //echo "Se ha registrado exitosamente".$last_id;
              $consult = "SELECT Mascotas FROM Cliente WHERE ID='".$owner."'";
              $query = mysqli_query($conn, $consult);

              if($row = mysqli_fetch_array($query)){
                $temp = $last_id.",".$row[0];
                $upM = "UPDATE Cliente SET Mascotas='".$temp."' WHERE ID='".$owner."'";
                if (mysqli_query($conn, $upM)) {
                  echo "Se ha registrado exitosamente";
                }
              }
            } else {echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn); }
          }else{ echo "Verifica la entrada";}
        }
        echo "</form>  <a href='../../templates/empleado.html'>Regresar</a>";
        $conn->close();
    }else{ echo "<a href='../../'>Inicia sesión</a>";}
    
?>