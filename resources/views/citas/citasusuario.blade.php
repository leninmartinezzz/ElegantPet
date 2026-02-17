<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita - Barbera Pet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
        
        .citas-container {
            padding: 40px 0;
        }
        
        .page-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            color: white;
            padding: 40px 0;
            margin-bottom: 40px;
            border-radius: 0 0 20px 20px;
        }

        .service-card {
            background: var(--light);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            padding: 25px;
            margin-bottom: 25px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid transparent;
            cursor: pointer;
            height: 100%;
            border: 1px solid rgba(212, 177, 0, 0.2);
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(212, 177, 0, 0.2);
            border-color: var(--primary-light);
        }
        
        .service-card.selected {
            border-color: var(--primary);
            background: linear-gradient(135deg, var(--light), rgba(212, 177, 0, 0.1));
        }
        
        .service-icon {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: var(--dark);
            margin-bottom: 15px;
        }
        
        .booking-card {
            background: var(--light);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            padding: 30px;
            position: sticky;
            top: 20px;
            border: 1px solid rgba(212, 177, 0, 0.2);
        }
        
        .form-control, .form-select {
            background-color: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.2);
            color: var(--text-light);
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        
        .form-control:focus, .form-select:focus {
            background-color: rgba(255,255,255,0.08);
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(212, 177, 0, 0.25);
            color: var(--text-light);
        }
        
        .form-label {
            color: var(--text-light);
            font-weight: 500;
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--primary-dark), var(--primary));
            border: none;
            border-radius: 8px;
            padding: 12px 25px;
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
            border-color: rgba(255,255,255,0.2);
            color: var(--text-light);
            border-radius: 8px;
            padding: 12px 25px;
        }
        
        .btn-outline-secondary:hover {
            background: rgba(255,255,255,0.1);
            border-color: var(--primary);
            color: var(--primary);
        }
        
        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary);
            border-radius: 8px;
            padding: 12px 25px;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary);
            color: var(--dark);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #28a745, #20c997);
            border: none;
            border-radius: 8px;
            padding: 12px 25px;
            font-weight: 600;
        }
        
        .time-slot {
            display: inline-block;
            padding: 10px 15px;
            margin: 5px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            min-width: 80px;
            color: var(--text-light);
        }
        
        .time-slot:hover {
            background: rgba(212, 177, 0, 0.2);
            border-color: var(--primary);
        }
        
        .time-slot.selected {
            background: var(--primary);
            color: var(--dark);
            border-color: var(--primary-dark);
        }
        
        .time-slot.disabled {
            background: rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.3);
            cursor: not-allowed;
            opacity: 0.5;
        }
        
        .pet-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--dark);
            margin-right: 15px;
        }
        
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }
        
        .step-indicator::before {
            content: "";
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background: rgba(255,255,255,0.2);
            z-index: 1;
        }
        
        .step {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--light);
            border: 2px solid rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            position: relative;
            z-index: 2;
            color: var(--text-light);
        }
        
        .step.active {
            background: var(--primary);
            border-color: var(--primary);
            color: var(--dark);
        }
        
        .step.completed {
            background: var(--primary-light);
            border-color: var(--primary);
            color: var(--primary-dark);
        }
        
        .step-label {
            position: absolute;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 12px;
            color: var(--text-light);
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .footer {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
            padding: 30px 0 15px;
            margin-top: 50px;
        }
        
        .confirmation-badge {
            background: var(--primary-light);
            color: var(--primary-dark);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .availability-indicator {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }
        
        .available {
            background: #28a745;
        }
        
        .limited {
            background: #ffc107;
        }
        
        .unavailable {
            background: #dc3545;
        }

        /* Nuevos estilos para mejorar la visualización */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .service-description {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 48px;
            color: rgba(255,255,255,0.7);
        }

        .service-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary);
        }

        .service-availability {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Estilos para selección de mascotas */
        .pet-selector {
            cursor: pointer;
            transition: all 0.3s;
            border: 2px solid transparent;
            background: var(--light);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .pet-selector:hover {
            border-color: var(--primary-light);
            transform: translateY(-2px);
        }

        .pet-selector.selected {
            border-color: var(--primary);
            background: linear-gradient(135deg, var(--light), rgba(212, 177, 0, 0.1));
        }

        .pet-icon {
            font-size: 1.5rem;
        }

        /* Alertas con tema oscuro */
        .alert {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: var(--text-light);
        }

        .alert-warning {
            background: rgba(255, 193, 7, 0.1);
            border-color: rgba(255, 193, 7, 0.3);
            color: #ffc107;
        }

        .alert-info {
            background: rgba(23, 162, 184, 0.1);
            border-color: rgba(23, 162, 184, 0.3);
            color: #17a2b8;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            border-color: rgba(40, 167, 69, 0.3);
            color: #28a745;
        }

        /* Text colors */
        .text-primary {
            color: var(--primary) !important;
        }

        .text-muted {
            color: rgba(255,255,255,0.6) !important;
        }

        .text-success {
            color: #28a745 !important;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        /* Borders */
        .border {
            border-color: rgba(255,255,255,0.1) !important;
        }

        .border.rounded {
            border-radius: 10px !important;
        }

        /* HR */
        hr {
            border-color: rgba(255,255,255,0.1);
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
                        <a class="nav-link" href="{{ route('agregar.mascota') }}"><i class="fas fa-paw me-1"></i> Mascotas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('citas.consulta') }}"><i class="fas fa-calendar-alt me-1"></i> Citas</a>
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

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold">Agendar Cita</h1>
                    <p class="lead mb-0">Programa los mejores servicios para tu mascota con profesionales certificados</p>
                </div>
                <div class="col-md-4 text-end">
                    <span class="confirmation-badge"><i class="fas fa-clock me-1"></i> Confirmación inmediata</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="citas-container">
        <div class="container">
            <div class="row">
                <!-- Servicios y Formulario -->
                <div class="col-lg-8">
                    <!-- Step Indicator -->
                    <div class="step-indicator">
                        <div class="step active">
                            1
                            <div class="step-label">Servicio</div>
                        </div>
                        <div class="step">
                            2
                            <div class="step-label">Fecha/Hora</div>
                        </div>
                        <div class="step">
                            3
                            <div class="step-label">Mascota</div>
                        </div>
                        <div class="step">
                            4
                            <div class="step-label">Confirmar</div>
                        </div>
                    </div>

                    <!-- Step 1: Selección de Servicio -->
                    <div id="step1" class="tab-content active">
                        <h3 class="mb-4">Selecciona un Servicio</h3>
                        
                        @if($servicios->count() == 0)
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                No hay servicios disponibles en este momento. Por favor, contacta con el administrador.
                            </div>
                        @else
                            <div class="services-grid">
                                @foreach($servicios as $servicio)
                                <div class="service-card" 
                                     data-service="{{ $servicio->id }}" 
                                     data-service-name="{{ $servicio->nombre }}" 
                                     data-service-price="{{ $servicio->precio }}"
                                     data-service-description="{{ $servicio->descripcion }}">
                                    <div class="service-icon">
                                        @switch($servicio->nombre)
                                            @case('Peluquería Canina')
                                                <i class="fas fa-cut"></i>
                                                @break
                                            @case('Consulta Médica')
                                                <i class="fas fa-stethoscope"></i>
                                                @break
                                            @case('Estética Felina')
                                                <i class="fas fa-cat"></i>
                                                @break
                                            @case('Spa y Relajación')
                                                <i class="fas fa-spa"></i>
                                                @break
                                            @case('Odontología Veterinaria')
                                                <i class="fas fa-tooth"></i>
                                                @break
                                            @case('Atención de Urgencias')
                                                <i class="fas fa-ambulance"></i>
                                                @break
                                            @default
                                                <i class="fas fa-paw"></i>
                                        @endswitch
                                    </div>
                                    <h5 class="mb-2">{{ $servicio->nombre }}</h5>
                                    <p class="service-description mb-3">{{ $servicio->descripcion }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="service-price">${{ number_format($servicio->precio, 0, ',', '.') }}</span>
                                        <div class="service-availability">
                                            <span class="availability-indicator {{ $servicio->disponible ? 'available' : 'unavailable' }}"></span>
                                            @if($servicio->disponible)
                                                <small class="text-success">Disponible</small>
                                            @else
                                                <small class="text-danger">No Disponible</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                        
                        <div class="text-end mt-4">
                            <button class="btn btn-primary" onclick="nextStep(2)">Siguiente <i class="fas fa-arrow-right ms-2"></i></button>
                        </div>
                    </div>

                    <!-- Step 2: Selección de Fecha y Hora -->
                    <div id="step2" class="tab-content">
                        <h3 class="mb-4">Selecciona Fecha y Hora</h3>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="appointmentDate" class="form-label">Fecha de la cita</label>
                                    <input type="text" class="form-control" id="appointmentDate" placeholder="Selecciona una fecha">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Horarios Disponibles</label>
                                    <div id="timeSlots">
                                        <!-- Los horarios se cargarán dinámicamente -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <button class="btn btn-outline-secondary" onclick="prevStep(1)"><i class="fas fa-arrow-left me-2"></i> Anterior</button>
                            <button class="btn btn-primary" onclick="nextStep(3)">Siguiente <i class="fas fa-arrow-right ms-2"></i></button>
                        </div>
                    </div>

                    <!-- Step 3: Información de la Mascota -->
                    <div id="step3" class="tab-content">
                        <h3 class="mb-4">Información de la Mascota</h3>
                        
                        <div class="mb-4">
                            <label class="form-label">Selecciona una mascota</label>
                            @if($mascotas->count() > 0)
                                @foreach($mascotas as $mascota)
                                <div class="pet-selector" 
                                     data-pet-id="{{ $mascota->id }}" 
                                     data-pet-name="{{ $mascota->nombre }}"
                                     data-pet-breed="{{ $mascota->raza }}"
                                     data-pet-age="{{ $mascota->edad }}"
                                     data-pet-gender="{{ $mascota->sexo }}">
                                    <div class="d-flex align-items-center">
                                        <div class="pet-avatar">
                                            <i class="fas fa-{{ strtolower($mascota->especie) == 'gato' ? 'cat' : 'dog' }} pet-icon"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">{{ $mascota->nombre }}</h6>
                                            <p class="mb-1">{{ $mascota->raza }} • {{ $mascota->edad }} años • {{ $mascota->sexo }}</p>
                                            <small class="text-muted">Agregado el {{ $mascota->created_at->format('d/m/Y') }}</small>
                                        </div>
                                        <div class="pet-selection-indicator ms-3">
                                            <i class="fas fa-check-circle text-success" style="display: none;"></i>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else   
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    No tienes mascotas registradas. Por favor, agrega una mascota para continuar.
                                </div>
                            @endif

                            <a href="{{ route('agregar.mascota') }}" class="btn btn-outline-primary w-100 mt-3">
                                <i class="fas fa-plus me-2"></i> Agregar Nueva Mascota
                            </a>
                        </div>
                        
                        <div class="mb-3">
                            <label for="specialNotes" class="form-label">Notas Especiales</label>
                            <textarea class="form-control" id="specialNotes" rows="3" placeholder="Información adicional que debamos conocer sobre tu mascota..."></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <button class="btn btn-outline-secondary" onclick="prevStep(2)"><i class="fas fa-arrow-left me-2"></i> Anterior</button>
                            <button class="btn btn-primary" onclick="nextStep(4)">Siguiente <i class="fas fa-arrow-right ms-2"></i></button>
                        </div>
                    </div>

                    <!-- Step 4: Confirmación -->
                    <div id="step4" class="tab-content">
                        <h3 class="mb-4">Confirma tu Cita</h3>
                        
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            <strong>¡Todo listo!</strong> Revisa los detalles de tu cita antes de confirmar.
                        </div>
                        
                        <div class="border rounded p-4 mb-4">
                            <h5>Resumen de la Cita</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Servicio:</strong> <span id="confirmService">-</span></p>
                                    <p><strong>Fecha:</strong> <span id="confirmDate">-</span></p>
                                    <p><strong>Hora:</strong> <span id="confirmTime">-</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Mascota:</strong> <span id="confirmPet">-</span></p>
                                    <p><strong>Raza:</strong> <span id="confirmBreed">-</span></p>
                                    <p><strong>Edad:</strong> <span id="confirmAge">-</span></p>
                                    <p><strong>Precio:</strong> <span id="confirmPrice" class="h5 text-primary">-</span></p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p><strong>Notas Especiales:</strong> <span id="confirmNotes">-</span></p>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <button class="btn btn-outline-secondary" onclick="prevStep(3)"><i class="fas fa-arrow-left me-2"></i> Anterior</button>
                            <button class="btn btn-success" onclick="confirmAppointment()"><i class="fas fa-calendar-check me-2"></i> Confirmar Cita</button>
                        </div>
                    </div>
                </div>

                <!-- Resumen de la Cita -->
                <div class="col-lg-4">
                    <div class="booking-card">
                        <h4 class="mb-4">Resumen de tu Cita</h4>
                        
                        <div id="bookingSummary">
                            <div class="text-center py-5">
                                <i class="fas fa-calendar-plus text-muted" style="font-size: 3rem;"></i>
                                <p class="text-muted mt-3">Selecciona un servicio para ver el resumen</p>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    
    <script>
        // Variables globales
        let selectedService = null;
        let selectedServiceName = null;
        let selectedServicePrice = null;
        let selectedServiceDescription = null;
        let selectedDate = null;
        let selectedTime = null;
        let selectedPet = null;
        let selectedPetName = null;
        let selectedPetBreed = null;
        let selectedPetAge = null;
        let selectedPetGender = null;

        // Inicializar datepicker - CORREGIDO
        const datePicker = flatpickr("#appointmentDate", {
            locale: "es",
            minDate: "today",
            dateFormat: "d/m/Y",
            disable: [
                function(date) {
                    // Deshabilitar domingos
                    return date.getDay() === 0;
                }
            ],
            onChange: function(selectedDates, dateStr, instance) {
                // Capturar la fecha seleccionada
                selectedDate = dateStr;
                updateBookingSummary();
                console.log('Fecha seleccionada:', selectedDate);
            }
        });

        // Selección de servicio
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('click', function() {
                if (!this.classList.contains('selected')) {
                    document.querySelectorAll('.service-card').forEach(c => c.classList.remove('selected'));
                    this.classList.add('selected');
                    selectedService = this.getAttribute('data-service');
                    selectedServiceName = this.getAttribute('data-service-name');
                    selectedServicePrice = this.getAttribute('data-service-price');
                    selectedServiceDescription = this.getAttribute('data-service-description');
                    
                    // Actualizar resumen
                    updateBookingSummary();
                }
            });
        });

        // Selección de mascota
        document.querySelectorAll('.pet-selector').forEach(pet => {
            pet.addEventListener('click', function() {
                // Remover selección anterior
                document.querySelectorAll('.pet-selector').forEach(p => {
                    p.classList.remove('selected');
                    p.querySelector('.fa-check-circle').style.display = 'none';
                });
                
                // Agregar selección actual
                this.classList.add('selected');
                this.querySelector('.fa-check-circle').style.display = 'block';
                
                // Guardar datos de la mascota seleccionada
                selectedPet = this.getAttribute('data-pet-id');
                selectedPetName = this.getAttribute('data-pet-name');
                selectedPetBreed = this.getAttribute('data-pet-breed');
                selectedPetAge = this.getAttribute('data-pet-age');
                selectedPetGender = this.getAttribute('data-pet-gender');
                
                // Actualizar resumen
                updateBookingSummary();
            });
        });

        // Navegación entre pasos - CORREGIDO
        function nextStep(step) {
            // Validar antes de avanzar
            if (step === 2 && !selectedService) {
                alert('Por favor, selecciona un servicio antes de continuar.');
                return;
            }
            
            if (step === 3 && (!selectedDate || !selectedTime)) {
                alert('Por favor, selecciona una fecha y hora antes de continuar.');
                return;
            }
            
            if (step === 4 && !selectedPet) {
                alert('Por favor, selecciona una mascota antes de continuar.');
                return;
            }
            
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            document.getElementById('step' + step).classList.add('active');
            
            document.querySelectorAll('.step').forEach((s, index) => {
                s.classList.remove('active');
                if (index + 1 < step) s.classList.add('completed');
                if (index + 1 === step) s.classList.add('active');
            });
            
            if (step === 2) {
                loadTimeSlots();
            }
        }

        function prevStep(step) {
            nextStep(step);
        }

        // Cargar horarios disponibles
        function loadTimeSlots() {
            const timeSlotsContainer = document.getElementById('timeSlots');
            const times = ['08:00', '09:00', '10:00', '11:00', '14:00', '15:00', '16:00', '17:00'];
            
            timeSlotsContainer.innerHTML = '';
            times.forEach(time => {
                const slot = document.createElement('div');
                slot.className = 'time-slot';
                slot.textContent = time;
                slot.addEventListener('click', function() {
                    document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                    this.classList.add('selected');
                    selectedTime = this.textContent;
                    updateBookingSummary();
                });
                timeSlotsContainer.appendChild(slot);
            });
        }

        // Actualizar resumen de la cita
        function updateBookingSummary() {
            const summary = document.getElementById('bookingSummary');
            
            if (!selectedService) {
                summary.innerHTML = `
                    <div class="text-center py-5">
                        <i class="fas fa-calendar-plus text-muted" style="font-size: 3rem;"></i>
                        <p class="text-muted mt-3">Selecciona un servicio para ver el resumen</p>
                    </div>
                `;
                return;
            }

            summary.innerHTML = `
                <div class="mb-3">
                    <h6>Servicio Seleccionado</h6>
                    <p class="mb-1"><strong>${selectedServiceName}</strong></p>
                    <p class="text-muted mb-2 small">${selectedServiceDescription}</p>
                    <h5 class="text-primary">$${parseInt(selectedServicePrice).toLocaleString('es')}</h5>
                </div>
                ${selectedDate ? `<p><strong>Fecha:</strong> ${selectedDate}</p>` : '<p><strong>Fecha:</strong> <span class="text-muted">No seleccionada</span></p>'}
                ${selectedTime ? `<p><strong>Hora:</strong> ${selectedTime}</p>` : '<p><strong>Hora:</strong> <span class="text-muted">No seleccionada</span></p>'}
                ${selectedPet ? `<p><strong>Mascota:</strong> ${selectedPetName}</p>` : '<p><strong>Mascota:</strong> <span class="text-muted">No seleccionada</span></p>'}
                <hr>
                <div class="text-center">
                    <small class="text-muted">Precio incluye IVA. No incluye productos adicionales.</small>
                </div>
            `;

            // Actualizar confirmación
            document.getElementById('confirmService').textContent = selectedServiceName;
            document.getElementById('confirmPrice').textContent = `$${parseInt(selectedServicePrice).toLocaleString('es')}`;
            document.getElementById('confirmDate').textContent = selectedDate || '-';
            document.getElementById('confirmTime').textContent = selectedTime || '-';
            document.getElementById('confirmPet').textContent = selectedPetName || '-';
            document.getElementById('confirmBreed').textContent = selectedPetBreed || '-';
            document.getElementById('confirmAge').textContent = selectedPetAge ? selectedPetAge + ' años' : '-';
            document.getElementById('confirmNotes').textContent = document.getElementById('specialNotes').value || 'Ninguna';
        }

        // Confirmar cita
        function confirmAppointment() {
            if (!selectedService || !selectedDate || !selectedTime || !selectedPet) {
                alert('Por favor, completa todos los campos antes de confirmar la cita.');
                return;
            }

            // Mostrar loading
            const confirmBtn = document.querySelector('#step4 .btn-success');
            const originalText = confirmBtn.innerHTML;
            confirmBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Procesando...';
            confirmBtn.disabled = true;

            // Preparar datos para enviar
            const formData = new FormData();
            formData.append('servicio_id', selectedService);
            formData.append('mascota_id', selectedPet);
            formData.append('fecha', selectedDate);
            formData.append('hora', selectedTime);
            formData.append('nota_mascota', document.getElementById('specialNotes').value);
            formData.append('_token', '{{ csrf_token() }}');

            // Enviar datos al servidor
            fetch('{{ route("citas.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    // Redirigir al dashboard
                    window.location.href = "{{ url('/dashboard') }}";
                } else {
                    // Mostrar mensaje de error específico
                    let errorMessage = 'Error al agendar la cita.';
                    if (data.message) {
                        errorMessage = data.message;
                    } else if (data.errors) {
                        // Si hay errores de validación específicos
                        errorMessage = Object.values(data.errors).flat().join(', ');
                    }
                    alert(errorMessage);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error de conexión. Por favor, intenta nuevamente.');
            })
            .finally(() => {
                confirmBtn.innerHTML = originalText;
                confirmBtn.disabled = false;
            });
        }

        // Inicializar
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Sistema de citas cargado');
        });
    </script>
</body>
</html>