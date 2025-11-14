<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'MARTÍNEZ') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <style>
            /* CSS Variables */
            :root {
                --color-sailor-blue: #1E3A5F;
                --color-coffee-brown: #8B4513;
                --color-cream: #F5F5DC;
                --color-light-tan: #D2B48C;
                --color-dark-brown: #5D4037;
                --color-gold: #D4AF37;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Instrument Sans', sans-serif;
                background: linear-gradient(135deg, #F5F5DC 0%, #E8DCC4 100%);
                color: #2c2c2c;
                min-height: 100vh;
                line-height: 1.6;
            }

            /* Header Navigation Mejorado */
            .nav-header {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                padding: 1.2rem 2rem;
                box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
                position: sticky;
                top: 0;
                z-index: 100;
                animation: slideDown 0.5s ease-out;
                max-width: 1400px;
                margin: 0 auto;
                border-radius: 0 0 16px 16px;
            }

            @keyframes slideDown {
                from { transform: translateY(-100%); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }

            .nav-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .brand-section {
                display: flex;
                align-items: center;
                gap: 2rem;
            }

            .brand-logo {
                text-decoration: none;
            }

            .brand-name {
                font-size: 1.8rem;
                font-weight: 700;
                letter-spacing: 3px;
                color: var(--color-sailor-blue);
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            }

            .nav-links {
                display: flex;
                gap: 2rem;
                align-items: center;
            }

            .nav-link {
                color: var(--color-coffee-brown);
                text-decoration: none;
                font-weight: 600;
                font-size: 0.95rem;
                letter-spacing: 1px;
                position: relative;
                transition: color 0.3s ease;
                padding: 0.5rem 0;
            }

            .nav-link:after {
                content: '';
                position: absolute;
                bottom: -5px;
                left: 0;
                width: 0;
                height: 2px;
                background: var(--color-sailor-blue);
                transition: width 0.3s ease;
            }

            .nav-link:hover {
                color: var(--color-sailor-blue);
            }

            .nav-link:hover:after {
                width: 100%;
            }

            .auth-section {
                display: flex;
                gap: 1rem;
                align-items: center;
            }

            .btn {
                padding: 0.7rem 1.8rem;
                border-radius: 8px;
                font-weight: 600;
                font-size: 0.9rem;
                text-decoration: none;
                transition: all 0.3s ease;
                cursor: pointer;
                border: 2px solid transparent;
                display: inline-block;
                text-align: center;
            }

            .btn-primary {
                background: var(--color-sailor-blue);
                color: white;
                border-color: var(--color-sailor-blue);
            }

            .btn-primary:hover {
                background: transparent;
                color: var(--color-sailor-blue);
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(30, 58, 95, 0.3);
            }

            .btn-secondary {
                background: transparent;
                color: var(--color-sailor-blue);
                border-color: var(--color-sailor-blue);
            }

            .btn-secondary:hover {
                background: var(--color-sailor-blue);
                color: white;
                transform: translateY(-2px);
            }

            .btn-logout {
                background: none;
                border: 2px solid transparent;
                color: var(--color-sailor-blue);
                padding: 0.7rem 1.8rem;
                border-radius: 8px;
                font-weight: 600;
                font-size: 0.9rem;
                cursor: pointer;
                transition: all 0.3s ease;
                font-family: 'Instrument Sans', sans-serif;
            }

            .btn-logout:hover {
                border-color: var(--color-sailor-blue);
                transform: translateY(-2px);
            }

            /* Mobile Menu Toggle */
            .menu-toggle {
                display: none;
                background: none;
                border: none;
                color: var(--color-sailor-blue);
                cursor: pointer;
                padding: 0.5rem;
            }

            .mobile-menu {
                display: none;
                background: white;
                padding: 1.5rem;
                border-radius: 12px;
                box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
                margin-top: 1rem;
                width: 100%;
            }

            .mobile-menu.show {
                display: block;
                animation: slideDown 0.3s ease-out;
            }

            .mobile-menu-list {
                list-style: none;
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            /* Main Content Container */
            .main-container {
                max-width: 1400px;
                margin: 3rem auto;
                padding: 0 2rem;
                animation: fadeInUp 0.8s ease-out;
            }

            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }

            /* Hero Banner para usuarios NO autenticados */
            .hero-banner {
                background: linear-gradient(135deg, var(--color-sailor-blue) 0%, #2c5a8f 100%);
                border-radius: 20px;
                padding: 4rem 3rem;
                color: white;
                text-align: center;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
                margin-bottom: 3rem;
                position: relative;
                overflow: hidden;
            }

            .hero-banner::before {
                content: '';
                position: absolute;
                top: -50%;
                right: -10%;
                width: 400px;
                height: 400px;
                background: rgba(255, 255, 255, 0.05);
                border-radius: 50%;
            }

            .hero-content {
                position: relative;
                z-index: 1;
            }

            .hero-title {
                font-size: 3.5rem;
                font-weight: 700;
                letter-spacing: 5px;
                margin-bottom: 0.5rem;
                text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2);
            }

            .hero-subtitle {
                font-size: 1.5rem;
                font-weight: 500;
                letter-spacing: 3px;
                margin-bottom: 1rem;
                color: var(--color-gold);
            }

            .hero-description {
                font-size: 1.2rem;
                max-width: 700px;
                margin: 0 auto 2rem;
                line-height: 1.6;
                opacity: 0.95;
            }

            /* Dashboard Section para usuarios AUTENTICADOS */
            .martinez-dashboard {
                width: 100%;
            }

            .martinez-header {
                text-align: center;
                margin-bottom: 3rem;
                padding: 3rem 2rem;
                background: white;
                border-radius: 20px;
                box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
            }

            .martinez-brand-name {
                font-size: 3rem;
                font-weight: 700;
                letter-spacing: 5px;
                margin-bottom: 0.5rem;
                color: var(--color-sailor-blue);
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            }

            .martinez-brand-subtitle {
                font-size: 1.3rem;
                color: var(--color-coffee-brown);
                margin-bottom: 1rem;
                font-weight: 500;
                letter-spacing: 2px;
            }

            .martinez-tagline {
                font-size: 1.1rem;
                font-weight: 400;
                color: #666;
                letter-spacing: 2px;
            }

            /* Products Grid */
            .martinez-products-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
                gap: 2.5rem;
            }

            .martinez-product-card {
                background: white;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
                transition: all 0.4s ease;
                position: relative;
            }

            .martinez-product-card:hover {
                transform: translateY(-10px) scale(1.02);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            }

            .product-badge {
                position: absolute;
                top: 15px;
                right: 15px;
                background: var(--color-gold);
                color: white;
                padding: 0.4rem 1rem;
                border-radius: 20px;
                font-size: 0.8rem;
                font-weight: 600;
                z-index: 10;
                text-transform: uppercase;
                letter-spacing: 1px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            }

            .martinez-product-image {
                height: 250px;
                background: linear-gradient(135deg, var(--color-light-tan) 0%, #c4a57b 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                color: rgba(255, 255, 255, 0.8);
                font-style: italic;
                font-size: 1.1rem;
                position: relative;
                overflow: hidden;
            }

            .martinez-product-image::before {
                content: '☕';
                font-size: 6rem;
                position: absolute;
                opacity: 0.2;
                animation: float 3s ease-in-out infinite;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
            }

            .martinez-product-info {
                padding: 2rem;
            }

            .martinez-product-title {
                font-size: 1.3rem;
                font-weight: 600;
                color: var(--color-sailor-blue);
                margin-bottom: 1rem;
                line-height: 1.4;
                min-height: 3.5rem;
            }

            .martinez-product-description {
                color: #666;
                font-size: 0.95rem;
                margin-bottom: 1.5rem;
                line-height: 1.6;
            }

            .martinez-product-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 1.5rem;
                padding-top: 1.5rem;
                border-top: 1px solid #eee;
            }

            .martinez-product-price {
                font-size: 1.8rem;
                font-weight: 700;
                color: var(--color-sailor-blue);
            }

            .btn-view-product {
                background: var(--color-coffee-brown);
                color: white;
                padding: 0.7rem 1.5rem;
                border-radius: 8px;
                border: none;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-block;
                font-family: 'Instrument Sans', sans-serif;
            }

            .btn-view-product:hover {
                background: var(--color-dark-brown);
                transform: scale(1.05);
            }

            /* Welcome Section para NO autenticados */
            .welcome-section {
                background: white;
                border-radius: 20px;
                padding: 3rem;
                box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
                margin-bottom: 3rem;
            }

            .welcome-title {
                font-size: 2rem;
                color: var(--color-sailor-blue);
                font-weight: 700;
                margin-bottom: 1rem;
            }

            .welcome-text {
                color: #666;
                font-size: 1.1rem;
                line-height: 1.6;
                margin-bottom: 2rem;
            }

            .features-list {
                list-style: none;
                margin-bottom: 2rem;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                gap: 1rem;
                width: 100%;
                align-items: stretch;
            }

            .feature-item {
                display: flex;
                align-items: flex-start;
                gap: 1rem;
                padding: 1rem;
                margin-bottom: 0;
                background: #f9f9f9;
                border-radius: 12px;
                transition: all 0.3s ease;
                flex: 1 1 calc(33.333% - 1rem);
                min-width: 220px;
                box-sizing: border-box;
            }

            .feature-item:hover {
                background: #f0f0f0;
                transform: translateX(5px);
            }

            .feature-icon {
                font-size: 2rem;
                min-width: 50px;
            }

            .feature-content {
                flex: 1;
            }

            .feature-title {
                font-weight: 600;
                color: var(--color-sailor-blue);
                margin-bottom: 0.3rem;
            }

            .feature-description {
                color: #666;
                font-size: 0.95rem;
            }

            /* Responsive Design */
            @media (max-width: 1024px) {
                .nav-links {
                    display: none;
                }

                .menu-toggle {
                    display: block;
                }

                .hero-title {
                    font-size: 2.5rem;
                }

                .hero-subtitle {
                    font-size: 1.2rem;
                }

                .martinez-brand-name {
                    font-size: 2rem;
                }

                .martinez-products-grid {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 768px) {
                .nav-header {
                    padding: 1rem;
                }

                .main-container {
                    padding: 0 1rem;
                    margin: 2rem auto;
                }

                .hero-banner {
                    padding: 3rem 1.5rem;
                }

                .hero-title {
                    font-size: 2rem;
                }

                .auth-section {
                    flex-direction: column;
                    width: 100%;
                }

                .btn {
                    width: 100%;
                    text-align: center;
                }

                .welcome-section {
                    padding: 2rem 1.5rem;
                }

                /* For small screens, stack features vertically */
                .features-list {
                    flex-direction: column;
                }

                .feature-item {
                    flex: 1 1 100%;
                    min-width: auto;
                }
            }
        </style>
    </head>
    <body>
        <!-- Header Navigation - MANTIENE TODA LA FUNCIONALIDAD DE JETSTREAM -->
        <header class="nav-header">
            @if (Route::has('login'))
                <nav class="nav-container">
                    <div class="brand-section">
                        <a href="/" class="brand-logo">
                            <div class="brand-name">EL RINCON SABROSITO</div>
                        </a>
                        <div class="nav-links">
                            <a href="/" class="nav-link">Home</a>
                            <a href="/productos" class="nav-link">Productos</a>
                            <a href="/ofertas" class="nav-link">Ofertas</a>
                        </div>
                    </div>

                    <div class="auth-section">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-secondary">
                                Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn-logout">
                                    Cerrar Sesión
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-secondary">
                                Iniciar Sesión
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">
                                    Registrarse
                                </a>
                            @endif
                        @endauth

                        <!-- Mobile Menu Toggle -->
                        <button id="menuToggle" class="menu-toggle" aria-label="Abrir menú">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 12h18M3 6h18M3 18h18"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Mobile Menu -->
                    <div id="mobileMenu" class="mobile-menu">
                        <ul class="mobile-menu-list">
                            <li><a href="/" class="nav-link">Home</a></li>
                            <li><a href="/productos" class="nav-link">Productos</a></li>
                            <li><a href="/ofertas" class="nav-link">Ofertas</a></li>
                            @auth
                                <li><a href="{{ url('/dashboard') }}" class="btn btn-secondary" style="text-align: center;">Dashboard</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn-logout" style="width: 100%;">Cerrar Sesión</button>
                                    </form>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}" class="btn btn-secondary" style="text-align: center;">Iniciar Sesión</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="btn btn-primary" style="text-align: center;">Registrarse</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                </nav>
            @endif
        </header>

        <!-- Main Content -->
        <main class="main-container">
            @auth
                <!-- Dashboard para USUARIOS AUTENTICADOS -->
                <div class="martinez-dashboard">
                    <div class="martinez-header">
                        <h1 class="martinez-brand-name">EL RINCON SABROSITO</h1>
                        <div class="martinez-brand-subtitle">IPOTIALIANO</div>
                        <div class="martinez-tagline">CALM ENERGY</div>
                    </div>

                    <div class="martinez-dashboard-content" style="text-align:center; padding:2rem;">
                        <p style="font-size:1.05rem; color:#444;">Bienvenido. Los productos están disponibles en la página pública para visitantes no autenticados.</p>
                        <p style="margin-top:1rem;"><a href="{{ url('/dashboard') }}" class="btn btn-secondary">Ir al Dashboard</a></p>
                    </div>
                </div>
            @else
                <!-- Página de inicio para USUARIOS NO AUTENTICADOS -->
                <div class="hero-banner">
                    <div class="hero-content">
                        <h1 class="hero-title">EL RINCON SABROSITO</h1>
                        <p class="hero-subtitle">IPOTIALIANO</p>
                        <p class="hero-description">
                            Experimenta la perfecta fusión entre la calidad del café colombiano
                            y el estilo italiano. Calm Energy para tu día a día.
                        </p>
                    </div>
                </div>

                <div class="welcome-section">
                    <p class="welcome-text">
                        Donde el café de calidad se encuentra con el estilo italiano.
                        Regístrate para realizar pedidos y disfrutar de nuestras ofertas exclusivas.
                    </p>

                    <ul class="features-list">
                        <li class="feature-item">
                            <div class="feature-icon">☕</div>
                            <div class="feature-content">
                                <div class="feature-title">Café Premium</div>
                                <div class="feature-description">
                                    100% colombiano seleccionado de las mejores fincas
                                </div>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="feature-icon">🚚</div>
                            <div class="feature-content">
                                <div class="feature-title">Envío Gratis</div>
                                <div class="feature-description">
                                    En compras superiores a $50.000
                                </div>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="feature-icon">🎁</div>
                            <div class="feature-content">
                                <div class="feature-title">Combos Únicos</div>
                                <div class="feature-description">
                                    Ofertas especiales diseñadas para ti
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div style="text-align: center;">
                        <a href="{{ route('register') }}" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2.5rem;">
                            Crear Cuenta Gratis
                        </a>
                    </div>
                </div>

                    <!-- Galería de Productos para NO AUTENTICADOS -->
                    <div style="margin-top: 4rem;">
                        <h2 class="welcome-title" style="text-align: center; margin-bottom: 2rem;">Nuestros Productos</h2>
                        <div class="martinez-products-grid">
                            <!-- Producto 1 -->
                            <div class="martinez-product-card">
                                <span class="product-badge">Nuevo</span>
                                <div class="martinez-product-image">
                                    <span>Combo Desayuno Completo</span>
                                </div>
                                <div class="martinez-product-info">
                                    <h3 class="martinez-product-title">Combo Desayuno Cápsulas, Café y Dulces</h3>
                                    <p class="martinez-product-description">
                                        El combo perfecto para comenzar tu día con energía.
                                        Incluye cápsulas de café premium, café molido y dulces artesanales.
                                    </p>
                                    <div class="martinez-product-footer">
                                        <div class="martinez-product-price">$ 45.000</div>
                                        <a href="#" class="btn-view-product">Ver Más</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Producto 2 -->
                            <div class="martinez-product-card">
                                <span class="product-badge">Popular</span>
                                <div class="martinez-product-image">
                                    <span>Cafetera Hudson Premium</span>
                                </div>
                                <div class="martinez-product-info">
                                    <h3 class="martinez-product-title">Combo Cafetera Hudson Aluminio Tipo Italiana 6 pocillos + Molidos 250gr.</h3>
                                    <p class="martinez-product-description">
                                        Cafetera de aluminio tipo italiana para 6 pocillos.
                                        Incluye 250gr de café molido de alta calidad.
                                    </p>
                                    <div class="martinez-product-footer">
                                        <div class="martinez-product-price">$ 60.000</div>
                                        <a href="#" class="btn-view-product">Ver Más</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Producto 3 -->
                            <div class="martinez-product-card">
                                <span class="product-badge">Oferta</span>
                                <div class="martinez-product-image">
                                    <span>Café Colombia Premium</span>
                                </div>
                                <div class="martinez-product-info">
                                    <h3 class="martinez-product-title">Combo Café Colombia y minis alfajores negros</h3>
                                    <p class="martinez-product-description">
                                        Café 100% colombiano de origen único acompañado de
                                        deliciosos mini alfajores negros artesanales.
                                    </p>
                                    <div class="martinez-product-footer">
                                        <div class="martinez-product-price">$ 32.000</div>
                                        <a href="#" class="btn-view-product">Ver Más</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Producto 4 -->
                            <div class="martinez-product-card">
                                <span class="product-badge">Descuento</span>
                                <div class="martinez-product-image">
                                    <span>Café Espresso Italiano</span>
                                </div>
                                <div class="martinez-product-info">
                                    <h3 class="martinez-product-title">Espresso Italiano Tradicional 500gr</h3>
                                    <p class="martinez-product-description">
                                        Blend especial de café tostado oscuro con sabor intenso
                                        y aroma inconfundible. Perfecto para espresso.
                                    </p>
                                    <div class="martinez-product-footer">
                                        <div class="martinez-product-price">$ 28.000</div>
                                        <a href="#" class="btn-view-product">Ver Más</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Producto 5 -->
                            <div class="martinez-product-card">
                                <span class="product-badge">Premium</span>
                                <div class="martinez-product-image">
                                    <span>Café Gourmet Seleccionado</span>
                                </div>
                                <div class="martinez-product-info">
                                    <h3 class="martinez-product-title">Café Gourmet Single Origin 250gr</h3>
                                    <p class="martinez-product-description">
                                        Granos seleccionados de finca única con notas de chocolate
                                        y frutas secas. Molienda fina para filtro.
                                    </p>
                                    <div class="martinez-product-footer">
                                        <div class="martinez-product-price">$ 35.000</div>
                                        <a href="#" class="btn-view-product">Ver Más</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Producto 6 -->
                            <div class="martinez-product-card">
                                <span class="product-badge">Nuevo</span>
                                <div class="martinez-product-image">
                                    <span>Kit Iniciante Barista</span>
                                </div>
                                <div class="martinez-product-info">
                                    <h3 class="martinez-product-title">Kit Iniciante Barista Completo</h3>
                                    <p class="martinez-product-description">
                                        Todo lo necesario para preparar café como un profesional.
                                        Incluye molinillo, filtros y guía de preparación.
                                    </p>
                                    <div class="martinez-product-footer">
                                        <div class="martinez-product-price">$ 85.000</div>
                                        <a href="#" class="btn-view-product">Ver Más</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Producto 7 -->
                            <div class="martinez-product-card">
                                <span class="product-badge">Popular</span>
                                <div class="martinez-product-image">
                                    <span>Bebida Matcha Latte</span>
                                </div>
                                <div class="martinez-product-info">
                                    <h3 class="martinez-product-title">Combo Matcha Latte Premium</h3>
                                    <p class="martinez-product-description">
                                        Matcha japonés ceremonial 100% puro con leche de almendra.
                                        Energía natural y sabor exótico en cada taza.
                                    </p>
                                    <div class="martinez-product-footer">
                                        <div class="martinez-product-price">$ 38.000</div>
                                        <a href="#" class="btn-view-product">Ver Más</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Producto 8 -->
                            <div class="martinez-product-card">
                                <span class="product-badge">Oferta</span>
                                <div class="martinez-product-image">
                                    <span>Caramelos y Dulces</span>
                                </div>
                                <div class="martinez-product-info">
                                    <h3 class="martinez-product-title">Pack Dulces Artesanales 300gr</h3>
                                    <p class="martinez-product-description">
                                        Selección de alfajores, macarons y chocolates artesanales.
                                        Elaborados con ingredientes premium y técnicas tradicionales.
                                    </p>
                                    <div class="martinez-product-footer">
                                        <div class="martinez-product-price">$ 24.000</div>
                                        <a href="#" class="btn-view-product">Ver Más</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Producto 9 -->
                            <div class="martinez-product-card">
                                <span class="product-badge">Exclusivo</span>
                                <div class="martinez-product-image">
                                    <span>Café Tostado Artesanal</span>
                                </div>
                                <div class="martinez-product-info">
                                    <h3 class="martinez-product-title">Café Tostado Artesanal en Grano 500gr</h3>
                                    <p class="martinez-product-description">
                                        Tostado lento y artesanal que resalta los sabores naturales.
                                        Ideal para preparar en casa con tu método favorito.
                                    </p>
                                    <div class="martinez-product-footer">
                                        <div class="martinez-product-price">$ 42.000</div>
                                        <a href="#" class="btn-view-product">Ver Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endauth
        </main>

        <!-- JavaScript para Mobile Menu -->
        <script>
            (function(){
                var btn = document.getElementById('menuToggle');
                var menu = document.getElementById('mobileMenu');
                if (!btn || !menu) return;

                btn.addEventListener('click', function(){
                    menu.classList.toggle('show');
                    var isExpanded = menu.classList.contains('show');
                    btn.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
                });
            })();
        </script>
    </body>
</html>
