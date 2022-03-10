function loginE() {
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
    }else{
        console.log("Ya existe")
    }
}

function loginC() {
    if ($("#loginDivClient").length === 0){
        $content = $("#content").append("<h1>Empleado</h1> <br> <h2>Iniciar Sesión</h2>");
        
        $loginDivClient = $('<div id="loginDivClient"></div>');
        $content.append($loginDivClient);
        $form = $("<form></form>", {action:"./dynamics/php/infoCliente.php", method:'POST',id:"form"});
        $loginDivClient.append($form);
        $form.append("Correo electronico:");
        $form.append('<input type="email" name="email">');
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}



$("#emp").click(loginE)
$("#client").click(loginC)