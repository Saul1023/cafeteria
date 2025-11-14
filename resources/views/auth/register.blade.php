<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Registro</title>

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

            .coffee-register-container {
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
            .bean-5 { top: 40%; left: 3%; transform: rotate(10deg); }
            .bean-6 { top: 50%; right: 4%; transform: rotate(-25deg); }

            .coffee-steam {
                position: absolute;
                font-size: 2.5rem;
                opacity: 0.05;
                color: var(--coffee-dark);
            }

            .steam-1 { top: 5%; left: 15%; }
            .steam-2 { top: 8%; right: 20%; }

            .register-container {
                display: flex;
                width: 100%;
                max-width: 1000px;
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

            .register-section {
                flex: 1;
                padding: 50px 40px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .register-header {
                text-align: center;
                margin-bottom: 40px;
            }

            .register-header h2 {
                font-size: 28px;
                color: var(--coffee-dark);
                margin-bottom: 10px;
                font-weight: 700;
            }

            .register-header p {
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

            .terms-container {
                margin: 1.5rem 0;
                padding: 1rem;
                background: var(--cream);
                border-radius: 10px;
                border: 1px solid var(--latte);
            }

            .terms-label {
                display: flex;
                align-items: flex-start;
                color: var(--text-dark);
                font-size: 0.95rem;
                line-height: 1.5;
            }

            .coffee-checkbox {
                width: 1.25rem;
                height: 1.25rem;
                border: 2px solid var(--coffee-light);
                border-radius: 0.375rem;
                margin-right: 0.75rem;
                margin-top: 0.125rem;
                cursor: pointer;
                transition: all 0.3s ease;
                flex-shrink: 0;
            }

            .coffee-checkbox:checked {
                background-color: var(--coffee-medium);
                border-color: var(--coffee-medium);
            }

            .terms-links {
                display: inline;
            }

            .terms-links a {
                color: var(--coffee-medium);
                text-decoration: none;
                font-weight: 500;
                transition: color 0.3s ease;
            }

            .terms-links a:hover {
                color: var(--coffee-dark);
                text-decoration: underline;
            }

            .form-actions {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-top: 2rem;
            }

            .login-link {
                color: var(--coffee-medium);
                text-decoration: none;
                font-size: 0.95rem;
                font-weight: 500;
                transition: color 0.3s ease;
            }

            .login-link:hover {
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
                .register-container {
                    flex-direction: column;
                    max-width: 450px;
                }

                .brand-section, .register-section {
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

                .terms-label {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .coffee-checkbox {
                    margin-bottom: 0.5rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="coffee-register-container">
            <!-- Elementos decorativos de fondo -->
            <div class="coffee-bean bean-1">☕</div>
            <div class="coffee-bean bean-2">☕</div>
            <div class="coffee-bean bean-3">☕</div>
            <div class="coffee-bean bean-4">☕</div>
            <div class="coffee-bean bean-5">☕</div>
            <div class="coffee-bean bean-6">☕</div>

            <div class="coffee-steam steam-1">
                <i class="fas fa-cloud"></i>
            </div>
            <div class="coffee-steam steam-2">
                <i class="fas fa-cloud"></i>
            </div>

            <div class="register-container">
                <!-- Sección de marca -->
                <div class="brand-section">
                    <div class="logo">
                        <div class="logo-icon">
                            <i class="fas fa-mug-hot"></i>
                        </div>
                        <div class="logo-text">{{ config('app.name', 'Café Aromas') }}</div>
                    </div>

                    <div class="welcome-message">
                        <h1>Únete a nuestra comunidad</h1>
                        <p>Crea tu cuenta y descubre el mundo del café premium con beneficios exclusivos para miembros.</p>
                    </div>

                    <ul class="features">
                        <li class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="feature-text">Descuentos exclusivos para miembros registrados</div>
                        </li>
                        <li class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <div class="feature-text">Historial de pedidos y recomendaciones personalizadas</div>
                        </li>
                        <li class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="feature-text">Programa de puntos y recompensas especiales</div>
                        </li>
                    </ul>

                    <div class="coffee-cup">
                        <i class="fas fa-mug-hot"></i>
                    </div>
                </div>

                <!-- Sección de registro -->
                <div class="register-section">
                    <div class="register-header">
                        <h2>Crear Cuenta</h2>
                        <p>Completa tus datos para registrarte</p>
                    </div>

                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name" class="coffee-label">Nombre Completo</label>
                            <input id="name" class="coffee-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Tu nombre completo">
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email" class="coffee-label">Correo Electrónico</label>
                            <input id="email" class="coffee-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="tu@email.com">
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="coffee-label">Contraseña</label>
                            <input id="password" class="coffee-input" type="password" name="password" required autocomplete="new-password" placeholder="••••••••">
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="password_confirmation" class="coffee-label">Confirmar Contraseña</label>
                            <input id="password_confirmation" class="coffee-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                        </div>

                        <!-- Terms and Privacy Policy -->
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="terms-container">
                                <label for="terms" class="terms-label">
                                    <input type="checkbox" name="terms" id="terms" class="coffee-checkbox" required />
                                    <div class="terms-text">
                                        {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="terms-links">Términos de Servicio</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="terms-links">Política de Privacidad</a>',
                                        ]) !!}
                                    </div>
                                </label>
                            </div>
                        @endif

                        <div class="form-actions">
                            <a class="login-link" href="{{ route('login') }}">
                                ¿Ya tienes una cuenta?
                            </a>

                            <button type="submit" class="coffee-button">
                                <i class="fas fa-user-plus"></i>
                                Registrarse
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            // Efectos de interacción mejorados
            document.addEventListener('DOMContentLoaded', function() {
                const registerContainer = document.querySelector('.register-container');
                const inputs = document.querySelectorAll('.coffee-input');
                const button = document.querySelector('.coffee-button');

                // Animación de entrada
                registerContainer.style.opacity = '0';
                registerContainer.style.transform = 'translateY(20px)';

                setTimeout(() => {
                    registerContainer.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    registerContainer.style.opacity = '1';
                    registerContainer.style.transform = 'translateY(0)';
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

                // Validación de contraseñas
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('password_confirmation');

                function validatePasswords() {
                    if (password.value !== confirmPassword.value) {
                        confirmPassword.style.borderColor = '#DC2626';
                    } else {
                        confirmPassword.style.borderColor = '#16A34A';
                    }
                }

                if (password && confirmPassword) {
                    confirmPassword.addEventListener('input', validatePasswords);
                }
            });
        </script>

        @livewireScripts
    </body>
</html>
