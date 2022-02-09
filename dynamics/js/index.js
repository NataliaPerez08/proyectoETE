function loginE(event) {
    console.log("iam")
    if ($("#loginDiv").length === 0){
        $content = $("#content").append("<h1>Empleado</h1> <br> <h2>Iniciar Sesión</h2>");
        
        $loginDiv = $('<div id="loginDiv"></div>');
        $content.append($loginDiv);
        $form = $("<form></form>", {action:"./templates/empleado.html", method:'POST',id:"form"});
        $loginDiv.append($form);
    
        $form.append("Correo electronico");
        $form.append('<input type="text" name="usr">');
    
    
        $form.append("Contraseña")
        $form.append('<input type="password" name="pass">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}


$("#emp").click(loginE)