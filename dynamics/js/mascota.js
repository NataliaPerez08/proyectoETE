function modName(){
    if ($("#modDiv").length === 0){
        $content = $("#frm").append("<h2>Mascota. Modificar nombre</h2>");
        
        $modDiv = $('<div id="modDiv"></div>');
        $content.append($modDiv);
        $form = $("<form></form>", {action:"../php/modMascota.php", method:'POST',id:"form"});
        $modDiv.append($form);
    
        $form.append("Nuevo Nombre:");
        $form.append('<input type="text" name="newName">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modAge(){
    if ($("#modDivLN").length === 0){
        $content = $("#frm1").append("<h2>Mascota. Modificar edad</h2>");
        
        $modDivLN = $('<div id="modDivLN"></div>');
        $content.append($modDivLN);
        $form = $("<form></form>", {action:"../php/modMascota.php", method:'POST',id:"form"});
        $modDivLN.append($form);
    
        $form.append("Nuevo Edad:");
        $form.append('<input type="number" name="newAge">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modType(){
    if ($("#modDivTel").length === 0){
        $content = $("#frm2").append("<h2>Mascota. Modificar tipo</h2>");
        
        $modDivTel = $('<div id="modDivTel"></div>');
        $content.append($modDivTel);
        $form = $("<form></form>", {action:"../php/modMascota.php", method:'POST',id:"form"});
        $modDivTel.append($form);
    
        $form.append("Nuevo Tipo:");
        $form.append('<input type="text" name="newType">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modDiag(){
    if ($("#modDivEmail").length === 0){
        $content = $("#frm3").append("<h2>Mascota. Modificar diagnostico</h2>");
        
        $modDivEmail = $('<div id="modDivEmail"></div>');
        $content.append($modDivEmail);
        $form = $("<form></form>", {action:"../php/modCliente.php", method:'POST',id:"form"});
        $modDivEmail.append($form);
    
        $form.append("Nuevo Diagnostico:");
        $form.append('<input type="text" name="newDiag">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        console.log("Ya existe")
    }
}

function modVet(){
    alert("mod Vet");
}
function modPro(){
    alert("mod Mascot");
}
function registerPro() {
    window.location.href = "../php/registroProcedimiento.php";
}

function modPro() {
    //window.location.href = "../php/registrarMascotas.php";
    alert("modPro");
}

$("#res").click(modName);
$("#res1").click(modAge);
$("#res2").click(modType);

$("#res3").click(modVet);

$("#res4").click(modDiag);

$("#res5").click(registerPro);

$("#res6").click(modPro);