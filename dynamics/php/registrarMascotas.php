<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Registrar Mascota</title>
  <link rel="stylesheet" href="../../statics/css/formularios.css">
  <link rel="icon" type="image/png" sizes="32x32" href="../../statics/media/favicon/logo.png">
</head>

<body>
  <h1>Registrar mascota</h1>
  <?php
  session_start();
  if (isset($_SESSION['id'])) {
    if (isset($_SESSION['idClient'])) {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "clinicaVeterinaria";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "<a href='../../templates/empleado.html'>Regresar</a><br><br>";

      $sql = "SELECT Nombres,Apellidos FROM Cliente WHERE ID ='" . $_SESSION['idClient'] . "'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
          if ($row = mysqli_fetch_array($result)) {
              echo "<h2>Registrar mascota del cliente " . utf8_encode($row[0]) . " " . utf8_encode($row[1])."</h2>";
          }
          $row="";
          echo "<form action='registrarMascotas.php' method='POST'>";
    
          echo '<label>Nombre:</label>';
          echo '<input type="text" name="name">';
    
          echo '<label>Edad</label>';
          echo '<input type="number" name="age">';
    
          echo '<label>Tipo:</label>';
          echo '<input type="text" name="type">';
    
          echo '<label>Veterinario:</label>';
          echo "<select name='vet'";
          $id = 1;
          $sql = 'SELECT ID,Nombres,Apellidos FROM Empleado WHERE Puesto=' . $id;
          $result = mysqli_query($conn, $sql);
          do {
            echo "    <option value='" . $row[0] . "'>" . utf8_encode($row[1]) . " " . utf8_encode($row[2]) . "</option>";
          } while ($row = mysqli_fetch_array($result));
          echo "    </select><br><br>";
    
          echo '<label>Diagnostico:</label>';
          echo '<input type="textarea" name="diag">';
    
          echo '<input type="submit" value="Enviar"></form>';
      }
      
      // Registro Empleado
      $n = isset($_POST['name']);
      $a = isset($_POST['age']);
      $t = isset($_POST['type']);
      $d = isset($_POST['diag']);
      $v = isset($_POST['vet']);

      if ($n && $a && $t && $d && $v) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $type = $_POST['type'];
        $diag = $_POST['diag'];
        $owner = $_SESSION['idClient'];
        $vet = $_POST['vet'];

        $n = $name != "";
        $a = $age > 0;
        $t = $type != "";
        $d = $diag != "";
        $v = $vet > 0;
        $o = $owner > 0;

        if ($n && $a && $t && $d && $o && $v) {
          $sql = sprintf(
            "INSERT INTO Mascota (Propietario, Nombre, Edad, Tipo, Veterinario, Diagnostico) VALUES ('%d','%s','%d','%s','%s','%s')",
            $owner,
            $name,
            $age,
            $type,
            $vet,
            $diag
          );

          if (mysqli_query($conn, $sql)) {
            $last_id = $conn->insert_id;
            $consult = "SELECT Mascotas FROM Cliente WHERE ID='" . $owner . "'";
            $query = mysqli_query($conn, $consult);

            if ($row = mysqli_fetch_array($query)) {
              $temp = $last_id . "," . $row[0];
              $upM = "UPDATE Cliente SET Mascotas='" . $temp . "' WHERE ID='" . $owner . "'";
              if (mysqli_query($conn, $upM)) {
                header('Location: modMascota.php');
              }
            }
          } else {
            echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        } else {
          echo "Verifica la entrada";
        }
      }
      $conn->close();
    } else {
      echo "<a href='modCliente.php'>Seleccionar cliente</a>";
    }
  } else {
    echo "<a href='../../'>Inicia sesión</a>";
  }
  ?>
</body>

</html>