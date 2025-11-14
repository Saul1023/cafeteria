<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --coffee-dark: #4E342E;
                --coffee-medium: #795548;
                --coffee-light: #A1887F;
                --cream: #FFF8E1;
                --latte: #D7CCC8;
                --accent: #FF9800;
                --text-dark: #3E2723;
                --text-light: #5D4037;
            }

            body {
                background: linear-gradient(135deg, var(--cream) 0%, var(--latte) 100%);
                min-height: 100vh;
                font-family: 'Figtree', sans-serif;
                margin: 0;
                padding: 0;
            }

            .coffee-login-container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem;
                position: relative;
                overflow: hidden;
            }

            /* Elementos decorativos de fondo */
            .coffee-bean {
                position: absolute;
                font-size: 1.5rem;
                opacity: 0.1;
                color: var(--coffee-dark);
                z-index: 0;
            }

            .bean-1 { top: 10%; left: 5%; transform: rotate(25deg); }
            .bean-2 { top: 15%; right: 7%; transform: rotate(-15deg); }
            .bean-3 { bottom: 20%; left: 8%; transform: rotate(40deg); }
            .bean-4 { bottom: 15%; right: 10%; transform: rotate(-30deg); }

            .coffee-steam {
                position: absolute;
                font-size: 2.5rem;
                opacity: 0.05;
                color: var(--coffee-dark);
            }

            .steam-1 { top: 5%; left: 15%; }
            .steam-2 { top: 8%; right: 20%; }

            .login-container {
                display: flex;
                width: 100%;
                max-width: 900px;
                background: white;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 15px 30px rgba(78, 52, 46, 0.15);
                position: relative;
                z-index: 1;
            }

            .brand-section {
                flex: 1;
                background: linear-gradient(135deg, var(--coffee-dark), var(--coffee-medium));
                color: white;
                padding: 50px 40px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }

            .brand-section::before {
                content: '';
                position: absolute;
                top: -50px;
                right: -50px;
                width: 200px;
                height: 200px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.1);
            }

            .brand-section::after {
                content: '';
                position: absolute;
                bottom: -80px;
                left: -80px;
                width: 250px;
                height: 250px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.1);
            }

            .logo {
                display: flex;
                align-items: center;
                margin-bottom: 30px;
                z-index: 1;
            }

            .logo-icon {
                font-size: 32px;
                margin-right: 15px;
                color: var(--cream);
            }

            .logo-text {
                font-size: 28px;
                font-weight: 700;
            }

            .welcome-message {
                margin-bottom: 40px;
                z-index: 1;
            }

            .welcome-message h1 {
                font-size: 32px;
                margin-bottom: 15px;
                font-weight: 700;
            }

            .welcome-message p {
                font-size: 16px;
                line-height: 1.6;
                opacity: 0.9;
            }

            .features {
                list-style: none;
                z-index: 1;
            }

            .feature {
                display: flex;
                align-items: center;
                margin-bottom: 25px;
            }

            .feature-icon {
                width: 40px;
                height: 40px;
                background: rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 15px;
                font-size: 18px;
            }

            .feature-text {
                font-size: 15px;
            }

            .coffee-cup {
                position: absolute;
                bottom: 30px;
                right: 30px;
                font-size: 80px;
                opacity: 0.2;
                transform: rotate(15deg);
                z-index: 0;
            }

            .login-section {
                flex: 1;
                padding: 50px 40px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .login-header {
                text-align: center;
                margin-bottom: 40px;
            }

            .login-header h2 {
                font-size: 28px;
                color: var(--coffee-dark);
                margin-bottom: 10px;
                font-weight: 700;
            }

            .login-header p {
                color: var(--text-light);
                font-size: 15px;
            }

            /* Estilos para los componentes de Laravel Breeze */
            .validation-errors {
                background: #FEF2F2;
                border: 1px solid #FECACA;
                border-radius: 10px;
                padding: 1rem;
                margin-bottom: 1.5rem;
            }

            .validation-errors .text-sm {
                color: #DC2626;
                font-weight: 500;
            }

            .status-message {
                background: #F0FDF4;
                border: 1px solid #BBF7D0;
                border-radius: 10px;
                padding: 1rem;
                margin-bottom: 1.5rem;
                color: #16A34A;
                font-weight: 500;
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .coffee-label {
                display: block;
                font-weight: 500;
                color: var(--text-dark);
                margin-bottom: 0.5rem;
                font-size: 0.95rem;
            }

            .coffee-input {
                width: 100%;
                border: 2px solid var(--latte);
                border-radius: 10px;
                padding: 0.875rem 1rem;
                font-size: 1rem;
                transition: all 0.3s ease;
                background: #fefefe;
            }

            .coffee-input:focus {
                outline: none;
                border-color: var(--coffee-medium);
                background: white;
                box-shadow: 0 0 0 3px rgba(121, 85, 72, 0.1);
            }

            .remember-me {
                display: flex;
                align-items: center;
                margin-bottom: 1.5rem;
                color: var(--text-light);
            }

            .coffee-checkbox {
                width: 1.25rem;
                height: 1.25rem;
                border: 2px solid var(--coffee-light);
                border-radius: 0.375rem;
                margin-right: 0.75rem;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .coffee-checkbox:checked {
                background-color: var(--coffee-medium);
                border-color: var(--coffee-medium);
            }

            .form-actions {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-top: 2rem;
            }

            .forgot-password {
                color: var(--coffee-medium);
                text-decoration: none;
                font-size: 0.95rem;
                font-weight: 500;
                transition: color 0.3s ease;
            }

            .forgot-password:hover {
                color: var(--coffee-dark);
                text-decoration: underline;
            }

            .coffee-button {
                background: var(--coffee-medium);
                color: white;
                border: none;
                border-radius: 10px;
                padding: 0.875rem 2rem;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .coffee-button:hover {
                background: var(--coffee-dark);
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(121, 85, 72, 0.3);
            }

            .coffee-button i {
                font-size: 1.1rem;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .login-container {
                    flex-direction: column;
                    max-width: 450px;
                }

                .brand-section, .login-section {
                    padding: 40px 30px;
                }

                .form-actions {
                    flex-direction: column;
                    gap: 1rem;
                    align-items: stretch;
                }

                .coffee-button {
                    justify-content: center;
                    order: -1;
                }

                .coffee-cup, .coffee-steam {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        <div class="coffee-login-container">
            <!-- Elementos decorativos de fondo -->
            <div class="coffee-bean bean-1">☕</div>
            <div class="coffee-bean bean-2">☕</div>
            <div class="coffee-bean bean-3">☕</div>
            <div class="coffee-bean bean-4">☕</div>

            <div class="coffee-steam steam-1">
                <i class="fas fa-cloud"></i>
            </div>
            <div class="coffee-steam steam-2">
                <i class="fas fa-cloud"></i>
            </div>

            <div class="login-container">
                <!-- Sección de marca -->
                <div class="brand-section">
                    <div class="logo">
                        <div class="logo-icon">
                            <i class="fas fa-mug-hot"></i>
                        </div>
                        <div class="logo-text">{{ config('app.name', 'Café Aromas') }}</div>
                    </div>

                    <div class="welcome-message">
                        <h1>Bienvenido de nuevo</h1>
                        <p>Accede a tu cuenta para descubrir nuestros exclusivos blends de café y gestionar tus pedidos especiales.</p>
                    </div>

                    <ul class="features">
                        <li class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-coffee"></i>
                            </div>
                            <div class="feature-text">Café 100% colombiano de las mejores fincas</div>
                        </li>
                        <li class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="feature-text">Envío gratis en compras superiores a $50.000</div>
                        </li>
                        <li class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-gift"></i>
                            </div>
                            <div class="feature-text">Combos únicos y ofertas especiales para ti</div>
                        </li>
                    </ul>

                    <div class="coffee-cup">
                        <i class="fas fa-mug-hot"></i>
                    </div>
                </div>

                <!-- Sección de login -->
                <div class="login-section">
                    <div class="login-header">
                        <h2>Iniciar Sesión</h2>
                        <p>Ingresa tus credenciales para acceder a tu cuenta</p>
                    </div>

                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-4" />

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="status-message mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email" class="coffee-label">Correo Electrónico</label>
                            <input id="email" class="coffee-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="tu@email.com">
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="coffee-label">Contraseña</label>
                            <input id="password" class="coffee-input" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                        </div>

                        <!-- Remember Me -->
                        <div class="remember-me">
                            <input id="remember_me" type="checkbox" class="coffee-checkbox" name="remember">
                            <label for="remember_me">Recordar mi cuenta</label>
                        </div>

                        <div class="form-actions">
                            @if (Route::has('password.request'))
                                <a class="forgot-password" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif

                            <button type="submit" class="coffee-button">
                                <i class="fas fa-sign-in-alt"></i>
                                Iniciar Sesión
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            // Efectos de interacción mejorados
            document.addEventListener('DOMContentLoaded', function() {
                const loginContainer = document.querySelector('.login-container');
                const inputs = document.querySelectorAll('.coffee-input');
                const button = document.querySelector('.coffee-button');

                // Animación de entrada
                loginContainer.style.opacity = '0';
                loginContainer.style.transform = 'translateY(20px)';

                setTimeout(() => {
                    loginContainer.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    loginContainer.style.opacity = '1';
                    loginContainer.style.transform = 'translateY(0)';
                }, 100);

                // Efecto focus en inputs
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        this.style.transform = 'translateY(-1px)';
                    });

                    input.addEventListener('blur', function() {
                        this.style.transform = 'translateY(0)';
                    });
                });

                // Efecto hover en botón
                if (button) {
                    button.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-2px)';
                    });

                    button.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0)';
                    });
                }
            });
        </script>

        @livewireScripts
    </body>
</html>
