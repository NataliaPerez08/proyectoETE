function modName(){
    if ($("#modDiv").length === 0){
        $content = $("#frm").append("<h2>Cliente. Modificar Nombres</h2>");
        
        $modDiv = $('<div id="modDiv"></div>');
        $content.append($modDiv);
        $form = $("<form></form>", {action:"../php/modCliente.php", method:'POST',id:"form"});
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
        $content = $("#frm1").append("<h2>Cliente. Modificar Apellidos</h2>");
        
        $modDivLN = $('<div id="modDivLN"></div>');
        $content.append($modDivLN);
        $form = $("<form></form>", {action:"../php/modCliente.php", method:'POST',id:"form"});
        $modDivLN.append($form);
    
        $form.append("Nuevo Apellido:");
        $form.append('<input type="name" name="newLastname">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modTel(){
    if ($("#modDivTel").length === 0){
        $content = $("#frm2").append("<h2>Cliente. Modificar Telefono</h2>");
        
        $modDivTel = $('<div id="modDivTel"></div>');
        $content.append($modDivTel);
        $form = $("<form></form>", {action:"../php/modCliente.php", method:'POST',id:"form"});
        $modDivTel.append($form);
    
        $form.append("Nuevo Telefono:");
        $form.append('<input type="name" name="newTel">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modEmail(){
    if ($("#modDivEmail").length === 0){
        $content = $("#frm3").append("<h2>Cliente. Modificar correo electronico</h2>");
        
        $modDivEmail = $('<div id="modDivEmail"></div>');
        $content.append($modDivEmail);
        $form = $("<form></form>", {action:"../php/modCliente.php", method:'POST',id:"form"});
        $modDivEmail.append($form);
    
        $form.append("Nuevo Apellido:");
        $form.append('<input type="name" name="newEmail">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modMascot(){
    alert("mod Mascot");
}

function registerMascot() {
    window.location.href = "../php/registrarMascotas.php";
}

$("#res").click(modName);
$("#res1").click(modLastName);
$("#res2").click(modTel);
$("#res3").click(modEmail);
$("#res4").click(modMascot);
$("#res5").click(registerMascot);