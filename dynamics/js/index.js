function loginE() {
    $("#content").empty();
    if ($("#loginDiv").length === 0){
        $content = $("#content").append("<h1>Empleado</h1> <br> <h2>Iniciar Sesión</h2>");
        
        $loginDiv = $('<div id="loginDiv"></div>');
        $content.append($loginDiv);
        $form = $("<form></form>", {action:"./dynamics/php/index.php", method:'POST',id:"form"});
        $loginDiv.append($form);
    
        $form.append("Correo electronico");
        $form.append('<input type="email" name="usr">');
    
        $form.append("Contraseña")
        $form.append('<input type="password" name="pass">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }
}

function loginC() {
    $("#content").empty();
    if ($("#loginDiv").length === 0){
        $content = $("#content").append("<h1>Cliente</h1> <br> <h2>Iniciar Sesión</h2>");
        
        $loginDiv = $('<div id="loginDiv"></div>');
        $content.append($loginDiv);
        $form = $("<form></form>", {action:"./dynamics/php/infoCliente.php", method:'POST',id:"form"});
        $loginDiv.append($form);
        $form.append("Correo electronico:");
        $form.append('<input type="email" name="email">');
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }
}

function infoNosotros() {
    $("#content").empty();
    if ($("#loginDiv").length === 0){
        $content = $("#content").append("<h1>Información sobre la clínica</h1>");
        
        $loginDiv = $('<div id="loginDiv"></div>');
        $loginDiv.append("Aquí puede añadir información importante sobre empleados, reseñas <br><br><br>")
        $loginDiv.append("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper odio tincidunt nulla lacinia rutrum. Vestibulum scelerisque aliquet maximus. Aenean quis varius massa. Curabitur dapibus pretium urna, sed congue nisl suscipit mattis. Morbi et ex cursus, facilisis leo in, fermentum nulla. Praesent congue feugiat convallis. Donec non iaculis nunc. ");
        $content.append($loginDiv);
    }
}

function infoContact() {
    $("#content").empty();
    if ($("#loginDiv").length === 0){
        $content = $("#content").append("<h1>Información de contacto</h1>");
        
        $loginDiv = $('<div id="loginDiv"></div>');
        $loginDiv.append("Aquí puede añadir formas de contactar, como telefonos, correos, redes sociales. Por ejemplo: <br>")
        $loginDiv.append('<p><img src="statics/media/facebook.png">Páina en Facebook</p>');        
        $loginDiv.append('<p><img src="statics/media/instagram.png">Página en Instagram</p>');
        $loginDiv.append('<p><img src="statics/media/telefono.png">Número de telefono fijo</p>');
        $loginDiv.append('<p><img src="statics/media/twitter.png">Cuenta de Twitter</p>');
        $loginDiv.append('<p><img src="statics/media/whatsapp.png">Número de Whatsapp</p>');
        

        $content.append($loginDiv);
    }
}

function infoServices() {
    $("#content").empty();
    if ($("#loginDiv").length === 0){
        $content = $("#content").append("<h1>Información de servicios</h1>");
        
        $loginDiv = $('<div id="loginDiv"></div>');
        $loginDiv.append("Información de los servicios y tratamientos que se ofrecen en la clínica veterinaria<br><br>");
        $loginDiv.append("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper odio tincidunt nulla lacinia rutrum. Vestibulum scelerisque aliquet maximus. Aenean quis varius massa. Curabitur dapibus pretium urna, sed congue nisl suscipit mattis. Morbi et ex cursus, facilisis leo in, fermentum nulla. Praesent congue feugiat convallis. Donec non iaculis nunc. ");
        $content.append($loginDiv);
    }
}

function start() {
    $("#content").empty();
    if ($("#loginDiv").length === 0){
        $content = $("#content");
        
        $loginDiv = $('<div id="loginDiv"></div>');
        $loginDiv.append('<img id="indexIMG" src="statics/media/index.png">');
        $loginDiv.append("<p>Esta página web pretende dar a una microempresa tal como una clínica veterinaria una herramienta para gestionarla, es decir, registrar, modificar y consultar datos relevantes para esta; tales como empleados, clientes y pacientes.</p>");
        $content.append($loginDiv);
    }
}

$("#emp").click(loginE);
$("#client").click(loginC);
$("#us").click(infoNosotros);
$("#contact").click(infoContact);
$("#services").click(infoServices);
$("#start").click(start);