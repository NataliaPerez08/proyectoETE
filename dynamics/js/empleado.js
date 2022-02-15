function register(){
    if ($("#signInDiv").length === 0){
        $signInDiv = $('<div id="signInDiv"></div>');
        $("#frm").append($signInDiv)
        // ../dynamics/php/empleado.php"
        $form = $("<form></form>", {action:"../dynamics/php/empleado.php", method:'POST'});
        $form.append('<label>Nombre(s):</label>');
        $form.append('<input type="text" name="name">');

        $form.append('<label>Apellidos:</label>');
        $form.append('<input type="text" name="lastname">');

        $form.append('<label>Correo Electronico:</label>');
        $form.append('<input type="email" name="email">');


        $form.append('<label>Telefono:</label>')
        $form.append('<input type="tel" name="telephone">');

        $form.append('<label>Salario:</label>')
        $form.append('<input type="double" name="salary">');

        $form.append('<label>Contraseña:</label>')
        $form.append('<input type="password" name="pass">');

        $form.append('<label>Cargo:</label>')
        $form.append('<input type="text" name="charge">');

        $form.append('<input type="submit" value="submit">')
        
        $signInDiv.append($form);
    }else{
        console.log("Ya existe")
    }
}
function registerClient(){
    console.log("cliente");
    if ($("#reClient").length === 0){
        $reClient = $('<div id="reClient"></div>');
        $("#frm1").append($reClient)
        // ../dynamics/php/empleado.php"
        $form = $("<form></form>", {action:"../dynamics/php/empleado.php", method:'POST'});
        $form.append('<label>Nombre(s):</label>');
        $form.append('<input type="text" name="Cname">');

        $form.append('<label>Apellidos:</label>');
        $form.append('<input type="text" name="Clastname">');

        $form.append('<label>Correo Electronico:</label>');
        $form.append('<input type="email" name="Cemail">');

        $form.append('<label>Telefono:</label>')
        $form.append('<input type="tel" name="Ctelephone">');

        $form.append('<label>Veterinario</label>')
        $form.append('<input type="text" name="vet">');

        $form.append('<input type="submit" value="submit">')
        
        $reClient.append($form);
    }else{
        console.log("Ya existe")
    }
}

$("#res").click(register);
$("#res1").click(registerClient);