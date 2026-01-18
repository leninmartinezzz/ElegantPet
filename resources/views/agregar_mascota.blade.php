<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Mascota - BARBERA PET</title>
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
        
        /* Estilos específicos para mascotas */
        .pet-icon {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .pet-icon-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            font-size: 2.5rem;
            margin: 0 auto 15px;
            border: 5px solid var(--light);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        .age-input-group {
            max-width: 200px;
        }
        
        .input-group-text {
            background-color: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.2);
            color: var(--text-light);
        }
        
        .owner-badge {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            color: var(--dark);
            padding: 8px 15px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .owner-badge i {
            margin-right: 8px;
            color: var(--dark);
        }
        
        .text-primary {
            color: var(--primary) !important;
        }
        
        .text-info {
            color: #17a2b8 !important;
        }
        
        .text-success {
            color: #28a745 !important;
        }
        
        .text-warning {
            color: #ffc107 !important;
        }
        
        .text-muted {
            color: rgba(255,255,255,0.6) !important;
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


    <!-- Notificación de éxito (se mostrará cuando se agregue una mascota) -->
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
                    <h2 class="form-title">Agregar Nueva Mascota</h2>
                    <p class="form-subtitle">Complete la información de la mascota que desea registrar en el sistema.</p>
                    
                    <!-- Badge indicando que tú eres el propietario -->
                    <div class="owner-badge">
                        <i class="fas fa-user-check"></i>
                        Propietario: {{ Auth::user()->name }}
                    </div>
                </div>

                <!-- Pet Form -->
                <form id="petForm" method="POST" action="{{ route('mascotas.store') }}">
                    @csrf
                    
                    <!-- Icono de mascota -->
                    <div class="pet-icon">
                        <div class="pet-icon-circle">
                            <i class="fas fa-paw"></i>
                        </div>
                        <p class="text-muted">Nueva mascota</p>
                    </div>
                    
                    <!-- Basic Information Section -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-info-circle"></i> Información Básica</h3>
                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nombre" class="form-label">Nombre de la Mascota</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Max, Luna, Rocky..." required>
                                <div class="form-text">Ingrese el nombre de su mascota.</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Species and Breed Section -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-dna"></i> Especie y Raza</h3>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="especie" class="form-label">Especie</label>
                                <select class="form-select" id="especie" name="especie" required>
                                    <option value="" selected disabled>Seleccione una especie</option>
                                    <option value="perro">Perro</option>
                                    <option value="gato">Gato</option>
                                    <option value="ave">Ave</option>
                                    <option value="roedor">Roedor</option>
                                    <option value="reptil">Reptil</option>
                                    <option value="otro">Otro</option>
                                </select>
                                <div class="form-text">Seleccione la especie de la mascota.</div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="raza" class="form-label">Raza</label>
                                <input type="text" class="form-control" id="raza" name="raza" placeholder="Ej: Labrador, Siamés, Canario..." required>
                                <div class="form-text">Ingrese la raza de la mascota.</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Age Section -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-birthday-cake"></i> Edad</h3>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edad" class="form-label">Edad</label>
                                <div class="input-group age-input-group">
                                    <input type="number" class="form-control" id="edad" name="edad" min="0" max="30" placeholder="0" required>
                                    <span class="input-group-text">años</span>
                                </div>
                                <div class="form-text">Ingrese la edad aproximada de la mascota en años.</div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Etapa de Vida</label>
                                <div class="form-control" style="border: none; background: transparent; padding-left: 0;">
                                    <div class="form-text fw-bold text-primary" id="lifeStage">Seleccione la edad para ver la etapa</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <!-- Form Actions -->
                    <div class="d-flex justify-content-end gap-3 mt-4">
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Registrar Mascota</button>
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
            const petForm = document.getElementById('petForm');
            const successToast = document.getElementById('successToast');
            const closeToast = document.getElementById('closeToast');
            const edadInput = document.getElementById('edad');
            const lifeStageText = document.getElementById('lifeStage');
            
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
            
            // Determinar etapa de vida según la edad
            function updateLifeStage() {
                const edad = parseInt(edadInput.value) || 0;
                let stage = '';
                let color = 'text-primary';
                
                if (edad === 0) {
                    stage = '🐣 Cachorro/Bebé';
                    color = 'text-info';
                } else if (edad >= 1 && edad <= 2) {
                    stage = '🐕 Joven';
                    color = 'text-success';
                } else if (edad >= 3 && edad <= 7) {
                    stage = '🐶 Adulto';
                    color = 'text-primary';
                } else if (edad >= 8) {
                    stage = '🐾 Senior';
                    color = 'text-warning';
                }
                
                lifeStageText.textContent = stage || 'Seleccione la edad para ver la etapa';
                lifeStageText.className = `form-text fw-bold ${color}`;
            }
            
            edadInput.addEventListener('input', updateLifeStage);
            
            // Validación del formulario antes de enviar
            petForm.addEventListener('submit', function(e) {
                const nombre = document.getElementById('nombre').value;
                const especie = document.getElementById('especie').value;
                const raza = document.getElementById('raza').value;
                const edad = document.getElementById('edad').value;
                
                if (!nombre || !especie || !raza || !edad) {
                    e.preventDefault();
                    alert('Por favor, complete todos los campos obligatorios.');
                    return;
                }
                
                if (parseInt(edad) < 0 || parseInt(edad) > 30) {
                    e.preventDefault();
                    alert('Por favor, ingrese una edad válida (0-30 años).');
                    return;
                }
            });
            
            // Cargar sugerencias de raza según especie
            const especieSelect = document.getElementById('especie');
            const razaInput = document.getElementById('raza');
            
            especieSelect.addEventListener('change', function() {
                const razasPorEspecie = {
                    'perro': ['Labrador', 'Pastor Alemán', 'Bulldog', 'Chihuahua', 'Golden Retriever', 'Poodle', 'Beagle'],
                    'gato': ['Siamés', 'Persa', 'Maine Coon', 'Bengalí', 'Esfinge', 'Angora', 'Británico'],
                    'ave': ['Canario', 'Periquito', 'Loro', 'Cacatúa', 'Agapornis', 'Diamante'],
                    'roedor': ['Hámster', 'Cobaya', 'Ratón', 'Conejo', 'Chinchilla', 'Jerbo'],
                    'reptil': ['Iguana', 'Gecko', 'Tortuga', 'Serpiente', 'Camaleón', 'Dragón Barbudo']
                };
                
                const especie = this.value;
                if (razasPorEspecie[especie]) {
                    razaInput.placeholder = `Ej: ${razasPorEspecie[especie][0]}`;
                } else {
                    razaInput.placeholder = 'Ingrese la raza';
                }
            });
        });
    </script>
</body>
</html>