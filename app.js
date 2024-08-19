async function addToCart(productId, quantity, price) {
    const response = await fetch('add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ product_id: productId, quantity: quantity, price: price })
    });

    const result = await response.json();
    if (result.success) {
        alert('Producto agregado al carrito');
        // Puedes actualizar el número de items en el carrito aquí
    } else {
        alert('Error al agregar el producto al carrito');
    }
}

// Llamada inicial para cargar productos (opcional, si decides hacerlo desde JS en vez de PHP)
document.addEventListener('DOMContentLoaded', function() {
    fetchProducts();
});

async function fetchProducts() {
    const response = await fetch('get_products.php');
    const products = await response.json();
    displayProducts(products);
}

function displayProducts(products) {
    const productContainer = document.getElementById('product-container');
    productContainer.innerHTML = '';
    products.forEach(product => {
        const productElement = document.createElement('div');
        productElement.className = 'product-item';
        productElement.innerHTML = `
            <h2>${product.name}</h2>
            <p>${product.description}</p>
            <p>Precio: $${product.price}</p>
            <button onclick="addToCart(${product.id}, 1, ${product.price})">Agregar al Carrito</button>
        `;
        productContainer.appendChild(productElement);
    });
}
