var formularioLogin = document.querySelector("#formularioLogin");

formularioLogin.addEventListener('submit', function (event) {


    let usuario = document.querySelector('#inputUsuario').value;
    let passwd = document.querySelector('#inputPassword').value;

    if (usuario.length == 0) {
        alert("ingrese un usuario");
        event.preventDefault();
    } else if (passwd.length == 0) {
        alert("ingrese una contraseña");
        event.preventDefault();
    }

});