<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Servicio - BARBERA PET</title>
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
            min-height: 100vh;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        .navbar-logo {
            height: 45px;
            width: auto;
            margin-right: 10px;
            object-fit: contain;
            filter: brightness(0) invert(1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 1.8rem;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            transition: color 0.3s;
            font-weight: 500;
        }
        
        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            border-radius: 8px;
            background: var(--light);
            border: 1px solid rgba(212, 177, 0, 0.2);
        }
        
        .dropdown-item {
            padding: 8px 15px;
            transition: all 0.3s;
            color: var(--text-light);
        }
        
        .dropdown-item:hover {
            background-color: var(--primary);
            color: var(--dark);
        }
        
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 8px;
        }
        
        .dashboard-container {
            padding: 40px 0;
        }
        
        .form-container {
            background: var(--light);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(212, 177, 0, 0.2);
        }
        
        .form-header {
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .form-title {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .form-subtitle {
            color: var(--text-light);
            font-size: 1rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-light);
            margin-bottom: 8px;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s;
            background-color: rgba(255,255,255,0.05);
            color: var(--text-light);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(212, 177, 0, 0.25);
            background-color: rgba(255,255,255,0.08);
            color: var(--text-light);
        }
        
        .form-control::placeholder {
            color: rgba(255,255,255,0.5);
        }
        
        .form-text {
            color: rgba(255,255,255,0.6);
            font-size: 0.875rem;
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--primary-dark), var(--primary));
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            color: white;
            box-shadow: 0 4px 15px rgba(212, 177, 0, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 177, 0, 0.4);
        }
        
        .btn-outline-secondary {
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 600;
            border-color: rgba(255,255,255,0.3);
            color: var(--text-light);
        }
        
        .btn-outline-secondary:hover {
            background-color: rgba(255,255,255,0.1);
            border-color: var(--primary);
            color: var(--primary);
        }
        
        .form-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .section-title {
            color: var(--primary);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
        }
        
        .footer {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
            padding: 30px 0 15px;
            margin-top: 50px;
        }
        
        /* Estilos para la notificación de éxito */
        .success-toast {
            position: fixed;
            top: 100px;
            right: 30px;
            z-index: 1055;
            min-width: 350px;
            background: var(--light);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border-left: 5px solid #28a745;
            border: 1px solid rgba(212, 177, 0, 0.2);
            transform: translateX(400px);
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        
        .success-toast.show {
            transform: translateX(0);
            opacity: 1;
        }
        
        .toast-header {
            background: transparent;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding: 15px 20px 10px;
        }
        
        .toast-body {
            padding: 15px 20px 20px;
        }
        
        .success-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #28a745, #20c997);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin-right: 15px;
        }
        
        .toast-content h5 {
            color: #28a745;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .toast-content p {
            color: var(--text-light);
            margin-bottom: 0;
        }
        
        .btn-close {
            align-self: flex-start;
            margin-top: 5px;
            filter: invert(1);
        }
        
        .progress-bar {
            height: 4px;
            background: linear-gradient(to right, #28a745, #20c997);
            width: 100%;
            border-radius: 2px;
            animation: progress 5s linear forwards;
        }
        
        @keyframes progress {
            from { width: 100%; }
            to { width: 0%; }
        }
    </style>
</head>
<body>
   <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
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
                        <a class="nav-link" href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt me-1"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart me-1"></i> Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-paw me-1"></i> Mascotas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('citas.usuario') }}"><i class="fas fa-calendar-alt me-1"></i> Citas</a>
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
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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


    <!-- Notificación de éxito (se mostrará cuando se agregue un servicio) -->
    @if(session('success'))
    <div class="success-toast show" id="successToast">
        <div class="toast-header">
            <div class="d-flex align-items-center w-100">
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <div class="toast-content flex-grow-1">
                    <h5>¡Éxito!</h5>
                    <p>{{ session('success') }}</p>
                </div>
                <button type="button" class="btn-close" id="closeToast"></button>
            </div>
        </div>
        <div class="progress-bar"></div>
    </div>
    @endif

    <!-- Form Content -->
    <div class="dashboard-container">
        <div class="container">
            <div class="form-container">
                <!-- Form Header -->
                <div class="form-header">
                    <h2 class="form-title">Agregar Nuevo Servicio</h2>
                    <p class="form-subtitle">Complete la información del servicio que desea agregar a la base de datos.</p>
                </div>

                <!-- Service Form -->
                <form id="serviceForm" method="POST" action="{{ route('servicios.store') }}">
                    @csrf
                    
                    <!-- Basic Information Section -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-info-circle"></i> Información Básica</h3>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Nombre del Servicio</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                <div class="form-text">Ingrese un nombre descriptivo para el servicio.</div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="precio" class="form-label">Precio ($)</label>
                                <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" required>
                                <div class="form-text">Ingrese el precio del servicio en dólares.</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
                            <div class="form-text">Describa detalladamente el servicio que ofrece.</div>
                        </div>
                    </div>
                    
                    <!-- Capacity Section -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-users"></i> Capacidad y Disponibilidad</h3>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cantidad_cupo" class="form-label">Cupos Disponibles</label>
                                <input type="number" class="form-control" id="cantidad_cupo" name="cantidad_cupo" min="0" required>
                                <div class="form-text">Número actual de cupos disponibles para este servicio.</div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="cantidad_cupo_maxima" class="form-label">Cupos Máximos</label>
                                <input type="number" class="form-control" id="cantidad_cupo_maxima" name="cantidad_cupo_maxima" min="0" required>
                                <div class="form-text">Número máximo de cupos que puede ofrecer para este servicio.</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="d-flex justify-content-end gap-3 mt-4">
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Agregar Servicio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>BARBERA PET</h5>
                    <p>Tu tienda de confianza para productos y servicios de mascotas.</p>
                </div>
                <div class="col-md-6 text-end">
                    <p>&copy; {{ date('Y') }} BARBERA PET. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const serviceForm = document.getElementById('serviceForm');
            const successToast = document.getElementById('successToast');
            const closeToast = document.getElementById('closeToast');
            
            // Cerrar notificación manualmente
            if (closeToast) {
                closeToast.addEventListener('click', function() {
                    successToast.classList.remove('show');
                    setTimeout(() => {
                        if (successToast.parentNode) {
                            successToast.parentNode.removeChild(successToast);
                        }
                    }, 500);
                });
            }
            
            // Ocultar notificación automáticamente después de 5 segundos
            if (successToast) {
                setTimeout(() => {
                    successToast.classList.remove('show');
                    setTimeout(() => {
                        if (successToast.parentNode) {
                            successToast.parentNode.removeChild(successToast);
                        }
                    }, 500);
                }, 5000);
            }
            
            // Validación del formulario antes de enviar
            serviceForm.addEventListener('submit', function(e) {
                const nombre = document.getElementById('nombre').value;
                const precio = document.getElementById('precio').value;
                const descripcion = document.getElementById('descripcion').value;
                const cantidadCupo = document.getElementById('cantidad_cupo').value;
                const cantidadCupoMaxima = document.getElementById('cantidad_cupo_maxima').value;
                
                if (!nombre || !precio || !descripcion || !cantidadCupo || !cantidadCupoMaxima) {
                    e.preventDefault();
                    alert('Por favor, complete todos los campos obligatorios.');
                    return;
                }
                
                if (parseInt(cantidadCupo) > parseInt(cantidadCupoMaxima)) {
                    e.preventDefault();
                    alert('Los cupos disponibles no pueden ser mayores que los cupos máximos.');
                    return;
                }
            });
        });
    </script>
</body>
</html>