<?php
session_start(); // Asegúrate de iniciar la sesión al principio del archivo
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Tienda suplementos</title>
		<link rel="stylesheet" href="index.css" />
		<style>
iframe {
	display: block;
    margin: 0 auto;
}

			/* Opcional: Estilo para indicar que está deshabilitado visualmente */
			.add-cart.disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
	
button {
    background: transparent;
    border: none;
    outline: none;
    padding: 0;
    margin: 0;
    cursor: pointer;
}

.add-cart a {
    text-decoration: none;
    color: inherit; /* o el color que prefieras para el ícono */
}

.add-cart i {
    display: block;
}

		</style>
	</head>
	<body>
		<header>
			<div class="container-hero">
				<div class="container hero">
					<div class="customer-support">
						<i class="fa-solid fa-headset"></i>
						<div class="content-customer-support">
							<span class="text">Soporte al cliente</span>
							<span class="number">123-456-7890</span>
						</div>
					</div>

					<div class="container-logo">
						<i class="fa-solid fa-dumbbell"></i>
						<h1 class="logo"><a href="#">JPM SUPLEMENTS STORE</a></h1>
					</div>

					<div class="container-user">
                    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']): ?>
                        <!-- Si el usuario está logueado, el ícono 'fa-user' redirige al perfil -->
                        <a href="./IniciaSesion/perfil.php" class="user-link">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    <?php else: ?>
                        <!-- Si no está logueado, muestra el ícono de login -->
                        <a href="IniciaSesion/InicioSesion.html"><i class="fa-solid fa-user"></i></a>
                    <?php endif; ?>
                </div>
				</div>
			</div>

			<div class="container-navbar">
				<nav class="navbar container">
					<i class="fa-solid fa-bars"></i>
					<ul class="menu">
						<li><a href="#">Inicio</a></li>
						<li><a href="#">Acerca De</a></li>
						<li><a href="favoritos/misfavo.php">Mis Favoritos</a></li>
						<?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'administrador'): ?>
    						<li><a href="./CRUD/listar.php">Panel de Administración</a></li>
						<?php endif; ?>
					
						<?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']): ?>
                        <!-- Mostrar el enlace de cerrar sesión -->
                        <li><a href="IniciaSesion/CerrarSesion.php">Cerrar sesión</a></li>
                    <?php else: ?>
                        <!-- Mostrar el enlace de iniciar sesión -->
                        <li><a href="IniciaSesion/InicioSesion.html">Iniciar Sesión</a></li>
                    <?php endif; ?>	
					
					</ul>

					<form class="search-form" onsubmit="return false;">
						<input type="search" id="searchInput" placeholder="Buscar..." />
						<button type="button" class="btn-search">
							<i class="fa-solid fa-magnifying-glass"></i>
						</button>
					</form>	
				</nav>
			</div>
		</header>

		<main class="main-content">
			<section class="container container-features">
				<div class="card-feature">
					<i class="fa-solid fa-plane-up"></i>
					<div class="feature-content">
						<span>Envío gratuito a nivel mundial</span>
						<p>En pedido superior a $150</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-wallet"></i>
					<div class="feature-content">
						<span>Contrareembolso</span>
						<p>100% garantía de devolución de dinero</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-gift"></i>
					<div class="feature-content">
						<span>Tarjeta regalo especial</span>
						<p>Ofrece bonos especiales con regalo</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-headset"></i>
					<div class="feature-content">
						<span>Servicio al cliente 24/7</span>
						<p>LLámenos 24/7 al 123-456-7890</p>
					</div>
				</div>
			</section>

			<section class="container top-categories">
				<h1 class="heading-1">Categorías</h1>
				<div class="container-categories">
					<div class="card-category category-moca">
						<p>Ganar músculo</p>
						<a href="categorias/ganarmusculo.html"><span>Ver más</span></a>
					</div>
					<div class="card-category category-expreso">
						<p>Bajar peso</p>
						<a href="categorias/bajarpeso.html"><span>Ver más</span></a>
					</div>
					<div class="card-category category-capuchino">
						<p>Perder grasa</p>
						<a href="categorias/perdergrasa.html"><span>Ver más</span></a>
					</div>
				</div>
			</section>
			

			<section class="container top-products">
				<h1 class="heading-1">Mejores Productos</h1>

				<div class="container-options">
					<span class="active">Destacados</span>
					<span>Más recientes</span>
					<span>Mejores Vendidos</span>
				</div>

				<div class="container-products">
					<!-- Producto 1 -->
<div class="card-product">
    <div class="container-img">
        <img src="images/proteinaiso.jpg" alt="Cafe Irish" />
        <span class="discount">-13%</span>
        <div class="button-group">
            <span>
                <i class="fa-regular fa-eye"></i>
            </span>
            <span>
                <i class="fa-regular fa-heart" id="heart-1" onclick="toggleFavorite(1)"></i>
            </span>
            <span>
                <i class="fa-solid fa-code-compare"></i>
            </span>
        </div>
    </div>
    <div class="content-card-product">
        <div class="stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star-half-stroke"></i>
        </div>
        <h3 class="product-name">Proteina ISO100</h3>
        <button>
            <span class="add-cart">
                <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']): ?>
                    <!-- Si el usuario está logueado, permite el enlace original -->
                    <a href="ventashopify/ganarmusc/isoprote.html">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </a>
                <?php else: ?>
                    <!-- Si no está logueado, redirige al login -->
                    <a href="IniciaSesion/InicioSesion.html">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </a>
                <?php endif; ?>
            </span>
        </button>
        <p class="price">$1,899.00 <span>$2,000.00</span></p>
    </div>
</div>
					<!-- Producto 2 -->
					<div class="card-product">
						<div class="container-img">
							<img
								src="images/mass.webp"
								alt="Cafe incafe-ingles.jpg"
							/>
							
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart" id="heart-2" onclick="toggleFavorite(2)"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3 class="product-name">Proteina MUTANT (MASS GAINER)</h3>
							<span class="add-cart">
                <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']): ?>
                    <!-- Si el usuario está logueado, permite el enlace original -->
                    <a href="ventashopify/ganarmusc/mutanmass.html">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </a>
                <?php else: ?>
                    <!-- Si no está logueado, redirige al login -->
                    <a href="IniciaSesion/InicioSesion.html">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </a>
                <?php endif; ?>
            </span>
							<p class="price">$1,389.00 </p>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img
								src="images/creatinas.jfif"
								alt="Cafe Australiano"
							/>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
							</div>
							<h3 class="product-name" >Creatina Monohidratada</h3>
							<span class="add-cart">
                <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']): ?>
                    <!-- Si el usuario está logueado, permite el enlace original -->
                    <a href="ventashopify/ganarmusc/creatinabirdman.html">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </a>
                <?php else: ?>
                    <!-- Si no está logueado, redirige al login -->
                    <a href="IniciaSesion/InicioSesion.html">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </a>
                <?php endif; ?>
            </span>
							<p class="price">$495.00</p>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img src="images/psychotic.webp" alt="Cafe Helado" />
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3 class="product-name">INSANE LABZ PSYCHOTIC (PRE-WORKOUT)</h3>
							<span class="add-cart">
                <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']): ?>
                    <!-- Si el usuario está logueado, permite el enlace original -->
                    <a href="ventashopify/ganarmusc/insanepsychotic.html">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </a>
                <?php else: ?>
                    <!-- Si no está logueado, redirige al login -->
                    <a href="IniciaSesion/InicioSesion.html">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </a>
                <?php endif; ?>
            </span>
							<p class="price">$590.00</p>
						</div>
					</div>
				</div>
			</section>
			<section class="container specials">
				<h1 class="heading-1">Especiales</h1>

				<div class="container-products">
					<!-- Producto 1 -->
					<div class="card-product">
						<div class="container-img">
							<img src="images/evp.webp" alt="Cafe Irish" />
							<span class="discount">-13%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3 class="product-name">EVOGEN EVP 3D</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$4.60 <span>$5.30</span></p>
						</div>
					</div>
					<!-- Producto 2 -->
					<div class="card-product">
						<div class="container-img">
							<img
								src="images/venom.webp"
								alt="Cafe incafe-ingles.jpg"
							/>
							<span class="discount">-22%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3 class="product-name">VENOM INFERNO (PRE-WORKOUT)</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$5.70 <span>$7.30</span></p>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img src="images/multivitgat.jpg" alt="Cafe Viena" />
							<span class="discount">-30%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
							</div>
							<h3 class="product-name">Multivitamínico GAT</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$3.85 <span>$5.50</span></p>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img src="images/ISO.webp" alt="Cafe Liqueurs" />
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3 class="product-name">Dragon Pharma Isophorm 100% Hidrolizada</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$5.60</p>
						</div>
					</div>
				</div>
			</section>

			

			<section class="container blogs">
				<h1 class="heading-1">Encuéntranos</h1>
			</section>
		</main>


        <div id="map"></div>
        <script>
            function initMap(){
                //Coordenadas de Mi Hogar En Tecamac
                const ubicacion = {lat: 19.5933208, lng: -99.0034847};
            //Configuracion inicial del mapa
            const mapa = new google.maps.Map(document.getElementById("map"), {
                zoom : 16, //Nivel de Zoom 
                center: ubicacion,
        });
            //Marcador en el mapa con un titulo
            const marcador = new google.maps.Marker({
                position: ubicacion,
                map: mapa,
                title: "Utilizando API de Geolocalización",
            });
        }
        window.onload = initMap;
        </script>
<section class="container blogs">
				<h1 class="heading-1">Videos</h1>
			</section>

<iframe width="560" height="315" src="https://www.youtube.com/embed/TK3wf-LjDG8?si=1OoKVqKw-iF5Rv-7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
<br>
		<footer class="footer">
			<div class="container container-footer">
				<div class="menu-footer">
					<div class="contact-info">
						<p class="title-footer">Información de Contacto</p>
						<ul>
							<li>
								Dirección: Ecatepec. Edo. Mex., México
							</li>
							<li>Teléfono: 55-12-34-56-78</li>
							<li>CP: 55010</li>
							<li>Email: jpmsuplements@support.com</li>
						</ul>
						<div class="social-icons">
							<span class="facebook">
								<i class="fa-brands fa-facebook-f"></i>
							</span>
							<span class="twitter">		
								<i class="fa-brands fa-twitter"></i>
							</span>
							<span class="youtube">
							<a href="https://www.youtube.com/results?search_query=suplementos+fitnes" target="_blank">
								<i class="fa-brands fa-youtube"></i>
								</a>
							</span>
							<span class="pinterest">
								<i class="fa-brands fa-pinterest-p"></i>
							</span>
							<span class="instagram">
								<i class="fa-brands fa-instagram"></i>
							</span>
						</div>
					</div>

					<div class="information">
						<p class="title-footer">Información</p>
						<ul>
							<li><a href="#">Acerca de Nosotros</a></li>
							<li><a href="#">Información Envíos</a></li>
							<li><a href="#">Politicas de Privacidad</a></li>
							<li><a href="#">Términos y condiciones</a></li>
							<li><a href="#">Contactános</a></li>
						</ul>
					</div>

					<div class="my-account">
						<p class="title-footer">Mi cuenta</p>

						<ul>
							<li><a href="#">Mi cuenta</a></li>
							<li><a href="#">Historial de pedidos</a></li>
							<li><a href="#">Lista de deseos</a></li>
							<li><a href="#">Boletín</a></li>
							<li><a href="#">Reembolsos</a></li>
						</ul>
					</div>

					<div class="newsletter">
						<p class="title-footer">Boletín informativo</p>

						<div class="content">
							<p>
								Suscríbete a nuestros boletines ahora y mantente al
								día con nuevos productos y ofertas exclusivas.
							</p>
							<input type="email" placeholder="Ingresa correo aquí...">
							<button>Suscríbete</button>
						</div>
					</div>
				</div>

				<div class="copyright">
					<p>
						JPM SUPLEMENTS &copy; 2025
					</p>

					<img src="images/payment.png" alt="Pagos">
				</div>
			</div>
		</footer>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0h_0cAfd3OWkje79zmgJ-ny7f4-Ws69Q"></script>

		<script src="https://kit.fontawesome.com/ceb1921ab7.js" crossorigin="anonymous"></script>

		<script src="carrito.js"></script>

		<script src="favoritos/favo.js"></script>

		<script>
			// Esperamos a que todo el DOM esté cargado
			document.addEventListener('DOMContentLoaded', function() {
			  const searchButton = document.querySelector('.btn-search');
			  const searchInput = document.getElementById('searchInput');
			  
			  searchButton.addEventListener('click', function() {
				const searchQuery = searchInput.value.toLowerCase(); // Obtener el valor de búsqueda
				const products = document.querySelectorAll('.card-product'); // Obtener todos los productos
		  
				products.forEach(product => {
				  const productName = product.querySelector('.product-name').textContent.toLowerCase(); // Obtener el nombre del producto
		  
				  // Si el nombre del producto incluye la búsqueda, lo mostramos, de lo contrario lo ocultamos
				  if (productName.includes(searchQuery)) {
					product.style.display = 'block'; // Mostrar producto
				  } else {
					product.style.display = 'none'; // Ocultar producto
				  }
				});
			  });
			  
			  // También permitir que el usuario filtre presionando Enter en lugar de hacer click
			  searchInput.addEventListener('keydown', function(event) {
				if (event.key === 'Enter') {
				  searchButton.click(); // Simular click si se presiona "Enter"
				}
			  });
			});
		  </script>		  
		  
	</body>
</html>