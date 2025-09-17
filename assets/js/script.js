// ====================================
// Datos del sitio web
// ====================================
// Simulación de la base de datos de productos
let products = [
    {
        id: '1',
        name: 'Crema Facial Hidratante de Aloe',
        category: 'crema',
        image: 'assets/images/product1.jpg',
        price: 19.99,
        description: 'Nuestra crema facial hidrata profundamente y revitaliza la piel, dejándola suave y radiante. Formulada con un 95% de extracto puro de aloe vera, esta crema es perfecta para el uso diario y para todo tipo de pieles.',
        properties: ['Hidratante', 'Calmante', 'Antioxidante', 'Para todo tipo de pieles', 'Rápida absorción']
    },
    {
        id: '2',
        name: 'Gel Puro de Aloe Vera 100%',
        category: 'gel',
        image: 'assets/images/product2.jpg',
        price: 12.50,
        description: 'Ideal para aliviar la piel después de la exposición solar, picaduras de insectos o irritaciones. Textura ligera y de rápida absorción, proporcionando una sensación refrescante inmediata.',
        properties: ['100% natural', 'Post-solar', 'Refrescante', 'Alivio rápido', 'Sin parabenos']
    },
    {
        id: '3',
        name: 'Serum Reparador Nocturno',
        category: 'serum',
        image: 'assets/images/serum.jpg',
        price: 29.99,
        description: 'Un potente serum que trabaja mientras duermes para reparar y rejuvenecer la piel. Enriquecido con vitaminas y extracto de aloe vera, ayuda a reducir líneas de expresión y a mejorar la elasticidad.',
        properties: ['Reparador', 'Rejuvenecedor', 'Antiedad', 'Con vitaminas', 'Uso nocturno']
    },
    {
        id: '4',
        name: 'Crema Corporal de Menta y Aloe',
        category: 'crema',
        image: 'assets/images/crema-corporal.jpg',
        price: 15.99,
        description: 'Una crema corporal refrescante que combina las propiedades del aloe vera con el efecto revitalizante de la menta. Perfecta para el uso diario, dejando la piel suave y con un agradable aroma.',
        properties: ['Refrescante', 'Suavizante', 'Aroma Natural', 'Hidratación profunda']
    },
    {
        id: '5',
        name: 'Mascarilla Facial Purificante',
        category: 'mascarilla',
        image: 'assets/images/product5.jpg',
        price: 18.00,
        description: 'Mascarilla que limpia profundamente los poros y deja la piel con una sensación de frescura y pureza.',
        properties: ['Purificante', 'Limpieza profunda', 'Suave', 'Refrescante']
    },
    {
        id: '6',
        name: 'Jabón Artesanal de Aloe y Argán',
        category: 'jabón',
        image: 'assets/images/product6.jpg',
        price: 8.99,
        description: 'Jabón hecho a mano con base de aloe y aceite de argán, ideal para pieles sensibles y secas.',
        properties: ['Artesanal', 'Hidratante', 'Suave', 'Piel sensible']
    },
    {
        id: '7',
        name: 'Tónico Facial Equilibrante de Aloe',
        category: 'tónico',
        image: 'assets/images/tonico.jpg',
        price: 14.99,
        description: 'Equilibra el pH de la piel y la prepara para absorber mejor los siguientes productos. Deja una sensación de frescura y limpieza.',
        properties: ['Equilibrante', 'Refrescante', 'Limpieza', 'Prepara la piel']
    },
    {
        id: '8',
        name: 'Bálsamo Labial de Aloe',
        category: 'bálsamo',
        image: 'assets/images/balsamo.jpg',
        price: 5.99,
        description: 'Repara y protege los labios secos o agrietados. Proporciona una hidratación duradera con un acabado suave y natural.',
        properties: ['Reparador', 'Hidratante', 'Protección', 'Natural']
    },
    {
        id: '9',
        name: 'Champú Sólido de Aloe y Coco',
        category: 'champú',
        image: 'assets/images/champu.jpg',
        price: 10.99,
        description: 'Champú sólido ecológico que limpia y nutre el cabello de forma natural. Sin sulfatos, ideal para el cabello y el medio ambiente.',
        properties: ['Ecológico', 'Nutritivo', 'Sin sulfatos', 'Cabello sano']
    },
    {
        id: '10',
        name: 'Aceite Corporal de Almendras y Aloe',
        category: 'aceite',
        image: 'assets/images/aceite.jpg',
        price: 17.50,
        description: 'Aceite corporal que hidrata y suaviza la piel, dejándola luminosa y nutrida. Ideal para masajes y para usar después de la ducha.',
        properties: ['Hidratación intensa', 'Suavizante', 'Para masajes', 'Luminosidad']
    }
];

// Datos para los testimonios y reseñas
const testimonials = [
    {
        id: 1,
        author: 'María P.',
        rating: 5,
        text: "He probado muchas cremas, pero la de Mapr Aloe es la única que ha mejorado mi piel. ¡La recomiendo al 100%!"
    },
    {
        id: 2,
        author: 'Carlos M.',
        rating: 5,
        text: "El gel de aloe vera es increíblemente refrescante. Lo uso a diario y mi piel se siente mucho más suave."
    },
    {
        id: 3,
        author: 'Laura F.',
        rating: 4,
        text: "La crema de menta y aloe es perfecta para después de la ducha. El aroma es maravilloso y la piel se siente muy fresca."
    }
];

const reviews = [
    {
        id: '1',
        productId: '1',
        author: 'Laura G.',
        rating: 5,
        text: '¡Esta crema es fantástica! Mi piel se siente hidratada todo el día y tiene un aroma muy natural.'
    },
    {
        id: '2',
        productId: '1',
        author: 'Pedro R.',
        rating: 4,
        text: 'Buena crema, se absorbe rápido y no deja sensación grasosa. Me gustaría que el envase fuera más grande.'
    },
    {
        id: '3',
        productId: '2',
        author: 'Ana S.',
        rating: 5,
        text: 'El gel es el mejor post-solar que he usado. Alivia instantáneamente y es muy fresco.'
    }
];

// Datos para las preguntas frecuentes
const faqData = [
    {
        id: 1,
        question: "¿Qué beneficios tiene el aloe vera para la piel?",
        answer: "El aloe vera es conocido por sus propiedades hidratantes, antiinflamatorias y cicatrizantes. Ayuda a calmar la piel irritada, a hidratarla profundamente y a promover la regeneración celular."
    },
    {
        id: 2,
        question: "¿Son sus productos aptos para pieles sensibles?",
        answer: "Sí, todos nuestros productos están formulados para ser suaves y son aptos para todo tipo de pieles, incluyendo las más sensibles."
    },
    {
        id: 3,
        question: "¿De dónde provienen sus ingredientes?",
        answer: "Nuestros ingredientes provienen de cultivos sostenibles y orgánicos. Nos aseguramos de que cada planta sea tratada con el máximo cuidado para garantizar la pureza y la calidad de nuestros productos finales."
    },
    {
        id: 4,
        question: "¿Realizan envíos internacionales?",
        answer: "Actualmente solo realizamos envíos dentro de España, pero estamos trabajando para expandirnos a otros países."
    },
    {
        id: 5,
        question: "¿Cómo puedo hacer un seguimiento de mi pedido?",
        answer: "Una vez que tu pedido sea enviado, recibirás un correo electrónico de confirmación con un número de seguimiento y un enlace para rastrear el estado de tu paquete."
    },
    {
        id: 6,
        question: "¿Cuál es la política de devoluciones?",
        answer: "Aceptamos devoluciones de productos sin abrir dentro de los 30 días posteriores a la compra. Por favor, contáctanos a través de la página de contacto para iniciar el proceso de devolución."
    },
    {
        id: 7,
        question: "¿Sus productos son veganos y libres de crueldad animal?",
        answer: "Sí, estamos orgullosos de que todos nuestros productos son 100% veganos y nunca han sido probados en animales."
    }
];

// Lógica para la página de productos (`productos.php`)
const productListContainer = document.getElementById('product-list');
const searchBar = document.getElementById('search-bar');
const filterCategory = document.getElementById('filter-category');
const sortBy = document.getElementById('sort-by');
const paginationControls = document.getElementById('pagination-controls');

let currentPage = 1;
const productsPerPage = 20;

function renderProducts(filteredProducts) {
    if (!productListContainer) return;
    productListContainer.innerHTML = '';
    if (filteredProducts.length === 0) {
        productListContainer.innerHTML = '<p style="text-align: center; width: 100%;">No se encontraron productos.</p>';
        return;
    }

    const startIndex = (currentPage - 1) * productsPerPage;
    const endIndex = startIndex + productsPerPage;
    const productsToDisplay = filteredProducts.slice(startIndex, endIndex);

    productsToDisplay.forEach(product => {
        const productCard = document.createElement('div');
        productCard.className = 'product-card';
        productCard.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>${product.description.substring(0, 80)}...</p>
            <a href="producto-detalle.php?id=${product.id}" class="btn-product">Ver Detalle</a>        `;
        productListContainer.appendChild(productCard);
    });

    renderPaginationControls(filteredProducts.length);
}

function renderPaginationControls(totalProducts) {
    if (!paginationControls) return;
    paginationControls.innerHTML = '';
    const totalPages = Math.ceil(totalProducts / productsPerPage);

    for (let i = 1; i <= totalPages; i++) {
        const pageButton = document.createElement('span');
        pageButton.className = `pagination-btn ${i === currentPage ? 'active' : ''}`;
        pageButton.textContent = i;
        pageButton.addEventListener('click', () => {
            currentPage = i;
            filterAndSortProducts();
        });
        paginationControls.appendChild(pageButton);
    }
}

function filterAndSortProducts() {
    const searchTerm = searchBar ? searchBar.value.toLowerCase() : '';
    const selectedCategory = filterCategory ? filterCategory.value : 'all';
    const sortValue = sortBy ? sortBy.value : 'default';

    let filtered = products.filter(product => {
        const matchesSearch = product.name.toLowerCase().includes(searchTerm);
        const matchesCategory = selectedCategory === 'all' || product.category === selectedCategory;
        return matchesSearch && matchesCategory;
    });

    if (sortValue === 'price-asc') {
        filtered.sort((a, b) => a.price - b.price);
    } else if (sortValue === 'price-desc') {
        filtered.sort((a, b) => b.price - a.price);
    } else if (sortValue === 'name-asc') {
        filtered.sort((a, b) => a.name.localeCompare(b.name));
    } else if (sortValue === 'name-desc') {
        filtered.sort((a, b) => b.name.localeCompare(a.name));
    }

    renderProducts(filtered);
}

// Lógica para la página de detalle del producto (`producto-detalle.html`)
const productDetailContainer = document.getElementById('product-detail-content');
const reviewGridContainer = document.querySelector('#reviews .review-grid');

function renderProductDetail() {
    if (!productDetailContainer) return;
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id');
    const product = products.find(p => p.id === productId);

    if (product) {
        document.getElementById('product-title').textContent = product.name + ' | Mapr Aloe';
        const propertiesHtml = product.properties.map(prop => `<li><span role="img" aria-label="icono">🌱</span> ${prop}</li>`).join('');

        productDetailContainer.innerHTML = `
            <img src="${product.image}" alt="${product.name}" class="main-image">
            <div class="product-info">
                <h1>${product.name}</h1>
                <p class="price">${product.price.toFixed(2)}€</p>
                <p class="description">${product.description}</p>
                <div class="properties">
                    <h3>Propiedades y Beneficios:</h3>
                    <ul>${propertiesHtml}</ul>
                </div>
                <a href="#" class="btn" style="margin-top: 2rem;">Comprar en Amazon</a>
            </div>
        `;

        // Cargar reseñas
        renderReviews(productId);

    } else {
        productDetailContainer.innerHTML = '<p>Producto no encontrado.</p>';
    }
}

function renderReviews(productId) {
    if (!reviewGridContainer) return;
    const productReviews = reviews.filter(review => review.productId === productId);
    reviewGridContainer.innerHTML = '';
    if (productReviews.length === 0) {
        reviewGridContainer.innerHTML = '<p>Todavía no hay reseñas para este producto.</p>';
    } else {
        productReviews.forEach(review => {
            const reviewCard = document.createElement('div');
            reviewCard.className = 'review-card';
            const stars = '⭐'.repeat(review.rating);
            reviewCard.innerHTML = `
                <div class="review-header">
                    <span class="review-author">${review.author}</span>
                    <span class="rating">${stars}</span>
                </div>
                <p class="review-text">${review.text}</p>
            `;
            reviewGridContainer.appendChild(reviewCard);
        });
    }
}

// Lógica para testimonios en el index
const testimonialGridContainer = document.querySelector('#testimonials .testimonial-grid');
function renderTestimonials() {
    if (!testimonialGridContainer) return;
    testimonialGridContainer.innerHTML = '';
    testimonials.forEach(testimonial => {
        const testimonialCard = document.createElement('div');
        testimonialCard.className = 'testimonial-card';
        const stars = '⭐'.repeat(testimonial.rating);
        testimonialCard.innerHTML = `
            <span class="rating">${stars}</span>
            <p>"${testimonial.text}"</p>
            <p class="author">- ${testimonial.author}</p>
        `;
        testimonialGridContainer.appendChild(testimonialCard);
    });
}

// Lógica para la página de FAQ: renderiza las preguntas y respuestas
const faqContentContainer = document.getElementById('faq-content');
if (faqContentContainer) {
    faqData.forEach(faq => {
        const faqItem = document.createElement('div');
        faqItem.className = 'faq-item';
        faqItem.innerHTML = `
            <button class="accordion-button">${faq.question}</button>
            <div class="accordion-content">
                <p>${faq.answer}</p>
            </div>
        `;
        faqContentContainer.appendChild(faqItem);
    });
}

// Lógica para el acordeón de FAQ: funcional en cualquier página que tenga el elemento
const accordionButtons = document.querySelectorAll('.accordion-button');
if (accordionButtons.length > 0) {
    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('active');
            const content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
            }
        });
    });
}

// Lógica para la visibilidad de la contraseña
const togglePassword = document.querySelector('.toggle-password-visibility');
const passwordInput = document.getElementById('password');
const eyeOn = document.getElementById('eye-on');
const eyeOff = document.getElementById('eye-off');

if (togglePassword && passwordInput && eyeOn && eyeOff) {
    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        if (type === 'text') {
            eyeOn.style.display = 'none';
            eyeOff.style.display = 'inline-block';
        } else {
            eyeOn.style.display = 'inline-block';
            eyeOff.style.display = 'none';
        }
    });
}

// ====================================
// Ejecutar las funciones al cargar la página en función de la URL
// ====================================
if (window.location.pathname.includes('productos.php')) {
    filterAndSortProducts();
    if (searchBar) searchBar.addEventListener('input', () => {
        currentPage = 1;
        filterAndSortProducts();
    });
    if (filterCategory) filterCategory.addEventListener('change', () => {
        currentPage = 1;
        filterAndSortProducts();
    });
    if (sortBy) sortBy.addEventListener('change', () => {
        currentPage = 1;
        filterAndSortProducts();
    });
} else if (window.location.pathname.includes('producto-detalle.php')) {
    renderProductDetail();
} else if (window.location.pathname.includes('index.php') || window.location.pathname === '/') {
    renderTestimonials();
}