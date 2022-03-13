function modName() {
    if ($("#modDiv").length === 0) {
        $content = $("#frm").append("<h2>Mascota. Modificar nombre</h2>");

        $modDiv = $('<div id="modDiv"></div>');
        $content.append($modDiv);
        $form = $("<form></form>", { action: "../php/modMascota.php", method: 'POST', id: "form" });
        $modDiv.append($form);

        $form.append("Nuevo Nombre:");
        $form.append('<input type="text" name="newName">');

        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    } else {
        $("#frm").empty();
    }
}

function modAge() {
    if ($("#modDivLN").length === 0) {
        $content = $("#frm1").append("<h2>Mascota. Modificar edad</h2>");

        $modDivLN = $('<div id="modDivLN"></div>');
        $content.append($modDivLN);
        $form = $("<form></form>", { action: "../php/modMascota.php", method: 'POST', id: "form" });
        $modDivLN.append($form);

        $form.append("Nuevo Edad:");
        $form.append('<input type="number" name="newAge">');

        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    } else {
        $("#frm1").empty();
    }
}

function modType() {
    if ($("#modDivTel").length === 0) {
        $content = $("#frm2").append("<h2>Mascota. Modificar tipo</h2>");

        $modDivTel = $('<div id="modDivTel"></div>');
        $content.append($modDivTel);
        $form = $("<form></form>", { action: "../php/modMascota.php", method: 'POST', id: "form" });
        $modDivTel.append($form);

        $form.append("Nuevo Tipo:");
        $form.append('<input type="text" name="newType">');

        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    } else {
        $("#frm2").empty();
    }
}

function modDiag() {
    if ($("#modDivEmail").length === 0) {
        $content = $("#frm4").append("<h2>Mascota. Modificar diagnostico</h2>");

        $modDivEmail = $('<div id="modDivEmail"></div>');
        $content.append($modDivEmail);
        $form = $("<form></form>", { action: "../php/modMascota.php", method: 'POST', id: "form" });
        $modDivEmail.append($form);

        $form.append("<label>Nuevo Diagnostico:</label>");
        $form.append('<input type="text" name="newDiag">');

        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    } else {
        $("#frm4").empty();
    }
}

function modPro() {
    window.location.href = "../php/modProcedimiento.php";
}

function registerPro() {
    window.location.href = "../php/registroProcedimiento.php";
}

function delPet() {
    if ($("#modDivEmail").length === 0) {
        $content = $("#frm5").append("<h2>¿Está seguro de borrar el registro?</h2>");

        $modDivEmail = $('<div id="modDivEmail"></div>');
        $content.append($modDivEmail);
        $form = $("<form></form>", { action: "../php/modMascota.php", method: 'POST', id: "form" });
        $modDivEmail.append($form);

        $form.append('<button name="del">Confirmar</button>');
    } else {
        $("#frm5").empty();
    }
}

$("#res").click(modName);
$("#res1").click(modAge);
$("#res2").click(modType);

$("#res4").click(modDiag);

$("#res5").click(registerPro);

$("#res6").click(modPro);

$("#res7").click(delPet);