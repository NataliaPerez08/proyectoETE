<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinicaVeterinaria";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    // Registro
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

        echo "Tu nombre es: ".$name;
        
        $hashpass = password_hash($pass,PASSWORD_DEFAULT,[15]);
        echo "\n".$hashpass;

        //$sql = "INSERT INTO Empleado (Nombres, Apellidos, CorreoE, Telefono, Salario, Contraseña, Cargo) VALUES ($name, $lastname, $email, $telephone, $salary, $pass, $charge)";

        $sql = sprintf("INSERT INTO Empleado (Nombres, Apellidos, CorreoE, Telefono, Salario, Contraseña, Cargo) VALUES ('%s','%s','%s','%u','%f','%s','%s')",
                      $name,
                      $lastname,
                      $email,
                      $telephone,
                      $salary,
                      $hashpass,
                      $charge
                    );

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
          } else {
            echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
          }


        $ver = password_verify($pass,$hashpass);
        echo "<br> ver:".$ver;



    }
    $conn->close();

?>