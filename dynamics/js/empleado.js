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
    console.log("presiona");
    $.ajax({
    type: "POST",
        url: '../dynamics/php/empleado.php',
        data: $(this).serialize(),
        success: function(response){
            //alert('Funciona'+response);
            $("#frm6").append(response);
       }
    });
}
function registerMascot() {
    window.location.href = "../dynamics/php/registrarMascotas.php";
}

$("#res").click(registerEmployee);
$("#res1").click(registerClient);
$("#res2").click(registerMascot);
$("#res3").click(registerJob);
$("#res4").click(modJob);


$("#res6").click(modClient);