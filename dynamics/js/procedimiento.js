function modName(){
    if ($("#modDiv").length === 0){
        $content = $("#frm").append("<h2>Procedimiento. Modificar nombre</h2>");
        
        $modDiv = $('<div id="modDiv"></div>');
        $content.append($modDiv);
        $form = $("<form></form>", {action:"../php/modProcedimiento.php", method:'POST',id:"form"});
        $modDiv.append($form);
    
        $form.append("Nuevo nombre:");
        $form.append('<input type="text" name="newName">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        $("#frm").empty();
    }
}

function modDes(){
    if ($("#modDivDes").length === 0){
        $content = $("#frm1").append("<h2>Procedimiento. Modificar descripción</h2>");
        
        $modDivDes = $('<div id="modDivDes"></div>');
        $content.append($modDivDes);
        $form = $("<form></form>", {action:"../php/modProcedimiento.php", method:'POST',id:"form"});
        $modDivDes.append($form);
    
        $form.append("Nueva descripción:");
        $form.append('<input type="text" name="newDes">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        $("#frm1").empty();
    }
}

function modDate(){
    if ($("#modDivDate").length === 0){
        $content = $("#frm2").append("<h2>Procedimiento. Modificar fecha</h2>");
        
        $modDivDate = $('<div id="modDivDate"></div>');
        $content.append($modDivDate);
        $form = $("<form></form>", {action:"../php/modProcedimiento.php", method:'POST',id:"form"});
        $modDivDate.append($form);
    
        $form.append("Nueva fecha:");
        $form.append('<input type="date" name="newDate">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        $("#frm2").empty();
    }
}

function modCost(){
    if ($("#modDivCost").length === 0){
        $content = $("#frm3").append("<h2>Procedimiento. Modificar costo</h2>");
        
        $modDivCost = $('<div id="modDivCost"></div>');
        $content.append($modDivCost);
        $form = $("<form></form>", {action:"../php/modProcedimiento.php", method:'POST',id:"form"});
        $modDivCost.append($form);
    
        $form.append("<label>Nuevo costo:</label>");
        $form.append('<input type="text" name="modCost">');
    
        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    }else{
        $("#frm3").empty();
    }
}
function delPro(){
    if ($("#DelDiv").length === 0){
        $content = $("#frm4").append("<h2>¿Está seguro de borrar el registro?</h2>");
        
        $DelDiv = $('<div id="DelDiv"></div>');
        $content.append($DelDiv);
        $form = $("<form></form>", {action:"../php/modProcedimiento.php", method:'POST',id:"form"});
        $DelDiv.append($form);

        $form.append('<button name="del">Confirmar</button>');
    }else{
        $("#frm4").empty();
    }
}

$("#res").click(modName);
$("#res1").click(modDes);
$("#res2").click(modDate);
$("#res3").click(modCost);
$("#res4").click(delPro);