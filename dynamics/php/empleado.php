<?php
  session_start();
  if(isset($_SESSION['id'])){
    if(isset($_POST['term'])){
      session_destroy();
      header('Location: ../../index.html');
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinicaVeterinaria";
    $conn = new mysqli($servername, $username, $password,$dbname);
    if ($conn->connect_error) {      die("Connection failed: " . $conn->connect_error);      }
    echo "<form action='empleado.php' method='POST'>";
    
    echo '<label>Nombre(s):</label>';
    echo '<input type="text" name="name">';

    echo '<label>Apellidos:</label>';
    echo '<input type="text" name="lastname">';

    echo '<label>Correo Electronico:</label>';
    echo '<input type="email" name="email">';

    echo '<label>Telefono:</label>';
    echo '<input type="tel" name="telephone">';

    echo '<label>Salario:</label>';
    echo '<input type="double" name="salary">';

    echo '<label>Contraseña:</label>';
    echo '<input type="password" name="pass">';

    echo '<label>Cargo:</label>';
    echo "<select name='charge'";
    $id=1;
    $sql = "SELECT ID,Nombre FROM Puesto";
    $result = mysqli_query($conn, $sql);
    do{
        echo "    <option value='".$row[0]."'>".utf8_encode($row[1])."</option>";
    }while ($row = mysqli_fetch_array($result));
    echo "    </select><br><br>";

    echo '<input type="submit" value="submit"></form>';
    // Registro Empleado
    $n = isset($_POST['name']);
    $ln = isset($_POST['lastname']);
    $em = isset($_POST['email']);
    $tp = isset($_POST['telephone']);
    $sal = isset($_POST['salary']);
    $pass = isset($_POST['pass']);
    $c = isset($_POST['charge']);

    if($n && $ln && $em && $tp && $sal && $pass && $c){
      $name=$_POST['name'];
      $lastname=$_POST['lastname'];
      $email = $_POST['email'];
      $telephone = $_POST['telephone'];
      $salary = $_POST['salary'];
      $pass = $_POST['pass'];
      $charge = $_POST['charge'];

      $n = $name != ""; 
      $ln = $lastname != "";
      $em = $email != "";
      $tp = $telephone != ""; 
      $sal = $salary > 0;
      $pass = $pass != "";
      $c = $charge != "";

      if($n && $ln && $em && $tp && $sal && $pass && $c){
        $sql = "SELECT * FROM Empleado WHERE CorreoE ='". $email. "'";
        $result = mysqli_query($conn,$sql);
        if ($row = mysqli_fetch_array($result)){
          echo "Ese correo ya fue registrado";
        }else{
          $hashpass = password_hash($pass,PASSWORD_DEFAULT,[15]);
          $sql = sprintf("INSERT INTO Empleado (Nombres, Apellidos, CorreoE, Telefono, Salario, Contraseña, Puesto) VALUES ('%s','%s','%s','%u','%f','%s','%s')",
                        $name,
                        $lastname,
                        $email,
                        $telephone,
                        $salary,
                        $hashpass,
                        $charge
                      );
  
          if (mysqli_query($conn, $sql)) {
              echo "Se ha registrado exitosamente";
              //header('Location: ../../templates/empleado.html');
            } else {echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn); }
        }  
      }else{ echo "Verifica la entrada";}
    }
    echo "</form>  <a href='../../templates/empleado.html'>Regresar</a>";
    $conn->close();
  }else{ echo "<a href='../../'>Inicia sesión</a>";}   
?>