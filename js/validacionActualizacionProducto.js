var formularioActualizacionProducto = document.querySelector('#formularioActualizacionProducto');

formularioActualizacionProducto.addEventListener('submit', function(event){
    let nombre = document.querySelector('#inputNombreProducto').value;
    let precioProducto = document.querySelector('#inputPrecioProducto').value;
    let descripcion = document.querySelector('#inputDescripcionProducto').value;

    //transformar precio a integer
    let precio = parseInt(precioProducto);

    //validar campos
    if(nombre.length == 0){
        alert('Ingrese el NOMBRE del producto');
        event.preventDefault();
    }else if(precioProducto.length == 0 || precio < 0){
        alert('Ingrese el PRECIO del producto\n(NO puede ser menor a CERO)');
        event.preventDefault();
    }else if(descripcion.length == 0){
        alert('Ingrese la DESCRIPCION del producto');
        event.preventDefault();
    }
});