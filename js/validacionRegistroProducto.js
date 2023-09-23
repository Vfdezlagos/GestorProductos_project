var formularioRegistroProducto = document.querySelector('#formularioRegistroProducto');

formularioRegistroProducto.addEventListener('submit', function (event) {
    let codigoProducto = document.querySelector('#inputCodigoProducto').value;
    let nombreProducto = document.querySelector('#inputNombreProducto').value;
    let categoriaProducto = document.querySelector('#inputCategoriaProducto').value;
    let sucursalProducto = document.querySelector('#inputSucursalProducto').value;
    let cantidadProducto = document.querySelector('#inputCantidadProducto').value;
    let precioProducto = document.querySelector('#inputPrecioProducto').value;
    let descripcionProducto = document.querySelector('#inputDescripcionProducto').value;

    //transformar cantidad y precio en integer
    let cantidad = parseInt(cantidadProducto);
    let precio = parseInt(precioProducto);

    //Validar campos.
    if (codigoProducto.length == 0) {
        alert('Ingrese el CODIGO del producto.');
        event.preventDefault();
    } else if (nombreProducto.length == 0) {
        alert('Ingrese el NOMBRE del producto.');
        event.preventDefault();
    } else if (categoriaProducto == '#') {
        alert('Ingrese la CATEGORIA del producto.');
        event.preventDefault();
    } else if (sucursalProducto == '#') {
        alert('Ingrese la SUCURSAL del producto.');
        event.preventDefault();
    } else if (cantidadProducto.length == 0 || cantidad < 0) {
        alert('Ingrese la CANTIDAD de producto.\n(NO puede ser menor a CERO.)');
        event.preventDefault();
    } else if (precioProducto.length == 0 || precio < 0) {
        alert('Ingrese el PRECIO del producto.\n(NO puede ser menor a CERO.)');
        event.preventDefault();
    } else if (descripcionProducto.length == 0) {
        alert('Ingrese la DESCRIPCION del producto.');
        event.preventDefault();
    }
})