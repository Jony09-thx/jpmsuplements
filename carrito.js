let carrito = [];
let total = 0;

function agregarAlCarrito(producto, precio) {
    carrito.push({ producto, precio });
    total += precio;
    mostrarCarrito();
}

function mostrarCarrito() {
    const listaCarrito = document.getElementById('lista-carrito');
    const itemsCarrito = document.getElementById('items-carrito');
    itemsCarrito.textContent = `(${carrito.length})`;

    listaCarrito.innerHTML = ''; // Limpiar el contenido del carrito
    carrito.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.producto} - $${item.precio}`;
        listaCarrito.appendChild(li);
    });
    document.getElementById('total-carrito').textContent = total.toFixed(2);
}

function toggleCarrito() {
    const dropdownCarrito = document.getElementById('dropdown-carrito');
    dropdownCarrito.style.display = dropdownCarrito.style.display === 'none' || dropdownCarrito.style.display
}