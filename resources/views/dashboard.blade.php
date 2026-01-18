<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Barbera Pet</title>
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
            --gradient-primary: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            --gradient-secondary: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-lighter) 100%);
        }
        
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--dark);
            color: var(--text-light);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            padding-top: 85px; /* Para el navbar fijo */
        }
        
        /* Navbar mejorado */
        .navbar {
            background: var(--gradient-primary);
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
            transition: all 0.3s ease;
            padding: 12px 0;
        }
        
        .navbar-scrolled {
            padding: 8px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }
        
        .navbar-logo {
            height: 50px;
            width: auto;
            margin-right: 12px;
            object-fit: contain;
            filter: brightness(0) invert(1);
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            margin: 0 5px;
            padding: 8px 16px !important;
            border-radius: 6px;
        }
        
        .nav-link:hover, .nav-link.active {
            color: white !important;
            background-color: rgba(255,255,255,0.15);
        }
        
        .nav-link i {
            margin-right: 6px;
        }
        
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        .modal{
            color: #000;
        }
        .dropdown-menu {
            background: var(--light);
            border: 1px solid rgba(212, 177, 0, 0.3);
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        
        .dropdown-item {
            color: var(--text-light);
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background: var(--primary);
            color: var(--dark);
        }
        
        .dashboard-container {
            padding: 30px 0;
        }

        /* Títulos mejorados */
        .section-titlee {
            position: relative;
            margin-bottom: 50px;
            font-weight: 800;
            color: var(--primary);
            text-align: center;
            font-size: 2.2rem;
            letter-spacing: -0.5px;
        }
        
        .section-titlee:after {
            content: '';
            display: block;
            width: 100px;
            height: 5px;
            background: var(--gradient-primary);
            margin: 20px auto 0;
            border-radius: 3px;
        }
        
        /* Welcome Card mejorada */
        .welcome-card {
            background: var(--light);
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
            padding: 40px;
            margin-bottom: 40px;
            border: 1px solid rgba(212, 177, 0, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-primary);
        }
        
        .user-avatar-large {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            margin: 0 auto 20px;
            box-shadow: 0 8px 20px rgba(212, 0, 0, 0.4);
            transition: all 0.3s ease;
        }
        
        .user-avatar-large:hover {
            transform: scale(1.05);
        }
        
        /* Stats Grid mejorado */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }
        
        .stat-card {
            background: var(--light);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            border: 1px solid rgba(212, 177, 0, 0.2);
            transition: all 0.3s ease;
            will-change: transform;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-primary);
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(212, 0, 0, 0.2);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: var(--dark);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover .stat-icon {
            transform: scale(1.1);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 8px;
            transition: all 0.3s ease;
        }
        
        .stat-label {
            color: var(--text-light);
            font-size: 1rem;
            font-weight: 500;
        }
        
        /* Cards mejoradas para categorías y productos */
        .card {
            border: none;
            transition: all 0.4s ease;
            margin-bottom: 25px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            background-color: var(--light);
            color: var(--text-light);
            height: 100%;
        }
        
        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(212, 0, 0, 0.3);
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .card:hover .card-img-top {
            transform: scale(1.08);
        }
        
        .card-body {
            padding: 25px;
        }
        
        .category-badge {
            background: var(--gradient-primary);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 12px;
        }
        
        .card-title {
            font-weight: 700;
            color: var(--text-light);
            margin-bottom: 12px;
            font-size: 1.3rem;
        }
        
        .card-text {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        
        .price {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        /* Botones mejorados */
        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 0, 0, 0.4);
        }
        
        .btn-primary:hover {
            background: var(--gradient-primary);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(212, 0, 0, 0.6);
        }
        
        .btn-outline-primary {
            border: 2px solid var(--primary);
            color: var(--primary);
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 30px;
            transition: all 0.3s ease;
            background-color: transparent;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: var(--dark);
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(212, 0, 0, 0.4);
        }
        
        .btn-sm {
            padding: 6px 14px;
            font-size: 0.85rem;
            border-radius: 20px;
            transition: all 0.2s ease;
        }
        
        /* View category button */
        .view-category-btn {
            background: rgba(212, 0, 0, 0.1);
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .view-category-btn:hover {
            background: var(--primary);
            color: var(--dark);
            transform: translateY(-2px);
        }
        
        /* Recent Activity mejorado */
        .recent-activity {
            background: var(--light);
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
            padding: 35px;
            margin-top: 40px;
            border: 1px solid rgba(212, 177, 0, 0.2);
            position: relative;
        }
        
        .recent-activity::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-primary);
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            padding: 18px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            transition: all 0.2s ease;
        }
        
        .activity-item:hover {
            background: rgba(255,255,255,0.03);
            border-radius: 10px;
            padding-left: 15px;
            padding-right: 15px;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: var(--dark);
            flex-shrink: 0;
            transition: all 0.3s ease;
        }
        
        .activity-item:hover .activity-icon {
            transform: scale(1.1);
        }
        
        /* Footer mejorado */
        .footer {
            background: var(--gradient-primary);
            color: white;
            padding: 50px 0 20px;
            margin-top: 70px;
        }
        
        .footer h5 {
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .footer p {
            color: rgba(255,255,255,0.8);
            line-height: 1.6;
        }
        
        /* Estados vacíos mejorados */
        .empty-state {
            text-align: center;
            padding: 60px 30px;
            color: rgba(255,255,255,0.7);
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: rgba(255,255,255,0.3);
        }
        
        .empty-state h4 {
            color: var(--text-light);
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        /* Badges mejorados */
        .badge {
            font-weight: 600;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
        }
        
        .badge.bg-primary {
            background: var(--gradient-primary) !important;
        }
        
        .text-primary {
            color: var(--primary) !important;
        }
        
        .text-muted {
            color: rgba(255,255,255,0.6) !important;
        }
        
        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
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
        
        /* Mejoras de responsive */
        @media (max-width: 992px) {
            .navbar-logo {
                height: 45px;
            }
            .navbar-brand {
                font-size: 1.6rem;
            }
            .section-titlee {
                font-size: 1.8rem;
            }
        }
        
        @media (max-width: 768px) {
            body {
                padding-top: 75px;
            }
            .navbar-logo {
                height: 40px;
            }
            .navbar-brand {
                font-size: 1.4rem;
            }
            .section-titlee {
                font-size: 1.6rem;
            }
            .welcome-card {
                padding: 25px;
            }
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .card-body {
                padding: 20px;
            }
        }
        
        @media (max-width: 576px) {
            body {
                padding-top: 70px;
            }
            .navbar-logo {
                height: 35px;
                margin-right: 8px;
            }
            .navbar-brand {
                font-size: 1.2rem;
            }
            .section-titlee {
                font-size: 1.4rem;
            }
            .welcome-card {
                padding: 20px;
            }
            .user-avatar-large {
                width: 100px;
                margin-top: 15px;
                height: 100px;
                font-size: 2.5rem;
            }
            .stat-card {
                padding: 20px;
            }
            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 24px;
            }
            .stat-number {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar fijo y mejorado -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo1.png') }}" alt="Logo Elegant Pet" class="navbar-logo">BARBERA PET
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-paw"></i> Mascotas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('citas.usuario') }}"><i class="fas fa-calendar-alt"></i> Citas</a>
                    </li>
                </ul>
                
                <!-- User Menu -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-avatar">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user me-2"></i> Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Configuración</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-history me-2"></i> Historial</a></li>
                            <li><a class="dropdown-item" href="{{ route('agregar.mascota') }}"><i class="fas fa-paw me-2"></i> Agregar Mascota</a></li>
                            @if(Auth::user()->rol === 'admin')
                            <li><a class="dropdown-item" href="{{ route('agregar.servicio') }}"><i class="fas fa-calendar-alt me-2"></i> Agregar Servicio</a></li>
                            <li><a class="dropdown-item" href="{{ route('citas.consulta') }}"><i class="fas fa-calendar-alt me-2"></i> Consultar Citas</a></li>
                            <li><a class="dropdown-item" href="{{ route('agregar.categoria') }}"><i class="fas fa-list me-2"></i> Agregar Categoría</a></li>
                            <li><a class="dropdown-item" href="{{ route('agregar.producto') }}"><i class="fas fa-box me-2"></i> Agregar Producto</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="dashboard-container">
        <div class="container">
            <!-- Welcome Card mejorada -->
            <div class="welcome-card fade-in-up">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="display-6 fw-bold text-primary">¡Bienvenido de nuevo, {{ Auth::user()->name }}!</h1>
                        <p class="lead">Es un placer tenerte de vuelta en Barbera Pet. Aquí tienes un resumen de tu actividad reciente.</p>
                        <div class="mt-4">
                            <span class="badge bg-primary me-2"><i class="fas fa-calendar-check me-1"></i> Miembro desde: {{ Auth::user()->created_at->format('M Y') }}</span>
                            <span class="badge bg-success"><i class="fas fa-envelope me-1"></i> {{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="user-avatar-large">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <h5>{{ Auth::user()->name }}</h5>
                        <p class="text-muted">Usuario Premium</p>
                    </div>
                </div>
            </div>

            <!-- Stats Grid mejorado -->
            <div class="stats-grid">
                <div class="stat-card fade-in-up">
                    <div class="stat-icon">
                        <i class="fas fa-paw"></i>
                    </div>
                    <div class="stat-number">3</div>
                    <div class="stat-label">Mascotas Registradas</div>
                </div>
                
                <div class="stat-card fade-in-up delay-1">
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-number">12</div>
                    <div class="stat-label">Pedidos Realizados</div>
                </div>
                
                <div class="stat-card fade-in-up delay-2">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-number">5</div>
                    <div class="stat-label">Citas Programadas</div>
                </div>
                
                <div class="stat-card fade-in-up delay-3">
                    <div class="stat-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-number">4.8</div>
                    <div class="stat-label">Rating Promedio</div>
                </div>
            </div>

            <!-- Featured Categories mejorado -->
            <section class="container mb-5 mt-5">
                <h2 class="section-titlee">Categorías Populares</h2>
                <div class="row justify-content-center">
                    @if($categorias->where('visualizacion', 1)->count() > 0)
                        @foreach($categorias->where('visualizacion', 1)->take(6) as $categoria)
                        <div class="col-lg-4 col-md-6 col-12 mb-4 fade-in-up">
                            <div class="card text-center border-0 shadow-sm">
                                <img src="{{ $categoria->imagen ? $categoria->imagen : asset('img/placeholder-category.jpg') }}" 
                                    alt="{{ $categoria->nombre }}" class="card-img-top" loading="lazy">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $categoria->nombre }}</h5>
                                    <a href="#" class="view-category-btn">
                                        Ver <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <!-- Mensaje centrado cuando no hay categorías -->
                    <div class="col-12 text-center">
                        <div class="empty-state">
                            <i class="fas fa-tags fa-3x mb-3"></i>
                            <h4>No hay categorías disponibles</h4>
                            <p class="text-muted">Próximamente tendremos nuevas categorías para ti.</p>
                        </div>
                    </div>
                    @endif
                </div>
            </section>

            <!-- Featured Products mejorado -->
            <section class="container mb-5">
                <h2 class="section-titlee">Productos Destacados</h2>
                <div class="row justify-content-center">
                    @if($productos->count() > 0)
                    @foreach($productos->take(4) as $producto)
                    <div class="col-lg-3 col-md-6 col-12 mb-4 fade-in-up">
                        <div class="card">
                            <img src="{{ $producto->imagen ? $producto->imagen : asset('img/placeholder-product.jpg') }}" class="card-img-top" alt="{{ $producto->nombre }}">
                            <div class="card-body">
                                <span class="category-badge">{{ $producto->categoria->nombre }}</span>
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text">{{ Str::limit($producto->descripcion, 80) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price">${{ number_format($producto->precio, 2) }}</span>
                                    <div>
                                        <a href="#" class="btn btn-primary btn-sm me-1"><i class="fas fa-shopping-cart"></i></a>
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#productModal{{ $producto->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <!-- Mensaje centrado cuando no hay productos -->
                    <div class="col-12 text-center">
                        <div class="empty-state">
                            <i class="fas fa-boxes fa-3x mb-3"></i>
                            <h4>No hay productos disponibles</h4>
                            <p class="text-muted">Próximamente tendremos nuevos productos para ti.</p>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="text-center mt-4 fade-in-up">
                    <a href="#" class="btn btn-outline-primary">Ver todos los productos</a>
                </div>
            </section>

            <!-- Recent Activity mejorado -->
            <div class="recent-activity fade-in-up">
                <h3 class="mb-4 text-primary">Actividad Reciente</h3>
                
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Nuevo pedido realizado</h6>
                        <p class="mb-0 text-muted">Hace 2 horas - Pedido #EP-2024-0012</p>
                    </div>
                </div>
                
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Cita programada</h6>
                        <p class="mb-0 text-muted">Ayer - Baño y grooming para "Max"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer mejorado -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>BARBERA PET</h5>
                    <p>Tu tienda de confianza para productos y servicios de mascotas. Ofrecemos la mejor calidad y atención personalizada para el cuidado de tus animales.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; {{ date('Y') }} Barbera Pet. Todos los derechos reservados.</p>
                    <p class="mt-2">Diseñado con <i class="fas fa-heart text-danger"></i> para amantes de las mascotas</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modales (sin cambios, manteniendo funcionalidad) -->
    @foreach($categorias->where('visualizacion', 1) as $categoria)
    <div class="modal fade" id="categoryModal{{ $categoria->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $categoria->nombre }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ $categoria->imagen ? $categoria->imagen : asset('img/placeholder-category.jpg') }}" 
                                 alt="{{ $categoria->nombre }}" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <h4>{{ $categoria->nombre }}</h4>
                            <p class="text-muted">{{ $categoria->descripcion }}</p>
                            <div class="mt-3">
                                <span class="badge bg-primary">
                                    <i class="fas fa-box me-1"></i>
                                    {{ $categoria->articulos_count ?? 0 }} productos
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-shopping-bag me-1"></i> Ver Productos
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach($productos as $producto)
    <div class="modal fade" id="productModal{{ $producto->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $producto->nombre }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ $producto->imagen ? $producto->imagen : asset('img/placeholder-product.jpg') }}" 
                                 alt="{{ $producto->nombre }}" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <h4>{{ $producto->nombre }}</h4>
                            <p class="text-muted">{{ $producto->descripcion }}</p>
                            <div class="mb-3">
                                <strong>Categoría:</strong> {{ $producto->categoria->nombre }}
                            </div>
                            <div class="mb-3">
                                <strong>Precio:</strong> 
                                <span class="text-primary">${{ number_format($producto->precio, 2) }}</span>
                            </div>
                            <div class="mb-3">
                                <strong>Disponibilidad:</strong>
                                <span class="stock-badge {{ $producto->existencia > 10 ? 'stock-available' : ($producto->existencia > 0 ? 'stock-low' : 'stock-out') }}">
                                    {{ $producto->existencia > 10 ? 'En stock' : ($producto->existencia > 0 ? 'Stock bajo' : 'Sin stock') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary" onclick="addToCart({{ $producto->id }})">
                        <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect mejorado
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
            
            // Efectos hover para cards
            const cards = document.querySelectorAll('.card, .stat-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });

        // Funciones simples
        function addToCart(productId) {
            console.log('Agregando producto:', productId);
            // Implementar lógica de carrito aquí
        }
    </script>
</body>
</html>