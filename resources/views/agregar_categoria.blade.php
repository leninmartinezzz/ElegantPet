<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías - Barbera Pet</title>
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
        
        .form-control, .form-textarea {
            background-color: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.2);
            color: var(--text-light);
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s;
        }
        
        .form-control:focus, .form-textarea:focus {
            background-color: rgba(255,255,255,0.08);
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(212, 177, 0, 0.25);
            color: var(--text-light);
        }
        
        .form-label {
            color: var(--text-light);
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .form-text {
            color: rgba(255,255,255,0.6);
            font-size: 0.875rem;
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
        
        .footer {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
            padding: 30px 0 15px;
            margin-top: 50px;
        }
        
        .category-icon {
            width: 80px;
            height: 80px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: var(--dark);
            margin: 0 auto 20px;
        }
        
        .preview-card {
            background: var(--light);
            border-radius: 15px;
            padding: 25px;
            border: 2px dashed rgba(212, 177, 0, 0.3);
            text-align: center;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .status-active {
            background-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }
        
        .text-primary {
            color: var(--primary) !important;
        }
        
        .text-muted {
            color: rgba(255,255,255,0.6) !important;
        }
        
        .image-preview {
            max-width: 200px;
            max-height: 200px;
            border-radius: 10px;
            object-fit: cover;
            display: none;
        }
        
        .upload-area {
            border: 2px dashed rgba(212, 177, 0, 0.3);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: rgba(255,255,255,0.02);
        }
        
        .upload-area:hover {
            border-color: var(--primary);
            background: rgba(212, 177, 0, 0.05);
        }
        
        .upload-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .form-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            color: var(--primary);
            border-bottom: 2px solid rgba(212, 177, 0, 0.3);
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .required-field::after {
            content: " *";
            color: #dc3545;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
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
                    <h1 class="display-5 fw-bold">Gestión de Categorías</h1>
                    <p class="lead mb-0">Administra las categorías de productos para tu tienda</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="#" class="btn btn-light">
                        <i class="fas fa-list me-2"></i> Ver Todas las Categorías
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row justify-content-center">
            <!-- Formulario -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Agregar Nueva Categoría</h5>
                        <span class="status-badge status-active">Formulario de Registro</span>
                    </div>
                    <div class="card-body">
                        <form id="categoriaForm" action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Información Básica -->
                            <div class="form-section">
                                <h6 class="section-title"><i class="fas fa-info-circle me-2"></i> Información de la Categoría</h6>
                                
                                <div class="mb-4">
                                    <label for="nombre" class="form-label required-field">Nombre de la Categoría</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required 
                                           placeholder="Ej: Alimentos para Perros, Juguetes, Accesorios..." maxlength="100">
                                    <div class="form-text">Nombre único que identifique la categoría de productos.</div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control form-textarea" id="descripcion" name="descripcion" 
                                              rows="4" placeholder="Describe los productos que incluirá esta categoría..." maxlength="500"></textarea>
                                    <div class="form-text">Máximo 500 caracteres. Describe brevemente el tipo de productos.</div>
                                </div>
                            </div>

                            <!-- Imagen de la Categoría -->
                            <div class="form-section">
                                <h6 class="section-title"><i class="fas fa-image me-2"></i> Imagen de la Categoría</h6>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Subir Imagen</label>
                                            <div class="upload-area" id="uploadArea">
                                                <div class="upload-icon">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                </div>
                                                <h6>Arrastra una imagen o haz clic para seleccionar</h6>
                                                <p class="text-muted">Formatos: JPG, PNG, WEBP (Máx. 2MB)</p>
                                                <input type="file" id="imagen" name="imagen" accept="image/*" style="display: none;">
                                            </div>
                                            <div class="form-text">Imagen representativa de la categoría (opcional).</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Vista Previa</label>
                                            <div class="preview-card">
                                                <img id="imagePreview" class="image-preview" alt="Vista previa">
                                                <div id="previewPlaceholder">
                                                    <div class="category-icon">
                                                        <i class="fas fa-tags"></i>
                                                    </div>
                                                    <p class="text-muted mb-0">Vista previa de la imagen</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Configuración Simple -->
                            <div class="form-section">
                                <h6 class="section-title"><i class="fas fa-cog me-2"></i> Configuración</h6>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="orden" class="form-label">Orden de Visualización</label>
                                            <input type="number" class="form-control" id="orden" name="visualizacion" 
                                                   value="0" min="0" max="100">
                                            <div class="form-text">Define el orden de aparición (0 = primero).</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="mb-3">
                                    <label class="form-label">Estado</label>
                                    <div class="form-check form-switch mt-2">
                                        <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1" checked>
                                        <label class="form-check-label" for="activo">
                                            Categoría Activa
                                        </label>
                                    </div>
                                    <div class="form-text">Las categorías inactivas no se mostrarán en la tienda.</div>
                                </div>
                            </div>
                        </div>
                    </div>


                            <!-- Botones de Acción -->
                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                                <a href="{{ route('agregar.categoria') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i> Guardar Categoría
                                </button>
                            </div>
                        </form>
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

<script>
    // Manejo de carga de imagen
    const uploadArea = document.getElementById('uploadArea');
    const imageInput = document.getElementById('imagen');
    const imagePreview = document.getElementById('imagePreview');
    const previewPlaceholder = document.getElementById('previewPlaceholder');

    uploadArea.addEventListener('click', () => {
        imageInput.click();
    });

    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = 'var(--primary)';
        uploadArea.style.background = 'rgba(212, 177, 0, 0.1)';
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.style.borderColor = 'rgba(212, 177, 0, 0.3)';
        uploadArea.style.background = 'rgba(255,255,255,0.02)';
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = 'rgba(212, 177, 0, 0.3)';
        uploadArea.style.background = 'rgba(255,255,255,0.02)';
        
        if (e.dataTransfer.files.length) {
            imageInput.files = e.dataTransfer.files;
            previewImage(e.dataTransfer.files[0]);
        }
    });

    imageInput.addEventListener('change', (e) => {
        if (e.target.files.length) {
            previewImage(e.target.files[0]);
        }
    });

    function previewImage(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
                previewPlaceholder.style.display = 'none';
            };
            
            reader.readAsDataURL(file);
        }
    }

    // Validación del formulario
    document.getElementById('categoriaForm').addEventListener('submit', function(e) {
        const nombre = document.getElementById('nombre').value.trim();
        
        if (!nombre) {
            e.preventDefault();
            alert('Por favor, ingresa un nombre para la categoría.');
            document.getElementById('nombre').focus();
            return;
        }
    });

    // ✅ MOSTRAR MENSAJE DE ÉXITO
    document.addEventListener('DOMContentLoaded', function() {
        // Verificar si hay un mensaje de éxito en la sesión
        @if(session('success'))
            mostrarMensajeExito('{{ session('success') }}');
        @endif

        @if(session('error'))
            mostrarMensajeError('{{ session('error') }}');
        @endif
    });

    function mostrarMensajeExito(mensaje) {
        // Crear el toast de éxito
        const toast = document.createElement('div');
        toast.className = 'position-fixed top-0 end-0 p-3';
        toast.style.zIndex = '9999';
        toast.innerHTML = `
            <div class="toast show" role="alert">
                <div class="toast-header bg-success text-white">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong class="me-auto">Éxito</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body bg-dark text-white">
                    ${mensaje}
                </div>
            </div>
        `;
        
        document.body.appendChild(toast);
        
        // Auto-eliminar después de 5 segundos
        setTimeout(() => {
            toast.remove();
        }, 5000);
    }

    function mostrarMensajeError(mensaje) {
        // Crear el toast de error
        const toast = document.createElement('div');
        toast.className = 'position-fixed top-0 end-0 p-3';
        toast.style.zIndex = '9999';
        toast.innerHTML = `
            <div class="toast show" role="alert">
                <div class="toast-header bg-danger text-white">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong class="me-auto">Error</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body bg-dark text-white">
                    ${mensaje}
                </div>
            </div>
        `;
        
        document.body.appendChild(toast);
        
        // Auto-eliminar después de 5 segundos
        setTimeout(() => {
            toast.remove();
        }, 5000);
    }

    console.log('Formulario de categorías cargado');
</script>
</body>
</html>