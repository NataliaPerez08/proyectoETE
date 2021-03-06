<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../statics/css/estiloMod.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../../statics/media/favicon/logo.png">
    <title>Registro procedimiento</title>
</head>

<body>
    <header>
        <h1>Registro procedimiento</h1>
    </header>
<?php
  session_start();
  if(isset($_SESSION['id'])){
    if(isset($_SESSION['idClient'])){
      if(isset($_SESSION['idPet'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "clinicaVeterinaria";
        $conn = new mysqli($servername, $username, $password,$dbname);
        if ($conn->connect_error) {      die("Connection failed: " . $conn->connect_error);      }
        echo "<br><a href='../../templates/empleado.html'>Regresar</a><br>";

        $sql = "SELECT Nombres,Apellidos FROM Cliente WHERE ID ='".$_SESSION['idClient']. "'";
        $result = mysqli_query($conn, $sql);
        if($result){
          if($row = mysqli_fetch_array($result)){
            echo "<h2>Se ha seleccionado del cliente ".utf8_encode($row[0])." ".utf8_encode($row[1]);
          }
          $sqlP = "SELECT * FROM Mascota WHERE ID ='". $_SESSION['idPet']. "'";
          $query = mysqli_query($conn, $sqlP);
          if($row = mysqli_fetch_array($query)){
            echo "<br> la mascota ".utf8_encode($row[2])."</h2>";
            echo "<h3>Edad: ".utf8_encode($row[3])." <br>Tipo: ".utf8_encode($row[4]);
            echo "<br>Veterinario: ".utf8_encode($row[5])." <br>Diagnostico: ".utf8_encode($row[6]);
            echo "<br>Procedimientos: ";
            $tmp = explode(",", $row[7]);
            for ($i=0; $i < count($tmp)-1 ; $i++) { 
                $sqlP = "SELECT * FROM Procedimiento WHERE ID ='". $tmp[$i]. "'";
                $query = mysqli_query($conn, $sqlP);
                if($row = mysqli_fetch_array($query)){
                echo $row[1].", ";
                }
            }
            echo "</h4><br>";
          } 
          
          echo "<h1>Registrar procedimiento</h1>";
          echo "<form action='registroProcedimiento.php' method='POST'>";
          echo '<label>Nombre:</label>';
          echo '<input type="text" name="name">';

          echo '<label>Descripci??n:</label>';
          echo '<input type="textarea" name="des">';

          echo '<label>Fecha:</label>';
          echo '<input type="date" name="date"';

          echo '<label>Costo:</label>';
          echo '<input type="number" name="cost">';

          echo '<input type="submit" value="Enviar"></form>';

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
              $sql = sprintf("INSERT INTO Procedimiento (Nombre, Descripcion, Fecha, Costo, Paciente) VALUES ('%s','%s','%s', '%f', '%d')",
                            $name, $des, $date, $cost, $_SESSION['idPet']);
              if (mysqli_query($conn, $sql)) {
                $last_id = $conn->insert_id;
                $sql = "SELECT Procedimiento FROM Mascota WHERE ID ='".$_SESSION['idPet']. "'";
                $result = mysqli_query($conn, $sql);
                $pro = mysqli_fetch_array($result);
                $tmp = $last_id.",".$pro[0];
                $sql = "UPDATE Mascota SET Procedimiento='".$tmp."' WHERE ID='".$_SESSION['idPet']."'";
                if(mysqli_query($conn, $sql)){ 
                  echo "Se ha registrado exitosamente";
                  $name = ""; 
                  $des = "";
                  $date = "";
                  $cost = ""; 
                }
              }else {echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn); }  
            }else{ echo "Verifica la entrada";}
                }
        }
        $conn->close();
      }else{echo "Selecciona una mascota Primero";}
    }else{echo "Selecciona un cliente primero";}
  }else{ echo "<a href='../../'>Inicia sesi??n</a>";}
?>