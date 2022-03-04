function modName(){
    if ($("#modDiv").length === 0){
        $content = $("#frm").append("<h2>Empleado. Modificar Nombres</h2>");
        
        $modDiv = $('<div id="modDiv"></div>');
        $content.append($modDiv);
        $form = $("<form></form>", {action:"../php/modEmpleado.php", method:'POST',id:"form"});
        $modDiv.append($form);
    
        $form.append("Nuevo Nombre:");
        $form.append('<input type="text" name="newName">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modLastName(){
    if ($("#modDivLN").length === 0){
        $content = $("#frm1").append("<h2>Empleado. Modificar Apellidos</h2>");
        
        $modDivLN = $('<div id="modDivLN"></div>');
        $content.append($modDivLN);
        $form = $("<form></form>", {action:"../php/modEmpleado.php", method:'POST',id:"form"});
        $modDivLN.append($form);
    
        $form.append("Nuevo Apellido:");
        $form.append('<input type="name" name="newLastname">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modEmail(){

    if ($("#modDivEmail").length === 0){
        $content = $("#frm2").append("<h2>Empleado. Modificar correo electronico</h2>");
        
        $modDivEmail = $('<div id="modDivEmail"></div>');
        $content.append($modDivEmail);
        $form = $("<form></form>", {action:"../php/modEmpleado.php", method:'POST',id:"form"});
        $modDivEmail.append($form);
    
        $form.append("Nuevo Apellido:");
        $form.append('<input type="name" name="newEmail">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modTel(){
    if ($("#modDivTel").length === 0){
        $content = $("#frm3").append("<h2>Empleado. Modificar Telefono</h2>");
        
        $modDivTel = $('<div id="modDivTel"></div>');
        $content.append($modDivTel);
        $form = $("<form></form>", {action:"../php/modEmpleado.php", method:'POST',id:"form"});
        $modDivTel.append($form);
    
        $form.append("Nuevo Telefono:");
        $form.append('<input type="name" name="newTel">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modSal(){
    if ($("#modDivTel").length === 0){
        $content = $("#frm4").append("<h2>Empleado. Modificar Salario:</h2>");
        
        $modDivTel = $('<div id="modDivTel"></div>');
        $content.append($modDivTel);
        $form = $("<form></form>", {action:"../php/modEmpleado.php", method:'POST',id:"form"});
        $modDivTel.append($form);
    
        $form.append("Nuevo Salario:");
        $form.append('<input type="name" name="newSal">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modPass() {
    if ($("#modDivPass").length === 0){
        $content = $("#frm3").append("<h2>Empleado. Modificar contraseña</h2>");
        
        $modDivPass = $('<div id="modDivPass"></div>');
        $content.append($modDivPass);
        $form = $("<form></form>", {action:"../php/modEmpleado.php", method:'POST',id:"form"});
        $modDivPass.append($form);
    
        $form.append("Nueva Contraseña:");
        $form.append('<input type="name" name="newEmail">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function delPass(){
    if ($("#modDivDel").length === 0){
        $content = $("#frm6").append("<h2>¿Está seguro? Se eliminara el registro del empleado seleccionado</h2>");
        
        $modDivDel = $('<div id="modDivDel"></div>');
        $content.append($modDivDel);
        $form = $("<form></form>", {action:"../php/modEmpleado.php", method:'POST',id:"form"});
        $modDivDel.append($form);

        $form.append('<button name="del">Confirmar</button>');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

$("#res").click(modName);
$("#res1").click(modLastName);
$("#res2").click(modEmail);
$("#res3").click(modTel);
$("#res4").click(modSal);
$("#res5").click(modPass);