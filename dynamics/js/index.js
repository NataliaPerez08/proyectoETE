var cont = document.getElementById("content")

function clic_div(event) {
    cont.innerHTML ="<h1>Empleado</h1> <br> <h2>Iniciar Sesión</h2>"
    var frm = document.createElement("form");
    cont.appendChild(frm);
    frm.method="POST"
    frm.action = "./dynamics/php/index.php"

    frm.append("Correo electronico")
  
    var usr = document.createElement("input")
    usr.type = "text"
    usr.name = "usr"
    frm.appendChild(usr)

    frm.append("Contraseña")
    var pass = document.createElement("input")
    pass.type = "password"
    pass.name = "pass"
    frm.appendChild(pass)

    var sb = document.createElement("button")
    sb.name = "submit"
    frm.appendChild(sb)
    sb.onclick = enviar


}
function enviar(frm){
    frm.submit()
}

var botonE =document.getElementById("emp")
botonE.onclick = clic_div