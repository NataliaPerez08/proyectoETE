function modName() {
    if ($("#modDiv").length === 0) {
        $content = $("#frm").append("<h2>Cliente. Modificar Nombres</h2>");

        $modDiv = $('<div id="modDiv"></div>');
        $content.append($modDiv);
        $form = $("<form></form>", { action: "../php/modCliente.php", method: 'POST', id: "form" });
        $modDiv.append($form);

        $form.append("Nuevo Nombre:");
        $form.append('<input type="text" name="newName">');

        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    } else {
        $("#frm").empty();
    }
}

function modLastName() {
    if ($("#modDivLN").length === 0) {
        $content = $("#frm1").append("<h2>Cliente. Modificar Apellidos</h2>");

        $modDivLN = $('<div id="modDivLN"></div>');
        $content.append($modDivLN);
        $form = $("<form></form>", { action: "../php/modCliente.php", method: 'POST', id: "form" });
        $modDivLN.append($form);

        $form.append("Nuevo Apellido:");
        $form.append('<input type="name" name="newLastname">');

        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    } else {
        $("#frm1").empty();
    }
}

function modTel() {
    if ($("#modDivTel").length === 0) {
        $content = $("#frm2").append("<h2>Cliente. Modificar Telefono</h2>");

        $modDivTel = $('<div id="modDivTel"></div>');
        $content.append($modDivTel);
        $form = $("<form></form>", { action: "../php/modCliente.php", method: 'POST', id: "form" });
        $modDivTel.append($form);

        $form.append("Nuevo Telefono:");
        $form.append('<input type="name" name="newTel">');

        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    } else {
        $("#frm2").empty();
    }
}

function modEmail() {
    if ($("#modDivEmail").length === 0) {
        $content = $("#frm3").append("<h2>Cliente. Modificar correo electronico</h2>");

        $modDivEmail = $('<div id="modDivEmail"></div>');
        $content.append($modDivEmail);
        $form = $("<form></form>", { action: "../php/modCliente.php", method: 'POST', id: "form" });
        $modDivEmail.append($form);

        $form.append("Nuevo Apellido:");
        $form.append('<input type="name" name="newEmail">');

        $sendBtton = $('<input type="submit" value="submit">');
        $form.append($sendBtton);
    } else {
        $("#frm3").empty();
    }
}

function modPet() {
    window.location.href = "../php/modMascota.php";
}

function registerPet() {
    window.location.href = "../php/registrarMascotas.php";
}

function delClient() {
    if ($("#modDivDel").length === 0) {
        $content = $("#frm6").append("<h2>¿Está seguro? Se eliminara el registro del cliente seleccionado y sus mascotas</h2>");

        $modDivDel = $('<div id="modDivDel"></div>');
        $content.append($modDivDel);
        $form = $("<form></form>", { action: "../php/modCliente.php", method: 'POST', id: "form" });
        $modDivDel.append($form);

        $form.append('<button name="del">Confirmar</button>');
    } else {
        $("#frm6").empty();
    }
}

$("#res").click(modName);
$("#res1").click(modLastName);
$("#res2").click(modTel);
$("#res3").click(modEmail);
$("#res4").click(modPet);
$("#res5").click(registerPet);

$("#res6").click(delClient);