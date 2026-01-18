<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARBERA PET - Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-dark: #b3955a;
            --primary: #c39838;
            --primary-light: #f2db62;
            --primary-lighter: #f2e189;
            --dark: #000000;
            --light: #eeeeee;
            --accent: #b07f2a;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            background: linear-gradient(to right, var(--primary-dark), var(--primary));
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-logo {
            height: 45px; /* Altura ajustada para el logo */
            width: auto;
            margin-right: 10px;
            object-fit: contain;
        }
        
        
        .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 1.8rem;
        }
        
        .auth-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }
        
        .auth-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            margin: 20px;
        }
        
        .auth-header {
            background: linear-gradient(to right, var(--primary-dark), var(--primary));
            color: white;
            padding: 25px;
            text-align: center;
        }
        
        .auth-body {
            padding: 25px;
        }
        
        .auth-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            display: block;
            border-radius: 50%;
            background: white;
            padding: 10px;
        }
        
        .form-control {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(195, 152, 56, 0.25);
        }
        
        .btn-auth {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        
        .btn-auth:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .auth-divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        
        .auth-divider::before,
        .auth-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #ddd;
        }
        
        .auth-divider span {
            padding: 0 15px;
            color: #777;
        }
        
        .social-auth {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .social-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            transition: all 0.3s;
        }
        
        .social-btn.facebook {
            background: #3b5998;
        }
        
        .social-btn.google {
            background: #db4a39;
        }
        
        .social-btn:hover {
            transform: translateY(-3px);
            opacity: 0.9;
        }
        
        .auth-footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
        
        .auth-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }
        
        .auth-link:hover {
            text-decoration: underline;
        }
        
        .password-toggle {
            position: relative;
        }
        
        .password-toggle-icon {
            position: absolute;
            right: 15px;
            top: 13px;
            cursor: pointer;
            color: #777;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
  .footer {
            background: linear-gradient(to right, var(--primary-dark), var(--primary));
            color: white;
            padding: 50px 0 20px;
            margin-top: 50px;
        }
        
        .footer a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .step-progress {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            position: relative;
        }
        
        .step-progress::before {
            content: "";
            position: absolute;
            top: 12px;
            left: 0;
            right: 0;
            height: 2px;
            background: #ddd;
            z-index: 1;
        }
        
        .step {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: white;
            border: 2px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            position: relative;
            z-index: 2;
        }
        
        .step.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }
    </style>
</head>
<body>
        <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
               <img src="{{ asset('img/logo1.png') }}" alt="Logo Elegant Pet" class="navbar-logo">BARBERA PET
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}"><i class="fas fa-home me-1"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart me-1"></i> Productos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Auth Container -->
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h3>Crear Cuenta</h3>
                <p>Únete a la comunidad de BARBERA PET</p>
            </div>
            <div class="auth-body">
                <form id="registerForm">
                    @csrf
                    
                    <div class="step-progress">
                        <div class="step active">1</div>
                        <div class="step">2</div>
                        <div class="step">3</div>
                        <div class="step">4</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="fullName" name="name" placeholder="Tu nombre completo" required>
                        <div class="invalid-feedback" id="nameError"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="tu@email.com" required>
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>
                    
                    <div class="mb-3 password-toggle">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                        <span class="password-toggle-icon" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                        <div class="invalid-feedback" id="passwordError"></div>
                    </div>
                    
                    <div class="mb-3 password-toggle">
                        <label for="confirmPassword" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="••••••••" required>
                        <span class="password-toggle-icon" id="toggleConfirmPassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                        <label class="form-check-label" for="terms">Acepto los <a href="#" class="auth-link">Términos y Condiciones</a> y la <a href="#" class="auth-link">Política de Privacidad</a></label>
                        <div class="invalid-feedback" id="termsError"></div>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" checked>
                        <label class="form-check-label" for="newsletter">Deseo recibir novedades y ofertas por correo electrónico</label>
                    </div>
                    
                    <button type="submit" class="btn btn-auth" id="submitBtn">
                        <span id="submitText">Crear Cuenta</span>
                        <div id="submitSpinner" class="spinner-border spinner-border-sm d-none" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                    </button>
                    
                    <div class="auth-divider">
                        <span>O registrarse con</span>
                    </div>
                    
                    <div class="social-auth">
                        <a href="#" class="social-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-btn google">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                    
                    <div class="auth-footer">
                        <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="auth-link">Inicia sesión aquí</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                <p class="mb-0">&copy; 2026 BARBERA PET. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Funcionalidad para mostrar/ocultar contraseña
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('confirmPassword');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Validación en tiempo real del email
        document.getElementById('email').addEventListener('blur', function() {
            const email = this.value;
            if (email) {
                checkEmailAvailability(email);
            }
        });

        // Función para verificar disponibilidad del email
        function checkEmailAvailability(email) {
            fetch('{{ route("check.email") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                const emailInput = document.getElementById('email');
                if (!data.available) {
                    emailInput.classList.add('is-invalid');
                    document.getElementById('emailError').textContent = 'Este correo electrónico ya está registrado.';
                } else {
                    emailInput.classList.remove('is-invalid');
                    emailInput.classList.add('is-valid');
                }
            });
        }


    // ... (código anterior de validaciones y toggle password)

    // Manejo del envío del formulario
    document.getElementById('registerForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const submitSpinner = document.getElementById('submitSpinner');
        
        // Mostrar spinner y deshabilitar botón
        submitBtn.disabled = true;
        submitText.classList.add('d-none');
        submitSpinner.classList.remove('d-none');
        
        // Limpiar errores anteriores
        clearErrors();
        
        try {
            const formData = new FormData(this);
            
            const response = await fetch('{{ route("register.submit") }}', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                // Registro exitoso - mostrar mensaje y redirigir
                showMessage('success', data.message);
                
                // Redirigir después de 2 segundos
                setTimeout(() => {
                    if (data.redirect_url) {
                        window.location.href = data.redirect_url;
                    } else {
                        window.location.href = '{{ route("login") }}';
                    }
                }, 2000);
            } else {
                // Mostrar errores de validación
                if (data.errors) {
                    displayErrors(data.errors);
                } else {
                    showMessage('error', data.message || 'Error en el registro');
                }
                
                // Restaurar botón en caso de error
                submitBtn.disabled = false;
                submitText.classList.remove('d-none');
                submitSpinner.classList.add('d-none');
            }
            
        } catch (error) {
            console.error('Error:', error);
            showMessage('error', 'Error de conexión');
            
            // Restaurar botón en caso de error
            submitBtn.disabled = false;
            submitText.classList.remove('d-none');
            submitSpinner.classList.add('d-none');
        }
    });

    // Función para mostrar mensajes
    function showMessage(type, message) {
        // Remover mensajes anteriores
        const existingAlerts = document.querySelectorAll('.alert');
        existingAlerts.forEach(alert => alert.remove());
        
        // Crear alerta Bootstrap
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
        alertDiv.innerHTML = `
            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        // Insertar antes del formulario
        const authBody = document.querySelector('.auth-body');
        const form = document.getElementById('registerForm');
        authBody.insertBefore(alertDiv, form);
        
        // Auto-eliminar después de 5 segundos (solo para errores)
        if (type === 'error') {
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 5000);
        }
    }



        // Función para mostrar errores de validación
        function displayErrors(errors) {
            for (const field in errors) {
                const input = document.querySelector(`[name="${field}"]`);
                const errorDiv = document.getElementById(field + 'Error') || 
                               document.getElementById(field.charAt(0).toUpperCase() + field.slice(1) + 'Error');
                
                if (input && errorDiv) {
                    input.classList.add('is-invalid');
                    errorDiv.textContent = errors[field][0];
                }
            }
        }

        // Función para limpiar errores
        function clearErrors() {
            const errorElements = document.querySelectorAll('.is-invalid, .is-valid');
            errorElements.forEach(el => {
                el.classList.remove('is-invalid', 'is-valid');
            });
            
            const errorMessages = document.querySelectorAll('.invalid-feedback');
            errorMessages.forEach(el => {
                el.textContent = '';
            });
        }

        // Validación en tiempo real
        document.querySelectorAll('#registerForm input').forEach(input => {
            input.addEventListener('input', function() {
                if (this.classList.contains('is-invalid')) {
                    this.classList.remove('is-invalid');
                    const errorId = this.name + 'Error';
                    const errorDiv = document.getElementById(errorId);
                    if (errorDiv) errorDiv.textContent = '';
                }
            });
        });
    </script>
</body>
</html>