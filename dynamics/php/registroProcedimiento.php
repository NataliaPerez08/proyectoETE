<?php
    session_start();
    if(isset($_SESSION['id'])){
      if(isset($_SESSION['idPet'])){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "clinicaVeterinaria";
        $conn = new mysqli($servername, $username, $password,$dbname);
        if ($conn->connect_error) {      die("Connection failed: " . $conn->connect_error);      }
        
        echo "<form action='registroProcedimiento.php' method='POST'>";
        
        echo '<label>Nombre:</label>';
        echo '<input type="text" name="name">';
  
        echo '<label>Descripción:</label>';
        echo '<input type="textarea" name="des">';
  
        echo '<label>Fecha:</label>';
        echo '<input type="date" name="date"';
  
        echo '<label>Costo:</label>';
        echo '<input type="number" name="cost">';
  
        echo '<input type="submit" value="submit"></form>';
  
        $n = isset($_POST['name']);
        $d = isset($_POST['des']);
        $dt = isset($_POST['date']);
        $ct = isset($_POST['cost']);
    
        if($n && $d && $dt && $ct){
          $name = $_POST['name'];
          $des = $_POST['des'];
          $date = $_POST['date'];
          $cost = $_POST['cost'];
  
          $n = $name != ""; 
          $d = $des != "";
          $dt = $date != "";
          $ct = $cost != ""; 
  
          if($n && $d && $dt && $ct){
            $sql = sprintf("INSERT INTO Procedimiento (Nombre, Descripcion, Fecha, Costo) VALUES ('%s','%s','%s', '%f')",
                          $name, $des, $date, $cost);
              if (mysqli_query($conn, $sql)) {
                  echo "Se ha registrado exitosamente";
                } else {echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn); }  
          }else{ echo "Verifica la entrada";}
        }
        echo "</form>  <a href='../../templates/empleado.html'>Regresar</a>";
        $conn->close();
      }else{echo "Selecciona una mascota Primero"}
    }else{ echo "<a href='../../'>Inicia sesión</a>";}
    
?>