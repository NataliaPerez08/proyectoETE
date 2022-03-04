function registerClient(){
    window.location.href = "../dynamics/php/cliente.php";
}

function registerEmployee(){
    window.location.href = "../dynamics/php/empleado.php";
}

function registerJob(){
    window.location.href = "../dynamics/php/crearpuesto.php";
}
function modJob(){
    window.location.href = "../dynamics/php/modificarPuesto.php";
}

function modClient(){
    window.location.href = "../dynamics/php/modCliente.php";
}

function registerPet() {
    window.location.href = "../dynamics/php/registrarMascotas.php";
}

function modPet(){
    window.location.href = "../dynamics/php/modMascota.php";
}

$("#res").click(registerEmployee);
$("#res1").click(registerClient);
$("#res2").click(registerPet);
$("#res3").click(registerJob);
$("#res4").click(modJob);


$("#res6").click(modClient);
$("#res7").click(modPet);