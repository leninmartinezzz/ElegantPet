<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbera Pet - Registrarse</title>
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
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        .navbar-logo {
            height: 65px;
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
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }
        
        .auth-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }
        
        .auth-card {
            background: var(--light);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            margin: 20px;
            border: 1px solid rgba(212, 177, 0, 0.2);
        }
        
        .auth-header {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
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
            background-color: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 15px;
            transition: all 0.3s;
            color: var(--text-light);
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(212, 177, 0, 0.25);
            background-color: rgba(255,255,255,0.08);
            color: var(--text-light);
        }
        
        .form-control::placeholder {
            color: rgba(255,255,255,0.5);
        }
        
        .form-label {
            color: var(--text-light);
            font-weight: 500;
        }
        
        .btn-auth {
            background: linear-gradient(to right, var(--primary-dark), var(--primary));
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(212, 177, 0, 0.3);
        }
        
        .btn-auth:hover {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 177, 0, 0.4);
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
            background: rgba(255,255,255,0.2);
        }
        
        .auth-divider span {
            padding: 0 15px;
            color: rgba(255,255,255,0.6);
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
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
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
            color: rgba(255,255,255,0.7);
        }
        
        .auth-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .auth-link:hover {
            color: var(--primary-light);
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
            color: rgba(255,255,255,0.6);
            transition: color 0.3s;
        }
        
        .password-toggle-icon:hover {
            color: var(--primary);
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .form-check-label {
            color: var(--text-light);
        }
        
        .footer {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
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
            background: rgba(255,255,255,0.2);
            z-index: 1;
        }
        
        .step {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: var(--light);
            border: 2px solid rgba(255,255,255,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            position: relative;
            z-index: 2;
            color: rgba(255,255,255,0.6);
            transition: all 0.3s;
        }
        
        .step.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
            box-shadow: 0 0 10px rgba(212, 177, 0, 0.5);
        }
        
        .text-danger {
            color: #ff6b6b !important;
            font-size: 0.875rem;
            margin-top: 5px;
            display: block;
        }
        
        .is-invalid {
            border-color: #ff6b6b !important;
        }
        
        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
            border: none;
        }
        
        .alert-info {
            background-color: rgba(212, 177, 0, 0.1);
            color: var(--primary-light);
            border: 1px solid rgba(212, 177, 0, 0.3);
        }
        
        .newsletter-form {
            position: relative;
        }
        
        .newsletter-form input {
            background: rgba(255,255,255,0.15);
            border: none;
            color: white;
            padding: 12px 20px;
            border-radius: 30px;
            width: 100%;
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
            padding: 7px 20px;
            font-weight: 600;
        }
        
        .float-end {
            float: right;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo1.png') }}" alt="Logo Barbera Pet" class="navbar-logo"> BARBERA PET
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home me-1"></i> Inicio</a>
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
                <p>Únete a la comunidad de Barbera Pet</p>
            </div>
            <div class="auth-body">
                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="step-progress">
                        <div class="step active">1</div>
                        <div class="step">2</div>
                        <div class="step">3</div>
                        <div class="step">4</div>
                    </div>
                    
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Tu nombre completo">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="tu@email.com">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Password -->
                    <div class="mb-3 password-toggle">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="••••••••">
                        <span class="password-toggle-icon" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Confirm Password -->
                    <div class="mb-3 password-toggle">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                        <span class="password-toggle-icon" id="toggleConfirmPassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    
                    <!-- Terms and Conditions -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="terms" name="terms" required>
                        <label class="form-check-label" for="terms">Acepto los <a href="#" class="auth-link">Términos y Condiciones</a> y la <a href="#" class="auth-link">Política de Privacidad</a></label>
                        @error('terms')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Newsletter (Optional) -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" checked>
                        <label class="form-check-label" for="newsletter">Deseo recibir novedades y ofertas por correo electrónico</label>
                    </div>
                    
                    <button type="submit" class="btn btn-auth">
                        Crear Cuenta
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
                        <li><a href="{{ url('/') }}">Inicio</a></li>
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
                <p class="mb-0">&copy; {{ date('Y') }} Barbera Pet. Todos los derechos reservados.</p>
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
            const passwordInput = document.getElementById('password_confirmation');
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

        // Validación en tiempo real para limpiar errores al escribir
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                if (this.classList.contains('is-invalid')) {
                    this.classList.remove('is-invalid');
                    const errorElement = this.nextElementSibling;
                    if (errorElement && errorElement.classList.contains('text-danger')) {
                        errorElement.textContent = '';
                    }
                }
            });
        });

    </script>
</body>
</html>