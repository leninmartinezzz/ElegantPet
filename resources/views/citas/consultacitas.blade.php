<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Citas - BARBERA PET</title>
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
        
        .page-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            color: white;
            padding: 40px 0;
            margin-bottom: 40px;
            border-radius: 0 0 20px 20px;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            margin-bottom: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            background: var(--light);
            border: 1px solid rgba(212, 177, 0, 0.2);
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 177, 0, 0.2);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            color: var(--dark);
            border-radius: 15px 15px 0 0 !important;
            border: none;
            font-weight: 600;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .status-pendiente {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }
        
        .status-confirmada {
            background-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }
        
        .status-completada {
            background-color: rgba(23, 162, 184, 0.2);
            color: #17a2b8;
            border: 1px solid rgba(23, 162, 184, 0.3);
        }
        
        .status-cancelada {
            background-color: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }
        
        .filter-section {
            background: var(--light);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            margin-bottom: 25px;
            border: 1px solid rgba(212, 177, 0, 0.2);
        }
        
        .form-control, .form-select {
            background-color: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.2);
            color: var(--text-light);
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
            padding: 10px 20px;
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
        
        .btn-light {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: var(--text-light);
        }
        
        .btn-light:hover {
            background: rgba(255,255,255,0.2);
            border-color: var(--primary);
            color: var(--primary);
        }
        
        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary);
            border-radius: 8px;
            padding: 8px 16px;
            transition: all 0.3s;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary);
            border-color: var(--primary);
            transform: translateY(-2px);
            color: var(--dark);
        }
        
        .btn-outline-success {
            border-color: #28a745;
            color: #28a745;
        }
        
        .btn-outline-success:hover {
            background: #28a745;
            color: white;
        }
        
        .btn-outline-warning {
            border-color: #ffc107;
            color: #ffc107;
        }
        
        .btn-outline-warning:hover {
            background: #ffc107;
            color: var(--dark);
        }
        
        .btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
        }
        
        .btn-outline-danger:hover {
            background: #dc3545;
            color: white;
        }
        
        /* TABLA CON FONDO NEGRO Y LETRAS BLANCAS */
        .table {
            color: #FFFFFF !important; /* Letras blancas para todos los registros */
            background-color: #000000 !important;
        }
        
        .table th {
            border-top: none;
            font-weight: 600;
            color: var(--primary);
            background-color: rgba(212, 177, 0, 0.1);
            border-bottom: 1px solid rgba(212, 177, 0, 0.2);
        }
        
        .table td {
            border-color: rgba(255,255,255,0.1);
            vertical-align: middle;
            background-color: #000000 !important;
            color: #FFFFFF !important; /* Letras blancas en las celdas */
        }
        
        .table tbody tr {
            background-color: #000000 !important;
            color: #FFFFFF !important; /* Letras blancas en las filas */
        }
        
        .table tbody tr:hover {
            background-color: #0a0a0a !important;
            color: #FFFFFF !important; /* Letras blancas al hacer hover */
        }
        
        /* Asegurar que el texto dentro de la tabla sea blanco */
        .table .fw-bold,
        .table .text-muted,
        .table .text-primary,
        .table strong {
            color: #FFFFFF !important;
        }
        
        .table .text-muted {
            color: rgba(255,255,255,0.8) !important; /* Texto secundario en blanco semi-transparente */
        }
        
        .action-buttons .btn {
            margin: 2px;
            padding: 6px 12px;
            font-size: 0.85rem;
        }
        
        .pet-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: var(--dark);
        }
        
        .service-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: var(--dark);
        }
        
        .footer {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
            padding: 30px 0 15px;
            margin-top: 50px;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: rgba(255,255,255,0.6);
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: rgba(255,255,255,0.3);
        }
        
        .pagination .page-link {
            color: var(--primary);
            border-color: rgba(255,255,255,0.2);
            background-color: var(--light);
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
            color: var(--dark);
        }
        
        .pagination .page-link:hover {
            background-color: rgba(212, 177, 0, 0.1);
            border-color: var(--primary);
        }
        
        .text-primary {
            color: var(--primary) !important;
        }
        
        .text-muted {
            color: rgba(255,255,255,0.6) !important;
        }
        
        .bg-primary {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%) !important;
        }
        
        .bg-success {
            background: linear-gradient(135deg, #28a745, #20c997) !important;
        }
        
        .bg-warning {
            background: linear-gradient(135deg, #ffc107, #fd7e14) !important;
        }
        
        .bg-info {
            background: linear-gradient(135deg, #17a2b8, #6f42c1) !important;
        }
        
        .text-white {
            color: var(--text-dark) !important;
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


    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold">Gestión de Citas</h1>
                    <p class="lead mb-0">Consulta y gestiona todas las citas programadas</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('citas.usuario') }}" class="btn btn-light">
                        <i class="fas fa-plus me-2"></i> Nueva Cita
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Filtros -->
        <div class="filter-section">
            <div class="row">
                <div class="col-md-3">
                    <label for="fechaFilter" class="form-label">Filtrar por Fecha</label>
                    <input type="text" class="form-control" id="fechaFilter" placeholder="Seleccionar fecha">
                </div>
                <div class="col-md-3">
                    <label for="estadoFilter" class="form-label">Filtrar por Estado</label>
                    <select class="form-select" id="estadoFilter">
                        <option value="">Todos los estados</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="confirmada">Confirmada</option>
                        <option value="completada">Completada</option>
                        <option value="cancelada">Cancelada</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="servicioFilter" class="form-label">Filtrar por Servicio</label>
                    <select class="form-select" id="servicioFilter">
                        <option value="">Todos los servicios</option>
                        @foreach($servicios as $servicio)
                            <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-grid">
                        <button class="btn btn-primary" onclick="aplicarFiltros()">
                            <i class="fas fa-filter me-2"></i> Aplicar Filtros
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>{{ $totalCitas }}</h4>
                                <p class="mb-0">Total Citas</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-calendar-alt fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>{{ $citasHoy }}</h4>
                                <p class="mb-0">Citas Hoy</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-calendar-day fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>{{ $citasPendientes }}</h4>
                                <p class="mb-0">Pendientes</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>{{ $citasProximaSemana }}</h4>
                                <p class="mb-0">Próxima Semana</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-calendar-week fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de Citas -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-list me-2"></i> Lista de Citas</h5>
                <div>
                    <button class="btn btn-sm btn-light" onclick="exportarCitas()">
                        <i class="fas fa-download me-1"></i> Exportar
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if($citas->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Mascota</th>
                                    <th>Servicio</th>
                                    <th>Fecha y Hora</th>
                                    <th>Estado</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($citas as $cita)
                                <tr>
                                    <td><strong>#{{ $cita->id }}</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-2" style="width: 35px; height: 35px; font-size: 14px;">
                                                {{ strtoupper(substr($cita->cliente->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $cita->cliente->name }}</div>
                                                <small class="text-muted">{{ $cita->cliente->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="pet-avatar me-2">
                                                <i class="fas fa-{{ strtolower($cita->mascota->especie) == 'gato' ? 'cat' : 'dog' }}"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $cita->mascota->nombre }}</div>
                                                <small class="text-muted">{{ $cita->mascota->raza }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="service-icon me-2">
                                                @switch($cita->servicio->nombre)
                                                    @case('Peluquería Canina')
                                                        <i class="fas fa-cut"></i>
                                                        @break
                                                    @case('Consulta Médica')
                                                        <i class="fas fa-stethoscope"></i>
                                                        @break
                                                    @case('Estética Felina')
                                                        <i class="fas fa-cat"></i>
                                                        @break
                                                    @default
                                                        <i class="fas fa-paw"></i>
                                                @endswitch
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $cita->servicio->nombre }}</div>
                                                <small class="text-muted">${{ number_format($cita->servicio->precio, 0, ',', '.') }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-bold">{{ $cita->fecha_hora->format('d/m/Y') }}</div>
                                        <small class="text-muted">{{ $cita->fecha_hora->format('h:i A') }}</small>
                                    </td>
                                    <td>
                                        @php
                                            $estadoClass = 'status-pendiente';
                                            $estadoTexto = 'Pendiente';
                                            // Aquí puedes personalizar según tu lógica de estados
                                        @endphp
                                        <span class="status-badge {{ $estadoClass }}">{{ $estadoTexto }}</span>
                                    </td>
                                    <td>
                                        <strong class="text-primary">${{ number_format($cita->servicio->precio, 0, ',', '.') }}</strong>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-sm btn-outline-primary" onclick="verDetalle({{ $cita->id }})" title="Ver detalle">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="confirmarCita({{ $cita->id }})" title="Confirmar cita">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning" onclick="editarCita({{ $cita->id }})" title="Editar cita">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="cancelarCita({{ $cita->id }})" title="Cancelar cita">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Mostrando {{ $citas->firstItem() }} - {{ $citas->lastItem() }} de {{ $citas->total() }} citas
                        </div>
                        {{ $citas->links() }}
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-calendar-times"></i>
                        <h4>No hay citas registradas</h4>
                        <p class="text-muted">No se encontraron citas con los criterios de búsqueda actuales.</p>
                        <a href="{{ route('citas.usuario') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Agendar Primera Cita
                        </a>
                    </div>
                @endif
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
        // Inicializar datepicker para filtros
        flatpickr("#fechaFilter", {
            locale: "es",
            dateFormat: "d/m/Y",
            allowInput: true
        });

        function aplicarFiltros() {
            const fecha = document.getElementById('fechaFilter').value;
            const estado = document.getElementById('estadoFilter').value;
            const servicio = document.getElementById('servicioFilter').value;
            
            // Aquí iría la lógica para aplicar filtros
            console.log('Aplicando filtros:', { fecha, estado, servicio });
            alert('Funcionalidad de filtros en desarrollo');
        }

        function exportarCitas() {
            alert('Funcionalidad de exportación en desarrollo');
        }

        function verDetalle(citaId) {
            alert('Ver detalle de cita #' + citaId);
            // Aquí podrías abrir un modal con los detalles completos
        }

        function confirmarCita(citaId) {
            if (confirm('¿Estás seguro de que deseas confirmar esta cita?')) {
                alert('Cita #' + citaId + ' confirmada exitosamente');
                // Aquí iría la llamada AJAX para confirmar la cita
            }
        }

        function editarCita(citaId) {
            alert('Editar cita #' + citaId);
            // Aquí podrías redirigir a un formulario de edición
        }

        function cancelarCita(citaId) {
            if (confirm('¿Estás seguro de que deseas cancelar esta cita?')) {
                alert('Cita #' + citaId + ' cancelada exitosamente');
                // Aquí iría la llamada AJAX para cancelar la cita
            }
        }

        // Búsqueda en tiempo real
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const rows = document.querySelectorAll('tbody tr');
                    
                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }
        });
    </script>
</body>
</html>