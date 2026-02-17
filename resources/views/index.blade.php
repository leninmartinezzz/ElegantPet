<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbera Pet - Productos para Mascotas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-dark: #b30000;
            --primary: #D40000;
            --primary-light: #e63030;
            --primary-lighter: #f37a7a;
            --dark: #000000;
            --light: #1A1A1A;
            --text-light: #E0E0E0;
            --text-dark: #FFFFFF;
            --accent: #C0C0C0;
            --silver: #C0C0C0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--dark);
            color: var(--text-light);
            line-height: 1.6;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            padding: 12px 0;
            transition: all 0.3s ease;
        }
        
        .navbar-scrolled {
            padding: 8px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.4);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            padding: 0;
        }
        
        .navbar-logo {
            height: 65px;
            width: auto;
            margin-right: 12px;
            object-fit: contain;
            filter: brightness(0) invert(1);
        }
        
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
            margin: 0 8px;
            padding: 8px 12px !important;
            border-radius: 4px;
        }
        
        .nav-link:hover, .nav-link.active {
            color: white !important;
            background-color: rgba(255,255,255,0.15);
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: white;
            transition: all 0.3s;
        }
        
        .nav-link:hover:after, .nav-link.active:after {
            width: 80%;
            left: 10%;
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--primary-dark), var(--primary));
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 30px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(212, 0, 0, 0.4);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(212, 0, 0, 0.6);
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
        }
        
        .btn-outline-primary {
            border: 2px solid var(--primary);
            color: var(--primary);
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 30px;
            transition: all 0.3s;
            background-color: transparent;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(212, 0, 0, 0.4);
        }
        
        .btn-outline-light {
            border: 2px solid var(--silver);
            color: var(--silver);
        }
        
        .btn-outline-light:hover {
            background-color: var(--silver);
            color: var(--dark);
        }
        
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1541781774459-bb2af2f05b55?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            padding: 150px 0;
            margin-bottom: 70px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(212, 0, 0, 0.3) 0%, rgba(212, 0, 0, 0.2) 100%);
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 40px;
            font-weight: 700;
            color: var(--primary);
            text-align: center;
        }
        
        .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-light), var(--primary));
            margin: 15px auto 0;
            border-radius: 2px;
        }
        
        .card {
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 25px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            background-color: var(--light);
            color: var(--text-light);
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(212, 0, 0, 0.3);
        }
        
        .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .card:hover .card-img-top {
            transform: scale(1.05);
        }
        
        .price {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.3rem;
        }
        
        .category-badge {
            background: linear-gradient(to right, var(--primary), var(--primary-light));
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
        }
        
        .footer {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
            padding: 60px 0 20px;
            margin-top: 70px;
        }
        
        .footer a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer a:hover {
            color: white;
            text-decoration: underline;
        }
        
        .social-icons a {
            display: inline-block;
            width: 42px;
            height: 42px;
            background: rgba(255,255,255,0.1);
            text-align: center;
            line-height: 42px;
            border-radius: 50%;
            margin-right: 12px;
            transition: all 0.3s;
        }
        
        .social-icons a:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-3px);
        }
        
        .feature-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-lighter) 100%);
            width: 100px;
            height: 100px;
            line-height: 100px;
            border-radius: 50%;
            display: inline-block;
            transition: all 0.3s;
        }
        
        .feature-box:hover .feature-icon {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(212, 0, 0, 0.3);
        }
        
        .newsletter-form {
            position: relative;
        }
        
        .newsletter-form input {
            background: rgba(255,255,255,0.15);
            border: none;
            color: white;
            padding: 14px 20px;
            border-radius: 30px;
            width: 100%;
            backdrop-filter: blur(5px);
        }
        
        .newsletter-form input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(255,255,255,0.3);
        }
        
        .newsletter-form input::placeholder {
            color: rgba(255,255,255,0.7);
        }
        
        .newsletter-form button {
            position: absolute;
            right: 5px;
            top: 5px;
            background: white;
            border: none;
            color: var(--primary);
            border-radius: 30px;
            padding: 9px 22px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .newsletter-form button:hover {
            background: var(--silver);
        }
        
        .services-section {
            background: var(--light);
            padding: 80px 0;
            position: relative;
        }
        
        .services-section:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23D40000' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.5;
        }
        
        .services-content {
            position: relative;
            z-index: 1;
        }
        
        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.8s ease forwards;
        }
        
        .delay-1 {
            animation-delay: 0.2s;
        }
        
        .delay-2 {
            animation-delay: 0.4s;
        }
        
        .delay-3 {
            animation-delay: 0.6s;
        }
        
        /* Media queries para responsividad */
        @media (max-width: 992px) {
            .navbar-logo {
                height: 40px;
            }
            .navbar-brand {
                font-size: 1.6rem;
            }
            .hero-section {
                padding: 120px 0;
            }
        }
        
        @media (max-width: 768px) {
            .navbar-logo {
                height: 35px;
            }
            .navbar-brand {
                font-size: 1.4rem;
            }
            .hero-section {
                padding: 100px 0;
                background-attachment: scroll;
            }
        }
        
        @media (max-width: 576px) {
            .navbar-logo {
                height: 30px;
                margin-right: 8px;
                margin-left: 10px;
                margin-top: 2px;
                margin-bottom: 2px;
                max-width: 40px;
                object-fit: contain;
                flex-shrink: 0;
            }
            
            .navbar-brand {
                font-size: 1.2rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 70%;
            }
            
            .hero-section {
                padding: 80px 0;
            }
            
            .hero-section h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo1.png') }}" alt="Logo Elegant Pet" class="navbar-logo">BARBERA PET
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicios">Servicios</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2"><i class="fas fa-user"></i> Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-light"><i class="fas fa-user-plus"></i> Registrarse</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center hero-content">
            <h1 class="display-4 fw-bold mb-4 fade-in-up">Todo para consentir a tu mascota</h1>
            <p class="lead mb-4 fade-in-up delay-1">Encuentra los mejores productos y servicios para el cuidado de tus animales domésticos</p>
            <div class="fade-in-up delay-2">
                <a href="#" class="btn btn-primary btn-lg me-2">Ver Productos</a>
                <a href="#" class="btn btn-outline-light btn-lg">Nuestros Servicios</a>
            </div>
        </div>
    </section>

    <!-- Featured Categories -->
    <section class="container mb-5">
        <h2 class="section-title">Categorías Populares</h2>
        <div class="row justify-content-center">
            @if($categorias->count() > 0)
                @foreach($categorias as $categoria)
                    <div class="col-md-3 col-6 mb-4 fade-in-up">
                        <div class="card text-center border-0 shadow-sm">
                            <img src="{{ $categoria->imagen ? $categoria->imagen : asset('img/placeholder-category.jpg') }}" class="card-img-top" alt="{{ $categoria->nombre }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $categoria->nombre }}</h5>
                                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Ver más</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <div class="col-12 text-center">
                    <div class="empty-state">
                        <i class="fas fa-th-large fa-3x mb-3"></i>
                        <h4>No hay categorías disponibles</h4>
                        <p class="text-muted">Próximamente agregaremos nuevas categorías para tus mascotas.</p> 
             @endif
        </div>
    </section>

    <!-- Featured Products -->
<section class="container mb-5" id="productos">
    <h2 class="section-title">Productos Destacados</h2>
    
    @if($productos->count() > 0)
        <div class="row justify-content-center">
            @foreach($productos as $producto)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card h-100">
                    <img src="{{ $producto->imagen ? $producto->imagen : asset('img/placeholder-product.jpg') }}" class="card-img-top" alt="{{ $producto->nombre }}" class="card-img-top" alt="Producto">
                    <div class="card-body">
                        <span class="category-badge">{{ $producto->categoria->nombre }}</span>
                        <h5 class="card-title mt-2">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">${{ $producto->precio }}</span>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-shopping-cart"></i> Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="btn btn-outline-primary">Ver todos los productos</a>
        </div>
    @else
        <div class="row">
            <div class="col-12 text-center">
                <div class="empty-state">
                    <i class="fas fa-boxes fa-3x mb-3"></i>
                    <h4>No hay productos disponibles</h4>
                    <p class="text-muted">Próximamente tendremos nuevos productos para ti.</p>
                </div>
            </div>
        </div>
    @endif
</section>

    <!-- Services Section -->
    <section class="services-section" id="servicios">
        <div class="container services-content">
            <h2 class="section-title">Nuestros Servicios</h2>
            <div class="row">
                <div class="col-md-4 mb-4 fade-in-up">
                    <div class="text-center feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-spa"></i>
                        </div>
                        <h4>Peluquería Canina</h4>
                        <p>Servicio de baño, corte de pelo y arreglo personal para tu mascota.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4 fade-in-up delay-1">
                    <div class="text-center feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4>Guardería</h4>
                        <p>Cuidamos de tu mascota cuando no puedes estar con ella.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4 fade-in-up delay-2">
                    <div class="text-center feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <h4>Consultas Veterinarias</h4>
                        <p>Atención médica especializada para el bienestar de tu mascota.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4>BARBERA PET</h4>
                    <p>Tu tienda de confianza para productos y servicios de mascotas. Calidad garantizada y atención personalizada.</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Productos</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">Nosotros</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Categorías</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Alimentos</a></li>
                        <li><a href="#">Juguetes</a></li>
                        <li><a href="#">Accesorios</a></li>
                        <li><a href="#">Salud</a></li>
                        <li><a href="#">Ofertas</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Suscríbete a nuestro boletín</h5>
                    <p>Recibe ofertas exclusivas y novedades sobre productos.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Tu correo electrónico">
                        <button type="submit">Suscribirse</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="text-center py-3">
                <p class="mb-0">&copy; 2025 Barbera Pet. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Animación de elementos al hacer scroll
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in-up');
            
            const fadeObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            fadeElements.forEach(el => {
                el.style.opacity = 0;
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                fadeObserver.observe(el);
            });
        });
    </script>
</body>
</html>