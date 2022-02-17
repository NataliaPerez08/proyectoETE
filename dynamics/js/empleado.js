function registerClient(){
    window.location.href = "../dynamics/php/cliente.php";
}

function registerEmployee(){
    window.location.href = "../dynamics/php/empleado.php";
}

function registerJob(){
    window.location.href = "../dynamics/php/puesto.php";
}

$("#res").click(registerEmployee);
$("#res1").click(registerClient);
$("#res3").click(registerJob);