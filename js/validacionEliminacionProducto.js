var formularioEliminacionProducto = document.querySelector('#formularioEliminacionProducto');

//validar campos
formularioEliminacionProducto.addEventListener('submit', function(event){
    let nombre = document.querySelector('#inputNombreProducto').value;

    if(nombre.length == 0){
        alert('Ingrese el NOMBRE del producto');
        event.preventDefault();
    }
})