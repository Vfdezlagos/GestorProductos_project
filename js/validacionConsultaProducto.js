var formularioConsultaCodigo = document.querySelector('#formularioConsultaCodigo');
var formularioConsultaNombre = document.querySelector('#formularioConsultaNombre');
var formularioConsultaSucursal = document.querySelector('#formularioConsultaSucursal');

//Validar Consulta por codigo
formularioConsultaCodigo.addEventListener('submit', function(event){
    let codigo = document.querySelector('#inputCodigoProducto').value;

    if(codigo.length == 0){
        alert('Ingrese un CODIGO de producto.');
        event.preventDefault();
    }
});

//Validar consulta por nombre
formularioConsultaNombre.addEventListener('submit', function(event){
    let nombre = document.querySelector('#inputNombreProducto').value;

    if(nombre.length == 0){
        alert('Ingrese un NOMBRE de producto.');
        event.preventDefault();
    }
});

//validar consulta por sucursal
formularioConsultaSucursal.addEventListener('submit', function(event){
    let sucursal = document.querySelector('#inputNombreSucursal').value;

    if(sucursal.length == 0){
        alert('Ingrese una SUCURSAL.');
        event.preventDefault();
    }
});